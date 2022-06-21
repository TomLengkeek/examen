<?php 

class Mededelingen extends Controller {

    //constructor voor model
    public function __construct()
    {
        try 
        {    
            $this->wagenparkModel = $this->model('Mededeling');
            //echo "construct met de model gelukt";
        } 
        catch (Exception $e) 
        {
            $e->getMessage();exit();
            echo "construct met de model niet gelukt" . $e->getMessage();
        }
    }

    public function index($message = "")
    {
        $alert ="";
        if(!empty($message)){
            switch($message){
                case "data-failed":
                    $alert .= '<div class="alert alert-primary" role="alert">
                    data ophalen niet gelukt
                  </div>';
                break;
                case "mededeling-success":
                    $alert .= '<div class="alert alert-primary" role="alert">
                    mededeling succesvol toegevoegd
                  </div>';
                break;
            }
        }

        try {
            $wagenparken = $this->wagenparkModel->getLeerlingen();
            // var_dump($wagenparken);exit();

            $tbody = "";
            foreach ($wagenparken as $value) {
                $tbody .= "<tr>
                                <td>$value->email</td>
                                <td>$value->naam</td>
                                <td>$value->telefoonnummer</td>
                            </tr>";
            }

            if (empty($tbody))
            {
                $alert .= '<div class="alert alert-primary" role="alert">
                    de data is leeg
                  </div>';
            }
        
            $data = [
                'title' => "wagenpark",
                'tbody' => $tbody,
                'alert' => $alert
            ];
    
            $this->view("mededelingen/index", $data);

        } catch (PDOEXception $e) {
            echo "fetch failed" . $e->getMessage();
            //header("Refresh:3; url=" . URLROOT . "/home/index" );
            header("Location: ". URLROOT ."wagenparken/data-failed");
        }
    }

    public function addmededeling()
    {
        //var_dump($omschrijving);exit();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->categoryModel->updateCategory($_POST["omschrijving"], $_POST["old"]);
            header("Location: ". URLROOT ."/Mededelingen/index/updating-succes");
        } else {
            $row = $this->categoryModel->getSingleCategory($omschrijving);

            $data = [
                "row" => $row
            ];

            $this->view("categories/update", $data);
        }
    }
}