<?php 
//namespace TDD\controllers;

//use TDD\libraries\Controller;



// deze controller regelt alle views in de map van views/ToDo    
class Actieveleerlingen extends Controller{
    private $ActieveLeerlingenModel;

    public function __construct(){
        $this->ActieveLeerlingenModel = $this->model('Actieveleerling');
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
    public function update($email = ""){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $values = ["voornaam", "achternaam", "email", "oldemail"];
            if(!$this->validate($values)){
            Header("Location: " . URLROOT . "/Actieveleerling/index/update-failed");
            }
        
            $this->ActieveLeerlingenModel->voornaam = $this->sanitize($_POST["voornaam"]);
            $this->ActieveLeerlingenModel->achternaam = $this->sanitize($_POST["achternaam"]);
            $this->ActieveLeerlingenModel->email = $this->sanitize($_POST["email"]);
            $this->ActieveLeerlingenModel->oldemail = $this->sanitize($_POST["oldemail"]);


            $this->ActieveLeerlingenModel->updateGebruiker();
           Header("Location: " . URLROOT . "/Actieveleerling/index/update-succes");

        }else{
            try{
                $this->ActieveLeerlingenModel->email = $email;
               $result = $this->ActieveLeerlingenModel->getSingle();
            }catch(PDOException $e){

            }
            $data = [
                "info" => $result
            ];
          $this->view("ToDo/update",$data);
        }       
    }
    public function create($email = ""){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $values = ["voornaam", "achternaam", "email"];
            if(!$this->validate($values)){
            Header("Location: " . URLROOT . "/Actieveleerling/index/create-failed");
            }

            $this->ActieveLeerlingenModel->voornaam = $this->sanitize($_POST["voornaam"]);
            $this->ActieveLeerlingenModel->achternaam = $this->sanitize($_POST["achternaam"]);
            $this->ActieveLeerlingenModel->email = $this->sanitize($_POST["email"]);

            $id = $this->ActieveLeerlingenModel->createGebruiker($_POST);
            Header("Location: " . URLROOT . "/Actieveleerling/index/create-succes");
        }else{
            try{
                $this->ActieveLeerlingenModel->email = $email;
               $result = $this->ActieveLeerlingenModel->getSingle();
            }catch(PDOException $e){

            }
            $data = [
                "info" => $result
            ];
          $this->view("Actieveleerling/create",$data);
        }       
    }
    public function sayMyName($name)
    {
        return "Hallo mijn naam is: " . $name;
    }
}


?>