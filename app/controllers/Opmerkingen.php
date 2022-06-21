<?php 
//namespace TDD\controllers;

//use TDD\libraries\Controller;



// deze controller regelt alle views in de map van views/ToDo    
class opmerkingen extends Controller{
    private $opmerkingModel;

    public function __construct(){
        $this->opmerkingModel = $this->model('opmerking');
    }
// functie voor de index hier worden de records ingedaan
    public function index($message = ""){

        $alert = "";
        switch($message){
            case "delete-succes":
                $alert = '<div class="alert alert-success" role="alert">
                U heeft het succesvol verwijderd
              </div>';
                break;
            case "delete-failed":
                $alert = '<div class="alert alert-danger" role="alert">
                U record is NIET SUCCESVOL verwijderd
                </div>';
                break;
            case "update-succes":
                $alert = '<div class="alert alert-success" role="alert">
                U record is succesvol geupdated
                </div>';
                break;
            case "update-failed":
                $alert = '<div class="alert alert-danger" role="alert">
                U record is NIET SUCCESVOL geupdated
                </div>';
                break;
            case "create-failed":
                $alert = '<div class="alert alert-danger" role="alert">
                U record is NIET SUCCESVOL toegevoegd
                </div>';
                break;
            case "create-succes":
                $alert = '<div class="alert alert-success" role="alert">
                U record is SUCCESVOL toegevoegd
                </div>';
                break;
            
        }
       
        try{
            $records = "";
            foreach($this->opmerkingModel->getAllopmerkleerlingen() as $record){
                $records .= '<tr>
                <td>'.$record->Naam . '</td>
                <td>'.$record->Datum . '</td>
                <td>'.$record->Leerling . '</td>
                <td>'. $record->Onderdeel . '</td>
                <td>'. $record->Id . '</td>
                <td><a href="' . URLROOT . 'opmerkingen/update/' . $record->Id .'"><button type="button" class="btn btn-success">Opmerking toevoegen</button></a></td>
                </tr>';
            }
        }catch(PDOException $e){
            echo $e->getMessage("De database is niet goed geconnect");
        }
        $data = [
            "records" => $records, 
            "alert" => $alert
        ];


        $this->view("/opmerking/index",$data);
    }
    
    // functie voor updaten, waarbij als die update word een melding krijgt 
    public function update($Id = ""){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $values = ["Id","Opmerking","oldOpmerking"];
            if(!$this->validate($values)){
            Header("Location: " . URLROOT . "/opmerking/index/update-failed");
            }
            $this->opmerkingModel->Id = $this->sanitize($_POST["Id"]);
            $this->opmerkingModel->Opmerking = $this->sanitize($_POST["Opmerking"]);
            $this->opmerkingModel->oldOpmerking = $this->sanitize($_POST["oldOpmerking"]);
            $this->opmerkingModel->updateopmerking();
           Header("Location: " . URLROOT . "/opmerking/index/update-succes");

        }else{
            try{
                //$this->opmerkingModel->Opmerking = $Opmerking;
                //echo $Id;exit();
               $result = $this->opmerkingModel->getSingle($Id);
               //var_dump($result);exit();
            }catch(PDOException $e){

            }
            $data = [
                "info" => $result
            ];
          $this->view("opmerking/update",$data);
        }       
    }
}