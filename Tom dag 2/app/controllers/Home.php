<?php

use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

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


    //fake login function just check the names and redirect
    public function login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_start();
            $_SESSION["name"] = $_POST["name"];
           header("Location: " . URLROOT . "/leerling/Vindex");
        }
    }
}

?>