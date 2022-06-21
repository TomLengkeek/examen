<?php
    //Laad de model en de view
    class Controller {
        public function model($model) {
            //Require model file
            require_once '../app/models/' . $model . '.php';
            //Instantiate model
            return new $model();
        }

        //Laat de view (checks for the file)
        public function view($view, $data = []) {
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("Fout met connectie database");
            }
        }

        // functie voor veiligheid als 1 er niet record er niet is, dan gooit ie hem eruit
        protected function validate($values = []){
            $validated = true;
            foreach($values as $key)
                if(empty($_POST[$key])){
                    $validated = false;
                    break;
                }
                return $validated;
        }
        //functies die alle vieze karakters uit je string haalt 
        protected function sanitize($value){
        $value = htmlspecialchars($value);
        $value = trim($value);

        return $value;
        }
    }
