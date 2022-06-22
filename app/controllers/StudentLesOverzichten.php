<?php

class StudentLesOverzichten extends Controller
{

    public function __construct()
    {
        $this->studentoverzichtmodel = $this->model('StudentLesOverzicht');
    }



    public function index()
    {



        $model = $this->studentoverzichtmodel->GetAllStudentLes();


        $tablesRow = "";
        foreach ($model as $value) {
            $tablesRow .= " 
            <tr>
            <td>$value->datum</td>
            <td>$value->instructeur</td>
            <td>
            <a href='" . URLROOT . "/GetAllStudentLes/update/$value->id'><i class='fa fa-pencil'>update</i></a>
            </td>
            <td>
            <a href='" . URLROOT . "/GetAllStudentLes/deleteAfspraak/$value->id'><i class='fa fa-trash'>delete</i></a>
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

            if ($this->studentoverzichtmodel->getSingle()) {
                $this->studentoverzichtmodel->getSingleAfspraak();

                header("Location: " . URLROOT . "/StudentLesOverzichten/index");
            } else {
                header("Location: " . URLROOT . "/StudentLesOverzichten/index");
            }
        } catch (PDOException $e) {
            header("Location: " . URLROOT . "/StudentLesOverzichten/index/");
        }
    }
}
