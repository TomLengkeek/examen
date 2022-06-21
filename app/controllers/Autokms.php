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

        $this->view('invoeren/index', $data);
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



    public function kmInvoeren($id = null)
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!$this->validate(['kmstand'])) {

                echo "Het veranderen van de kmstand is niet gelukt";
                header("Refresh:2; url=" . URLROOT .  "/Autokm/index/creating-failed");
            } else {
                try {

                    filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $this->kilometerModel->updateKmStand($_POST);
                    header("Location: " . URLROOT . "./Autokm/index/update-succes");
                } catch (PDOException $e) {
                    header("Location: " . URLROOT . "./overzicht/index/update-failed");
                }
            }
        } else {

            try {

                $row = $this->kilometerModel->getSingleKm($id);

                if (!empty($row)) {

                    // function voor fillselector die je oproept om hierin te werken
                    $records = $this->kmSelector($row->kmstand);
                } else {

                    header("Location: " . URLROOT . "./Autokm/index");
                }
            } catch (PDOException $e) {

                echo $e->getMessage();
                header("Location: " . URLROOT . "./Autokm/index");
            }
            $data = [
                'title' => "<h1>Update Km</h1>",
                'row' => $row,
                'records' => $records

            ];

            $this->view("invoeren/update", $data);
        }
    }



    public function kmSelector($info = '')
    {
        $records = "";
        foreach ($this->model("Autokm")->getSingleKm() as $record) {
            $selected = ($info == $record->Auto_Model) ? "selected" : ""; //check if the category is the one we have selected
            $records .= "<option value = '" . $record->Auto_Model . "'" . $selected . ">" . $record->Auto_Model .  "</option>";
        }
        return $records;
    }
}
