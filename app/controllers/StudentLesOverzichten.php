<?php

class StudentLesOverzichten extends Controller
{

    public function __construct()
    {
        $this->studentoverzichtmodel = $this->model('StudentLesOverzicht');
    }



    public function index($messages = "")
    {

        $alert = '';
        switch ($messages) {
            case "delete-success":
                $alert = '<div class="alert alert-success" role="alert">
                            Gebruiker is succesvol verwijderd
                        </div>';
                break;
            case "delete-failed":
                $alert = '<div class="alert alert-danger" role="alert">
                            Gebruiker is helaas niet verwijderd probeer opnieuw
                        </div>';
                break;
        }




        $model = $this->studentoverzichtmodel->GetAllStudentLes();


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
            'data' => $tablesRow
        ];

        // this view om de invoeren/index pagina te laden
        $this->view('studentOverzicht/index', $data);
    }



    public function deleteAfspraak($id)
    {
        try {
            $this->studentoverzichtmodel->id = $id;

            if ($this->studentoverzichtmodel->getSingleAfspraak()) {
                $this->studentoverzichtmodel->deleteAfspraak();

                header("Location: " . URLROOT . "/StudentLesOverzichten/index");
            } else {
                header("Location: " . URLROOT . "/StudentLesOverzichten/index");
            }
        } catch (PDOException $e) {
            header("Location: " . URLROOT . "/StudentLesOverzichten/index/");
        }
    }
}
