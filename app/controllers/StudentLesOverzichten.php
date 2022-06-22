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
                            Les is succesvol geannuleerd!
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
            //var_dump($value->id);exit();
            $tablesRow .= " 
            <tr>
            <td>$value->id</td>
            <td>$value->datum</td>
            <td>$value->instructeur</td>
            <td>
            </td>
             <td>
            <a href='" . URLROOT . "/StudentLesOverzichten/deleteAfspraak/$value->id'><i class=''>delete</i></a>
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



    // delete function die via modelnamen de function zijn werk laten doen
    public function deleteAfspraak($id)
    {

        try {
            $this->studentoverzichtmodel->id = $id;

            if ($this->studentoverzichtmodel->getSingleAfspraak()) {
                $this->studentoverzichtmodel->deleteAfspraak();

                header("Location: " . URLROOT . "/StudentLesOverzichten/index/delete-les-success");
            } else {
                header("Location: " . URLROOT . "/StudentLesOverzichten/index/delete-les-failed");
            }
        } catch (PDOException $e) {
            header("Location: " . URLROOT . "/StudentLesOverzichten/index/delete-les-failed");
        }
    }
}
