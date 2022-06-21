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
    public function index(){
        $this->view("Instructeur/index");
    }

    public function Vread($message = ""){
        
         //set up alerts that pop up when we have done an action
         $alert = null;
         if (!empty($message)) {
             switch ($message) {
                 case "item-failed":
                     $alert .=  '<div class="alert alert-danger" style="text-align: center;" role="alert">
                             kon niet de paginas ophalen
                             </div>';
                     break;
                 case "out-range":
                     $alert .=  '<div class="alert alert-danger" style="text-align: center;" role="alert">
                                 pagina met dit nummer bestaat niet
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

    public function Vcomment($id){
        if($_SERVER["REQUEST_METHOD"]== "POST"){

        }
        $result = null;

        try{
            $this->opmerkingModel->les = $id;
            $result = $this->opmerkingModel->getSingle();
        }catch(PDOException $e){
            $records = "";
        }
        
        $status = false;
        if($result->opmerking){
            $status = true;
        }

        $data = [
            "result" => $result,
            "status" => $status
        ];
        $this->view("instructeur/comment",$data);
    }
}


?>