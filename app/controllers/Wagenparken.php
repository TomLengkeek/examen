<?php

class Wagenparken extends Controller
{
    public function __construct()
    {
        $this->categoryModel = $this->model("Wagenpark");
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
            $categories = $this->categoryModel->getCategories();
            // var_dump($categories);exit();

            $tbody = "";
            foreach ($categories as $value) {
                $tbody .= "<tr>
                                <td>$value->omschrijving</td>
                                <td><a href='" . URLROOT . "/categories/update/$value->omschrijving'>update</a></td>
                                <td><a href='" . URLROOT . "/categories/delete/$value->omschrijving'>verwijderen</a></td>
                            </tr>";
            }
            $data = [
                'title' => "Categorieen",
                'tbody' => $tbody,
                'alert' => $alert
            ];
            $this->view("categories/index", $data);
        } catch (PDOEXception $e) {
            echo "fetch failed" . $e->getMessage();
            //header("Refresh:3; url=" . URLROOT . "/home/index" );
        }
    }

    public function update($omschrijving = null)
    {
        //var_dump($omschrijving);exit();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->categoryModel->updateCategory($_POST["omschrijving"], $_POST["old"]);
            header("Location: ". URLROOT ."/Categories/index/updating-succes");
        } else {
            $row = $this->categoryModel->getSingleCategory($omschrijving);

            $data = [
                "row" => $row
            ];

            $this->view("categories/update", $data);
        }
    }
}
