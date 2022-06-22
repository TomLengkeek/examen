<?php 
//namespace TDD\controllers;

//use TDD\libraries\Controller;



// deze controller regelt alle views in de map van views/ToDo    
class instructeurlessen extends Controller{
    private $instructteurlesmodel;

    public function __construct(){
        $this->instructteurlesmodel = $this->model('instructeurles');
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
            foreach($this->instructteurlesmodel->getAllopmerkleerlingen() as $record){
                $records .= '<tr>
                <td>'.$record->Naam . '</td>
                <td>'.$record->Datum . '</td>
                <td>'.$record->Tijd . '</td>        
                <td>'. $record->Onderdeel . '</td>
                <td><a href="' . URLROOT . 'instructeurles/update/' . $record->Id .'"><button type="button" class="btn btn-success">onderwerp toevoegen</button></a></td>
                </tr>';
            }
        }catch(PDOException $e){
            echo $e->getMessage("De database is niet goed geconnect");
        }
        $data = [
            "records" => $records, 
            "alert" => $alert
        ];


        $this->view("/instructeurles/index",$data);
    }
    
    // functie voor updaten, waarbij als die update word een melding krijgt 
    public function update($Id = ""){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $values = ["Onderdeel","oldOnderdeel"];
            if(!$this->validate($values)){
            Header("Location: " . URLROOT . "/instructeurles/index/update-failed");
            }
            $this->opmerkingModel->Onderdeel = $this->sanitize($_POST["Onderdeel"]);
            $this->opmerkingModel->oldOnderdeel = $this->sanitize($_POST["oldOnderdeel"]);
            $this->opmerkingModel->updateopmerking();
           Header("Location: " . URLROOT . "/instructeurles/index/update-succes");

        }else{
            try{
               $result = $this->opmerkingModel->getSingle($Id);
            }catch(PDOException $e){

            }
            $data = [
                "info" => $result
            ];
          $this->view("instructeurles/update",$data);
        }       
    }
}