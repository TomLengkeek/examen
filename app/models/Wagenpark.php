<?php 

class Wagenparken extends Controller {

    //constructor voor model
    public function __construct()
    {
        try 
        {    
            $this->wagenparkModel = $this->model('Wagenpark');

            echo "construct met de model gelukt";
        } 
        catch (Exception $e) 
        {
            echo "construct met de model niet gelukt" . $e->getMessage();
        }
    }

    

    public function index($message = "")
    {
        $alert ="";
        if(!empty($message)){
            switch($message){
                case "updating-succes":
                    $alert .= '<div class="alert alert-primary" role="alert">
                    updating success
                  </div>';
                break;
            }
        }

        try {
            $wagenparken = $this->wagenparkModel->getAutos();
            // var_dump($wagenparken);exit();

            $tbody = "";
            foreach ($wagenparken as $value) {
                $tbody .= "<tr>
                                <td>$value->kenteken</td>
                                <td>$value->merk</td>
                                <td>$value->type</td>
                                <td>$value->kilometerstand</td>
                                <td>$value->datumKeuring</td>
                                <td>$value->datumOnderhoudsbeurt</td>
                            </tr>";
            }
            $data = [
                'title' => "wagenpark",
                'tbody' => $tbody,
                'alert' => $alert
            ];
            $this->view("wagenparken/index", $data);
        } catch (PDOEXception $e) {
            echo "fetch failed" . $e->getMessage();
            //header("Refresh:3; url=" . URLROOT . "/home/index" );
        }
    }

}