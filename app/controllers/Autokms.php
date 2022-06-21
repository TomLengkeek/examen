<?php

class Autokms extends Controller
{

    public function __construct()
    {
        $this->kilometerModel = $this->model('Autokm');
    }



    public function index()
    {

        $model = $this->kilometerModel->GetSingleInvoerAuto();
        $tablesRow = "";
        foreach ($model as $value) {
            $tablesRow .= " 
            <tr>
            <td>$value->id</td>
            <td>$value->Auto</td>
            <td>$value->Datum</td>
            <td>$value->kmstand</td>
            <td>
            <a href='" . URLROOT . "/overzicht/update/$value->Auto'><i class='fa fa-pencil'></i></a>
            </td> 
            <td>
            <a href='" . URLROOT . "/overzicht/delete/$value->Auto'><i class='fa fa-trash'>delete</i></a>
            </td>
            <tr>
            ";
        }
        $data = [
            'title' => 'Home page',
            'data' => $tablesRow
        ];

        // $this->view('indexes/read', $data);



        $this->view('invoeren/index', $data);
    }
}
