<?php 
class Instructeur extends Controller{

    private $leerlingModel;
    private $opmerkingModel;
    private $lessenModel;

    public function __construct(){
        $leerlingModel = $this->model("Leerlingen");
        $opmerkingModel = $this->model("Opmerkingen");
        $lessenModel = $this->model("Lessen");
    }

    //page with a button to redirect to read page
    public function index(){
        $this->view("Instructeur/index");
    }

    public function Vread($message = ""){
        
        
        $currentDate = date("Y/m/d");

    }
}


?>