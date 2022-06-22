<?php

class StudentLesOverzichten extends Controller
{
    // constructor om met de model te verbinden
    public function __construct()
    {
        $this->studentoverzichtmodel = $this->model('StudentLesOverzicht');
    }


    // function om de index.php te laden,
    // model roept de model function getall aan om de opgehaalde data te weergeven via een foreach
    // switch case voor message system
    // $data is variabele waar de tablesrow structuur en message system functions in gaan
    public function index($messages = "")
    {

        //switch case om messages te weergeven
        $alert = '';
        switch ($messages) {
            case "delete-les-success":
                $alert = '<div class="alert alert-success" role="alert">
                            Les is succesvol verwijderd
                        </div>';
                break;
            case "delete-les-failed":
                $alert = '<div class="alert alert-danger" role="alert">
                            Les is helaas niet verwijderd probeer opnieuw
                        </div>';
                break;
        }



        // haal de data uit  de model get all
        $model = $this->studentoverzichtmodel->GetAllStudentLes();

        // bouwt een forEach om de data te weergeven, in dit geval datum en instructeur
        $tablesRow = "";
        foreach ($model as $value) {
            $tablesRow .= " 
            <tr>
            <td>$value->id</td>
            <td>$value->datum</td>
            <td>$value->instructeur</td>
            <td>$value->isactief</td>
            <td>
            <a href='" . URLROOT . "/StudentLesOverzichten/deleteAfspraak/$value->id'><i class='fa fa-trash'>delete</i></a>
            </td>
             <td>
            <a href='" . URLROOT . "/StudentLesOverzichten/aanpasAfspraak/$value->id'><i class=''>aanpassen</i></a>
            </td>
            <tr>
            ";
        }



        // data variabelen voor de tablerow
        $data = [
            'data' => $tablesRow,
            "alert" => $alert
        ];

        // this view om de invoeren/index pagina te laden
        $this->view('studentOverzicht/index', $data);
    }



    // validate function
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



    public function aanpasAfspraak($id = null)
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // var_dump($_POST);


            if (!$this->validate(['reden'])) {

                // message voor als het niet lukt
                echo "failed";
                header("Refresh:2; url=" . URLROOT .  "/StudentLesOverzichten/index/");
            } else {

                try {
                    filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $this->StudentLesOverzicht->deleteAfspraak($_POST);
                    header("Location " . URLROOT . "./StudentLesOverzichten/index/delete-les-succes");
                } catch (PDOException $e) {

                    header("Location: " . URLROOT . "./StudentLesOverzichten/index/delete-les-failed");
                }
            }
        }

        $data = [
            'title' => "<h1>Update artikeloverzicht</h1>"
        ];

        $this->view('studentOverzicht/pasaan', $data);
    }



    public function fillSelector($info = '')
    {
        $records = "";
        foreach ($this->model("StudentLesOverzicht")->getReden() as $record) {
            $selected = ($info == $record->reden) ? "selected" : ""; //check if the category is the one we have selected
            $records .= "<option value = '" . $record->reden . "'" . $selected . ">" . $record->reden .  "</option>";
        }
        return $records;
    }




    // delete function die via modelnamen de function zijn werk laten doen
    public function deleteAfspraak($id)
    {
        // echo ('ik ben hier');
        // if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        //     echo ('ik ben binnen iff');
        //     $delid = $_GET['id'];

        //     var_dump($delid);
        //     exit;
        // }


        try {
            $this->studentoverzichtmodel->id = $id;

            // if om de model functions op te halen
            if ($this->studentoverzichtmodel->getSingleAfspraak()) {
                $this->studentoverzichtmodel->deleteAfspraak();

                header("Location: " . URLROOT . "/StudentLesOverzichten/index/delete-les-success");
            } else {
                // error afhandeling als het niet lukt
                header("Location: " . URLROOT . "/StudentLesOverzichten/index/delete-les-failed");
            }
            // error afhandeling als het niet lukt
        } catch (PDOException $e) {
            header("Location: " . URLROOT . "/StudentLesOverzichten/index/delete-les-failed");
        }
    }
}
