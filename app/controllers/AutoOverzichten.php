<?php

class AutoOverzichten extends Controller
{

    // bouwt een constructor die de model 'AutoOverzicht' opent en de con ermee maakt
    public function __construct()
    {
        $this->overzichtModel = $this->model('AutoOverzicht');
    }


    // bouwt een index controller die een switch case bevat voor de error message afhandeling
    // in de foreach word de $value aangeroepen die de model namen uit de database gaat weergeven 
    //de anchor tag zorgt voor de juiste route naar de delete en update function die aanworden geroepen en een message bevatten
    //in de variabele $data zitten de afhandelingen die de controller en model afhandelen om de data in te laden
    public function index($message = "")
    {

        // message system voor wanneer je een CRUD actie uitvoert
        $alert = "";
        if (!empty($message)) {
            switch ($message) {
                case 'delete-success':
                    $alert .= '<div class="alert alert-success" role="alert">
                    Auto verwijdert!
                    </div>';
                    break;
                case 'creating-succes':
                    $alert .= '<div class="alert alert-success" role="succes">
                    Auto Toegevoegd
                    </div>';
                    break;
            }
        }




        $model = $this->overzichtModel->GetSingleAuto();
        $tablesRow = "";
        foreach ($model as $value) {
            $tablesRow .= " 
            <tr>
            <td>$value->Auto_Id</td>
            <td>$value->Auto_Type</td>
            <td>$value->Auto_Model</td>
            <td>$value->Auto_Kleur</td>
            <td>$value->Transmissie_Naam</td>
            <td>$value->Kilometerstand</td>
            <td>$value->Auto_Nummer</td>
            <td>$value->Beschikbaar</td>
            <td>$value->Date_Create</td>
            <td>$value->Date_Update</td>
            <td>
            <a href='" . URLROOT . "/overzicht/update/$value->Auto_Id'><i class='fa fa-pencil'></i></a>
            </td> 
            <td>
            <a href='" . URLROOT . "/overzicht/delete/$value->Auto_Id'><i class='fa fa-trash'>delete</i></a>
            </td>
            <tr>
            ";
        }

        // data var 
        $data = [
            'title' => 'Home page',
            'data' => $tablesRow,
            "alert" => $alert
        ];

        $this->view('indexes/read', $data);
    }




    public function validate($values = [])
    {
        $validate = true;
        foreach ($values as $value) {
            if (empty($_POST[$value]))
                $validate = false;
            break;
        }
        return $validate;
    }




    public function createAuto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (!$this->validate(['Auto_Type',  'Auto_Model', 'Auto_Kleur', 'Transmissie_Naam', 'Kilometerstand', 'Auto_Nummer', 'Beschikbaar'])) {

                // message voor als het niet lukt om een auto aan te maken.
                echo "het aanmaken van een nieuwe lesauto is niet gelukt";
                header("Refresh:2; url=" . URLROOT .  "/AutoOverzichten/index/creating-failed");
            } else {


                // try zorgt ervoor dat de waarde juist ingevoerd moeten worden, dit checkt die.
                try {

                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $this->overzichtModel->createAuto($_POST);

                    header("Location:" . URLROOT . "/AutoOverzichten/index/creating-succes");

                    // catch rolt hem door als er binnen de try een fout heeft plaatsgevonden. vervolgens refresht die de url
                } catch (PDOException $e) {
                    //var_dump($e->getMessage());
                    //exit();
                    echo "het aanmaken van je auto is niet gelukt";
                    header("Refresh:5; url=" . URLROOT .  "/AutoOverzichten/index/creating-failed");
                }
            }

            // deze else functie zorgt ervoor dat er met $data array een invoel kan worden gedaan, in dit geval een title die weergeven word op de create pagina
        } else {
            $records = $this->AutoSelector();
            $recordsTransmissie = $this->TransmissieSelector();

            $data = [
                'Title' => "<h1>voeg een nieuwe wagen toe!</h1>",
                'records' => $records,
                'recordsTransmissie' => $recordsTransmissie
            ];

            $this->view("indexes/createAuto", $data);
        }
    }




    public function AutoSelector($info = '')
    {
        $records = "";
        foreach ($this->model("AutoType")->getSingleAutoType() as $record) {
            $selected = ($info == $record->Auto_Model) ? "selected" : ""; //check if the category is the one we have selected
            $records .= "<option value = '" . $record->Auto_Model . "'" . $selected . ">" . $record->Auto_Model .  "</option>";
        }
        return $records;
    }


    // selector die je een transmissie uit de db tabel laat zien
    public function TransmissieSelector($info = '')
    {
        $recordsTransmissie = "";
        foreach ($this->model("AutoType")->GetTransmissie() as $record) {
            $selected = ($info == $record->Transmissie) ? "selected" : ""; //check if the category is the one we have selected
            $recordsTransmissie .= "<option value = '" . $record->Transmissie . "'" . $selected . ">" . $record->Transmissie .  "</option>";
        }
        return $recordsTransmissie;
    }



    //delete function
    public function delete($id)
    {
        //echo $id;exit();
        $this->overzichtModel->deleteAuto($id);

        // message voor als het delete is gelukt
        $data = [
            'deleteStatus' => "Het record met id = $id is verwijdert"
        ];
        // this view stuurt je terug met het juiste data,  de juist ingeladen functie word ingeladen via de header refresh

        //na url root komt de naam van de controller waarin je werkt en method/function name die de functie uitvoert
        $this->view("indexes/delete", $data);
        header("Refresh:0; url=" . URLROOT . "/overzicht/index/delete-success");
    }
}
