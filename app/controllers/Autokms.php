<?php

class Autokms extends Controller
{

    public function __construct()
    {
        $this->kilometerModel = $this->model('Autokm');
    }



    public function index()
    {

        $model = $this->kilometerModel->GetAllInvoerAuto();
        $tablesRow = "";
        foreach ($model as $value) {
            $tablesRow .= " 
            <tr>
            <td>$value->id</td>
            <td>$value->Auto</td>
            <td>$value->Datum</td>
            <td>$value->kmstand</td>
            <td>
            <a href='" . URLROOT . "/Autokms/kmInvoeren/$value->id'><i class='fa fa-pencil'>update</i></a>
            </td>
            <tr>
            ";
        }

        // data variabelen voor de tablerow
        $data = [
            'data' => $tablesRow
        ];

        // this view om de invoeren/index pagina te laden
        $this->view('invoeren/index', $data);
    }


    // validate functie die checkt of iets true of false, leeg of gevuld zijn als validator
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



    public function kmInvoeren($id = null)
    {
        // echo "slskdjlkf" . $id;
        // exit();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!$this->validate(['kmstand'])) {

                echo "Het veranderen van de kmstand is niet gelukt";
                header("Refresh:2; url=" . URLROOT .  "/Autokms/index/creating-failed");
            } else {
                try {

                    // sanitize voor speciale characters zodat het veiliger is
                    filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    // conn met de model om de updateKmStand aan te roepen in de moddel en te vuren
                    $this->kilometerModel->updateKmStand($_POST);

                    // succes message voor als het km aanpassen gelukt is
                    header("Location: " . URLROOT . "./Autokms/index/update-succes");

                    //catch voor de errorafhandeling
                } catch (PDOException $e) {

                    // header location om je terug te sturen als het niet gelukt is met de update failed
                    header("Location: " . URLROOT . "./Autokms/index/invoeren-failed");
                }
            }
        } else {

            try {

                // maakt met de kilometermodel conn om de  getsingle te krijgen
                $row = $this->kilometerModel->getSingleKm($id);

                //  var_dump($row);
                //exit()
                // als row variabele niet empty zijn dan..
                if (!empty($row)) {
                    echo ("ik ben hier in de if");
                    $data = ['row' => $row];
                    $this->view("invoeren/update", $data);

                    // function voor kmselector die je oproept om hierin te werken
                    //  $records = $this->kmSelector($row->kmstand, $id);
                } else {
                    // anders stuurt die je naar de index
                    header("Location: " . URLROOT . "./Autokms/index");
                }

                // catch voor error afhandelingen
            } catch (PDOException $e) {

                // redirect naar de index page als het misgaat
                echo $e->getMessage();

                // redirect voor als er een foutje optreed
                header("Location: " . URLROOT . "./Autokms/index");
            }

            //variabele data waarin ik een benamingen opsla met een function eraan
            $data = [
                'title' => "<h1>Update Km</h1>",
                'row' => $row
                // 'records' => $records

            ];
        }

        //laad de update km stand pagina

    }



    public function kmSelector($info = '', $id)
    {
        $records = "";
        foreach ($this->model("Autokm")->getSingleKm($id) as $record) {
            $selected = ($info == $record->kmstand) ? "selected" : ""; //check if the category is the one we have selected
            $records .= "<option value = '" . $record->kmstand . "'" . $selected . ">" . $record->kmstand .  "</option>";
        }
        return $records;
    }
}
