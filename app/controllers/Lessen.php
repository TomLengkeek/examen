<?php 

class Lessen extends Controller {

    //constructor voor model
    public function __construct()
    {
        try 
        {    
            $this->lesModel = $this->model('Les');
            //echo "construct met de model gelukt";
        } 
        catch (Exception $e) 
        {
            //je krijgt een error als het cinstructen niet gelukt is
            $e->getMessage();exit();
            echo "construct met de model niet gelukt" . $e->getMessage();
        }
    }

    public function index($message = "")
    {
        //message switch case voor gepaste error messages (checkt eerst of message niet empty is)
        $alert ="";
        if(!empty($message)){
            switch($message){
                case "data-failed":
                    $alert .= '<div class="alert alert-primary" role="alert">
                    data ophalen niet gelukt
                  </div>';
                break;
            }
        }

        try {
            $lessen = $this->lesModel->getLeerlingen();
            // var_dump($wagenparken);exit();

            $tbody = "";
            foreach ($lessen as $value) {
                $tbody .= "<tr>
                                <td>$value->naam</td>
                                <td>$value->pakket</td>
                                <td><a href='" . URLROOT . "lessen/getLeerlingLessen/'>verder</a></td>
                            </tr>";
            }

            //checkt of tdbody leeg is zo ja dan krijgt de gebruiker een gepaste message
            if (empty($tbody))
            {
                $alert .= '<div class="alert alert-primary" role="alert">
                    de data is leeg
                  </div>';
            }
        
            $data = [
                'title' => "lessen",
                'tbody' => $tbody,
                'alert' => $alert
            ];
    
            $this->view("lessen/index", $data);

        } catch (PDOEXception $e) {
            //als het ophalen van de records niet gelukt is krijgt de gebruiker een gepaste message
            echo "fetch failed" . $e->getMessage();
            //header("Refresh:3; url=" . URLROOT . "/home/index" );
            //header("Location: ". URLROOT ."lessen/data-failed");
        }
    }

    public function getLeerlingLessen($message = "")
    {
        //message switch case voor gepaste error messages (checkt eerst of message niet empty is)
        $alert ="";
        if(!empty($message)){
            switch($message){
                case "data-failed":
                    $alert .= '<div class="alert alert-primary" role="alert">
                    data ophalen niet gelukt
                  </div>';
                break;
            }
        }

        try {
            $lessen = $this->lesModel->getLessenLeerling();
            // var_dump($wagenparken);exit();

            $tbody = "";
            foreach ($lessen as $value) {
                $tbody .= "<tr>
                                <td>$value->datum</td>
                                <td>$value->leerling</td>
                            </tr>";
            }

            //checkt of tdbody leeg is zo ja dan krijgt de gebruiker een gepaste message
            if (empty($tbody))
            {
                $alert .= '<div class="alert alert-primary" role="alert">
                    de data is leeg
                  </div>';
            }
        
            $data = [
                'title' => "lessen",
                'tbody' => $tbody,
                'alert' => $alert
            ];
    
            $this->view("lessen/lessen", $data);

        } catch (PDOEXception $e) {
            //als het ophalen van de records niet gelukt is krijgt de gebruiker een gepaste message
            echo "fetch failed" . $e->getMessage();
            //header("Refresh:3; url=" . URLROOT . "/home/index" );
            //header("Location: ". URLROOT ."lessen/data-failed");
        }
    }

    public function pakketInformatie($message = "")
    {
        //message switch case voor gepaste error messages (checkt eerst of message niet empty is)
        $alert ="";
        if(!empty($message)){
            switch($message){
                case "data-failed":
                    $alert .= '<div class="alert alert-primary" role="alert">
                    data ophalen niet gelukt
                  </div>';
                break;
            }
        }

        try {
            $lessen = $this->lesModel->getPakketInfo();
            // var_dump($wagenparken);exit();

            $tbody = "";
            foreach ($lessen as $value) {
                $tbody .= "<tr>
                                <td>$value->naam</td>
                                <td>$value->prijs</td>
                                <td>$value->aantalLessen</td>
                                <td>$value->cbrExamen</td>
                                <td>$value->betaalTermijnen</td>
                            </tr>";
            }

            //checkt of tdbody leeg is zo ja dan krijgt de gebruiker een gepaste message
            if (empty($tbody))
            {
                $alert .= '<div class="alert alert-primary" role="alert">
                    de data is leeg
                  </div>';
            }
        
            $data = [
                'title' => "lessen",
                'tbody' => $tbody,
                'alert' => $alert
            ];
    
            $this->view("lessen/pakketten", $data);

        } catch (PDOEXception $e) {
            //als het ophalen van de records niet gelukt is krijgt de gebruiker een gepaste message
            echo "fetch failed" . $e->getMessage();
            //header("Refresh:3; url=" . URLROOT . "/home/index" );
            //header("Location: ". URLROOT ."lessen/data-failed");
        }
    }
}