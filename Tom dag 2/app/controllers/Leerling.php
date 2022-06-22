<?php 

class Leerling extends Controller{
    private $name;
    private $lessenModel;
    private $leerlingenModel;
    
    public function __construct(){
        $this->lessenModel = $this->model("Lessen");
        $this->leerlingenModel = $this->model("Leerlingen");

        session_start();
        //get the name we have logged in with
        $this->name = $_SESSION["name"];

        $this->leerlingenModel->naam = $this->name;
    }
    
    //starting page for the students with a button to the read page
    public function Vindex(){
        $data = [
            "name" => $this->name
        ];
        $this->view("leerling/index",$data);
    }
    //function for filling the table on the view read
    public function Vread(){
        
        $records = "";
        try{
            //get the id of the leerling with our name and set it inside the lessonmodel
            //so we can find the right lessons
            $id = $this->leerlingenModel->getSingle()->Id;
            $this->lessenModel->leerling = $id;

            $lessonNumber = 0;
            //filling the table with the information
            foreach($this->lessenModel->getLessonInfo() as $record){
                $lessonNumber++;
                $records .= "<tr>
                <th scope='row'>" . $lessonNumber . "</th>
                <td> " . $record->Datum . "</td>
                <td> " . $record->Instructeur . "</td>
                <td> <a href='". URLROOT . "/leerling/Opmerking/". $record->Id ."'><button type='button' class='btn btn-info'>Opmerking</button></a> </td>
                <td> <a href='". URLROOT . "/leerling/Onderwerp/". $record->Id ."'><button type='button' class='btn btn-info'>Onderwerp</button></a></td>  
                </tr>";
            }
            
            if(empty($records)){
                $records = '<div class="alert alert-danger" style="text-align: center;" role="alert">
            Geen Lessen gevonden
            </div>';
            }

        }catch(PDOException $e){
            //we couldnt get a record due to something so just echo this message instead
            $records = '<div class="alert alert-danger" style="text-align: center;" role="alert">
            Geen Lessen gevonden
            </div>';
        }
        $data = [
            "records" => $records
        ];
        $this->view("leerling/read",$data);
    }
}

?>