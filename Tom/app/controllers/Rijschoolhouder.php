<?php
class Rijschoolhouder extends Controller{
    private $instructeurModel;

    //instantiate the model
    public function __construct(){
        $this->instructeurModel = $this->model("Instructeurs");
    }


    //page with a button to redirect to read page
    public function index(){
        $this->view("Rijschoolhouder/index");
    }

    //function that provides the table records to the view
    public function Vread($pageNumber = 1,$message = "")
    {
        //set up alerts that pop up when we have done an action
        $alert = null;
        if (!empty($message)) {
            switch ($message) {
                case "item-failed":
                    $alert .=  '<div class="alert alert-danger" style="text-align: center;" role="alert">
                            kon niet de paginas ophalen
                            </div>';
                    break;
                case "out-range":
                    $alert .=  '<div class="alert alert-danger" style="text-align: center;" role="alert">
                            pagina nummer bestaat niet
                            </div>';
                    break;
                default:
                    break;
            }
        }
        //create the rows for inside the table
        try {
            //if the page is out of range we just go to page number 1
            if($pageNumber > $this->page_count() || $pageNumber <= 0){
                header("Location: " . URLROOT . "/rijschoolhouder/Vread/1/out-range");
            }
            $records = "";

            //create the tabel rows with the records we get from the database
            foreach ($this->instructeurModel->getPages($pageNumber) as $record) {
                $records .= "<tr>
            <th scope='row'>" . $record->id . "</th>
            <td> " . $record->omschrijving . "</td>
            <td> " . $record->merk . "</td>
            <td> " . $record->typenummer . "</td>
            <td> " . $record->aanschaffingsdatum . "</td>
            <td> " . $record->prijs . "</td>
            <td> " . $record->status . "</td>
            <td>
                <a href='" . URLROOT .  "/item/update/" . $record->id . "'>
                    edit
                </a>
            </td>
            <td>
                <a href='" . URLROOT . "/item/delete/" . $record->id . "'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                        <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                    </svg>
                </a>
            </td>   
            </tr>";
            }
            //if the string isnt filled we know that we dont have any records
            //so we echo a message instead
            if(empty($records)){
                $records = '<div class="alert alert-danger" style="text-align: center;" role="alert">
                geen Instructeurs gevonden
                </div>';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        $data = [
            'records' => $records,
            'alert' => $alert,
            'pageItems' => $this->page_items($this->page_count()),
            'pageNumber' => $pageNumber
        ];
        $this->view('rijschoolhouder/read', $data);
    }


     //get the amount of records and get the amount of pages based on that
     private function page_count(){
        try{
            $instrCount = $this->instructeurModel->count()->itemCount;
        }catch(PDOException $e){
            header("Refresh:0; url=" . URLROOT . "/rijschoolhouder/read/1/item-failed");
        }
            $pages = 0;
            $counter = 0;

        //counts the amount of records, then ads 1 to pages every 5 records
        for($count = 0; $count <= $instrCount; $count++){
            if($counter == 5){
                $counter = 0;
                $pages++;
            }else{
                $counter++;
            }    
        }
        //if there is any left that isnt 5 or more add one last page
        if($counter > 0){
            $pages++;
        }
        return $pages;
    }

    //creates the list items for the page navigation
    private function page_items($pages){
        $page_items = "";
        for($x=1;$x <= $pages;$x++){
            $page_items .= '<li class="page-item"><a class="page-link" href="'. URLROOT . '/rijschoolhouder/Vread/'. $x . '">'. $x. '</a></li>';
        }
        return $page_items;
    }
}



?>