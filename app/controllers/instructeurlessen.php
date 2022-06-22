<?php 
//namespace TDD\controllers;

//use TDD\libraries\Controller;



// deze controller regelt alle views in de map van views/instructeurles   
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
            foreach($this->instructteurlesmodel->getAllleerlingen() as $record){
                $records .= '<tr>
                <td>'.$record->Naam . '</td>
                <td>'.$record->Datum . '</td>
                <td>'.$record->Tijd . '</td>        
                <td>'. $record->Onderdeel . '</td>
                <td><a href="' . URLROOT . 'instructeurlessen/update/' . $record->Id .'"><button type="button" class="btn btn-success">onderwerp toevoegen</button></a></td>
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
                $values = ["Id","Onderdeel","oldOnderdeel"];
                $this->instructteurlesmodel->updateonderdeel($_POST);
               Header("Location: " . URLROOT . "/instructeurlessen/index/update-succes");
    
            }else{
                try{
                   $result = $this->instructteurlesmodel->getSingle($Id);
                }catch(PDOException $e){
    
                }
                $data = [
                    "info" => $result
                ];
              $this->view("instructeurles/update",$data);
            }      
        }
        public function create($Naam = ""){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $values = ["Naam", "Datum", "Tijd","Onderdeel"];
                if(!$this->validate($values)){
                Header("Location: " . URLROOT . "/todo/index/create-failed");
                }
    
                $this->instructteurlesmodel->Naam = $this->sanitize($_POST["Naam"]);
                $this->instructteurlesmodel->Datum = $this->sanitize($_POST["Datum"]);
                $this->instructteurlesmodel->Tijd = $this->sanitize($_POST["Tijd"]);
                $this->instructteurlesmodel->Onderdeel = $this->sanitize($_POST["Onderdeel"]);
    
                $id = $this->GebruikerModel->createinstructeur($_POST);
                Header("Location: " . URLROOT . "/todo/index/create-succes");
            }else{
                try{
                    $this->instructteurlesmodel->Naam = $Naam;
                   $result = $this->instructteurlesmodel->getSingle();
                }catch(PDOException $e){
    
                }
                $data = [
                    "info" => $result
                ];
              $this->view("instructeurles/create",$data);
            }       
    }
}