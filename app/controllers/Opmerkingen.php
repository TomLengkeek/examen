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
                <td>'.$record->Datum . '</td>
                <td>'.$record->Leerling . '</td>
                <td>'. $record->Onderdeel . '</td>
                <td>'. $record->Les . '</td>
                <td>'. $record->Opmerking . '</td>
                <td><a href="' . URLROOT . '/todo/update/' . $record->Datum .'"><button type="button" class="btn btn-success">Opmerking toevoegen</button></a></td>
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

    // functie voor delete, waarbij als die gedelete word een melding krijgt 
   public function delete($Email) {
        try{
            $this->opmerkingModel->Email = $Email;

            if($this->opmerkingModel->getSingle()){
                $this->opmerkingModel-> deleteGebruiker();
                
                header("Location: " . URLROOT . "/opmerking/index/delete-succes");
      
            }
            else{
                header("Location: " . URLROOT . "/opmerking/index/delete-failed");
      
            }
        }catch(PDOException $e){
            Header("Location: " . URLROOT . "/opmerking/index/delete-failed");
        }
    }
}