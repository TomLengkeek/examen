<?php

Class Home extends Controller {
    private $Usermodel;

    public function __construct()
    {
    }
    //function starting with v is for views
    //starting page
    public function Vindex($message = ""){
        $this->view("home/index");
    }

    public function login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["name"] == "instructeur"){
                header("Location: " . URLROOT . "/instructeur/index");
            }else if($_POST["name"] == "rijschoolhouder"){
                header("Location: " . URLROOT . "/rijschoolhouder/index");
            }
            
        }
    }
}

?>