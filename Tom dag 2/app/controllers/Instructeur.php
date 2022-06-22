<?php 
class Instructeur extends Controller{

    private $leerlingModel;
    private $opmerkingModel;
    private $lessenModel;

    public function __construct(){
        $this->leerlingModel = $this->model("Leerlingen");
        $this->opmerkingModel = $this->model("Opmerkingen");
        $this->lessenModel = $this->model("Lessen");
    }

    //page with a button to redirect to read page
    public function Vindex(){
        $this->view("Instructeur/index");
    }

    //function for providing cards to the view
    public function Vread($message = ""){
        
         //set up alerts that pop up when we have done an action
         $alert = null;
         if (!empty($message)) {
             switch ($message) {
                 case "opmerking-toevoegen":
                     $alert .=  '<div class="alert alert-danger" style="text-align: center;" role="alert">
                             Opmerking is leeg, kan niet
                             </div>';
                     break;
                 case "success":
                     $alert .=  '<div class="alert alert-success" style="text-align: center;" role="alert">
                                 opmerking toegevoegd
                             </div>';
                     break;
                case "gefaald":
                $alert .=  '<div class="alert alert-danger" style="text-align: center;" role="alert">
                            opmerking niet toegevoegd probeer opnieuw
                        </div>';
                break;
                 default:
                     break;
             }
         } 
         $records = '';
        try{
            foreach($this->lessenModel->getTodaysLessons() as $record){
                $records .= '<div class="col-3">
                    <div class="card" style="width: 18rem;"
                    <div class="card-body">
                    <h5 class="card-title">Les: ' .  $record->id  .  '</h5>
                    <p class="card-text">Leerling: ' . $record->naam . '</p>
                    <p class="card-text">datum: ' . $record->datum . '</p>
                    <a href="'. URLROOT .'/instructeur/Vcomment/'. $record->id .'" class="btn btn-primary">voeg commentaar toe</a>
                </div>
              </div>';
            }

            if(empty($records)){
                $records = '<div class="alert alert-danger" style="text-align: center;" role="alert">
                geen lessen vandaag
                </div>';
            }
        }catch(PDOException $e){
            $records = '<div class="alert alert-danger" style="text-align: center;" role="alert">
            kon lessen niet ophalen
            </div>';
        }
        $data = [
            "records" => $records,
            "alert" => $alert
        ];
        $this->view("instructeur/read",$data);
    }


    //function for updating or inserting a comment
    public function Vcomment($id = null){
        //check if we have entered the page with post variables
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //check if we have filled in the comment
           
            if(empty($_POST["opmerking"])){
                header("location: " . URLROOT . "/instructeur/Vread/opmerking-toevoegen");
                exit();
            }
            //if there is no comment already we want to make one otherwise update it
            try{
                $this->opmerkingModel->opmerking = $_POST["opmerking"];

                if($_POST["status"] == false){
                    $this->opmerkingModel->les = $_POST["id"];
                    $this->opmerkingModel->insert();
                    
                }else{
                    $this->opmerkingModel->id = $_POST["id"];
                    $this->opmerkingModel->update();
                }
                //everything worked out
                header("location: " . URLROOT . "/instructeur/Vread/success");
            }catch(PDOException $e){
                header("location: " . URLROOT . "/instructeur/Vread/gefaald");
            }
        }
        $result = null;
        //get the comment if there is one
        try{
            $this->opmerkingModel->les = $id;
            $result = $this->opmerkingModel->getSingle();
        }catch(PDOException $e){
            $records = "";
        }
        //if there is no comment we want to update later otherwise create
        $status = false;
        if($result){
            $status = true;
        }

        $data = [
            "result" => $result,
            "status" => $status,
            "lesid" => $id
        ];
        $this->view("instructeur/comment",$data);
    }
}


?>