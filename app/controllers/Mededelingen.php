<?php 

class Mededelingen extends Controller {

    //constructor voor model
    public function __construct()
    {
        try 
        {    
            $this->mededelingModel = $this->model('Mededeling');
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
            $Mededelingen = $this->mededelingModel->getLeerlingen();
            // var_dump($wagenparken);exit();

            $tbody = "";
            foreach ($Mededelingen as $value) {
                $tbody .= "<tr>
                                <td>$value->email</td>
                                <td>$value->rol</td>
                                <td>$value->naam</td>
                                <td>$value->telefoonnummer</td>
                                <td>$value->mededeling</td>
                                <td><a href='" . URLROOT . "mededelingen/addmededeling/$value->email'>mededeling toevoegen</a></td>
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

    public function addMededeling($email = null)
    {
        //var_dump($omschrijving);exit();
        
        try
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $this->mededelingModel->addMededelingLeerling($_POST["mededeling"], $_POST["old"]);
                header("Location: ". URLROOT ."mededelingen/index/updating-succes");
            } 
            else 
            {
                $row = $this->mededelingModel->getSingleLeerlingen($email);
    
                $data = [
                    "row" => $row
                ];
    
                $this->view("mededelingen/addMededelingLeerling", $data);
            }
        }
        catch (PDOEXception $e)
        {
            echo "fetch failed" . $e->getMessage();
            header("Location: ". URLROOT ."wagenparken/mededeling-failed");
        }
    }
}