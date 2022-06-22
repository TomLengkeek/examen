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
            <td>$value->datum</td>
            <td>$value->instructeur</td>
            <td>
            <a href='" . URLROOT . "/StudentLesOverzichten/update/$value->id'><i class='fa fa-pencil'>update</i></a>
            </td>
            <td>
            <a href='" . URLROOT . "/StudentLesOverzichten/deleteAfspraak/$value->id'><i class='fa fa-trash'>delete</i></a>
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


    // delete function die via modelnamen de function zijn werk laten doen
    public function deleteAfspraak($id)
    {
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
