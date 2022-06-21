<?php 
//load model and the view

class Controller{
    //create an instance of the given model class
    public function model($model){
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }
    //load the view check for the file
    public function view($view, $data = []){
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }
        else{
            die("View does not exist");
        }
    }
    // checks if any of the given values are empty in the post array.
    protected function validate($values = []){
        $validated = true;
        foreach($values as $value){
            if(empty($_POST[$value])){
                $validated = false;
                break;
            }
        }
        return $validated;
    }

    
    //closes the current connection
    protected function closeConn(string $model){
        unset($this->$model);
    }

    //get the active status and return  its name
    protected function getActiveStatus(){
        $status = "";
        try{
            $statusModel = $this->model("Status");

            foreach($statusModel->getAll() as $result){
                if($result->active == 1){
                    $status = $result->name;
                    break;
                }
            }
        }catch(PDOException  $e) {
            $status = "failed";
        }

        return $status;
    }
}

?>