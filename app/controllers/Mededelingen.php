<?php 

class Mededelingen extends Controller {

    //constructor voor model
    public function __construct()
    {
        try 
        {    
            //geeft aan wat de model is
            $this->mededelingModel = $this->model('Mededeling');
            //echo "construct met de model gelukt";
        } 
        catch (Exception $e) 
        {
            //als hiet fout gaat krijgt het een error message
            $e->getMessage();exit();
            echo "construct met de model niet gelukt" . $e->getMessage();
        }
    }


    public function index($message = "")
    {
        //switch case voor de berichten op de website
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
            //zegt welke functie de model moet gebruiken
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
        
            $data = [
                'title' => "wagenpark",
                'tbody' => $tbody,
                'alert' => $alert
            ];
             
            //checkt of de data leeg is zo ja dan geeft het een bericht op de pagina
            if (empty($tbody))
            {
                $alert .= '<div class="alert alert-primary" role="alert">
                    de data is leeg
                  </div>';
            }

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
            //header("Location: ". URLROOT ."wagenparken/mededeling-failed");
        }
    }
}