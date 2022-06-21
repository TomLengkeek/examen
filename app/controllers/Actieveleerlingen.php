<?php 
//namespace TDD\controllers;

//use TDD\libraries\Controller;



// deze controller regelt alle views in de map van views/Actieveleerlingen   
class Actieveleerlingen extends Controller{
    private $ActieveLeerlingenModel;

    public function __construct(){
        $this->ActieveLeerlingenModel = $this->model('Actieveleerling');
    }
// functie voor de index hier worden de records ingedaan
    public function index($message = ""){
// Messages switch case voor fouten en succesvole messages
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
            foreach($this->ActieveLeerlingenModel->getAllactiveleerlingen() as $record){
                $records .= '<tr>
                <td>'.$record->Voornaam . '</td>
                <td>'.$record->Achternaam . '</td>
                <td>'. $record->Email . '</td>
                <td>'. $record->telefoonnummer .'</td>
                <td>'. $record->Adres .'</td>
                <td>'. $record->Status .'</td>
                <td><a href="' . URLROOT . '/Actieveleerlingen/delete/' . $record->Email .'"><button type="button" class="btn btn-danger">Verwijderen</button></a></td>
                </tr>';
            }
        }catch(PDOException $e){
            echo $e->getMessage("De database is niet goed geconnect");
        }
        $data = [
            "records" => $records, 
            "alert" => $alert
        ];
        $this->view('Actieveleerling/index',$data);
    }

    // functie voor delete, waarbij als die gedelete word een melding krijgt 
   public function delete($Email) {
        try{
            $this->ActieveLeerlingenModel->Email = $Email;

            if($this->ActieveLeerlingenModel->getSingle()){
                $this->ActieveLeerlingenModel-> deleteGebruiker();
                
                header("Location: " . URLROOT . "/Actieveleerlingen/index/delete-succes");
      
            }
            else{
                header("Location: " . URLROOT . "/Actieveleerlingen/index/delete-failed");
      
            }
        }catch(PDOException $e){
            Header("Location: " . URLROOT . "/Actieveleerlingen/index/delete-failed");
        }
    }
    public function sayMyName($name)
    {
        return "Hallo mijn naam is: " . $name;
    }
}


?>