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
                <td> <a href='". URLROOT . "/leerling/Vopmerking/". $record->Id ."'><button type='button' class='btn btn-info'>Opmerking</button></a> </td>
                <td> <a href='". URLROOT . "/leerling/Vonderwerp/". $record->Id ."'><button type='button' class='btn btn-info'>Onderwerp</button></a></td>  
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

    public function Vopmerking($id = null){
        if(empty($id)){
            header("Location: " . URLROOT . "/leerling/Vread");
        }

        $opmerking = '';
        try{
            //get the opmerking based on the lesson and send it to the view
            $this->lessenModel->id = $id;
            foreach($this->lessenModel->getOpmerkingWithLes() as $record){
                $opmerking .= $record->Opmerking . "; ";    
            }
        }catch(PDOException $e){
            $opmerking = 'kon niet vinden want :' . $e->getMessage();
        }

        if(empty($opmerking)){
            $opmerking = 'geen opmerking gevonden';
        }

        $data = [
            "opmerking" => $opmerking
        ];

        $this->view("leerling/opmerking",$data);
    }


    public function Vonderwerp($id = null){
        if(empty($id)){
            header("Location: " . URLROOT . "/leerling/Vread");
        }

        $onderwerp = '';
        try{
            //get the opmerking based on the lesson and send it to the view
            $this->lessenModel->id = $id;
            foreach($this->lessenModel->getOnderwerpWithLes() as $record){
                $onderwerp .= $record->Onderwerp . "; ";    
            }
        }catch(PDOException $e){
            $onderwerp = 'kon niet vinden want :' . $e->getMessage();
        }
        //if there is no opmerking say we havent found any
        if(empty($onderwerp)){
            $onderwerp = 'geen onderwerp gevonden';
        }

        $data = [
            "onderwerp" => $onderwerp
        ];

        $this->view("leerling/onderwerp",$data);
    }
}


?>