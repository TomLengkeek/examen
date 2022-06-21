<?php

class Autokms extends Controller
{

    public function __construct()
    {
        $this->kilometerModel = $this->model('Autokm');
    }



    public function index()
    {

        $this->view('invoeren/index');
    }
}
