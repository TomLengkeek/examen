<?php

class Instructeurs implements IModels{
    private $db;
    public $id;
    public $name;
    public $woonplaats;
    public $status;
    public $telefoonummer;
    
    public function __construct(){
        $this->db = new Database();
    }

    //gets and returns a single gebruiker based on id
    public function getSingle(){
        $this->db->query("SELECT id,
                                voornaam,
                                achternaam,
                                woonplaats,
                                telefoonnummer,
                                status 
                                FROM instructeur 
                                WHERE id = :id");
        $this->db->bind(":id", $this->id);
        return $this->db->result();                        
    }
    //gets and returns all gebruikers
    public function getAll(){
        $this->db->query("SELECT id,
                                voornaam,
                                achternaam,
                                woonplaats,
                                telefoonnummer,
                                status 
                                FROM instructeur");
       
        return $this->db->resultSet();    
    }


    //counts the amount of records inside the database and returns them as itemCount
    public function count(){
        $this->db->query("SELECT COUNT(id) as itemCount FROM instructeur");
        $this->db->execute();

        return $this->db->result();
    }

    //gets the right records based on what page number we are on
    public function getPages($pageNumber){
        if($pageNumber == 1){
            $this->db->query("SELECT voornaam,
                                    achternaam,
                                    woonplaats,
                                    telefoonnummer,
                                    status 
                                    FROM instructeur 
                                    limit 5");

        }else{
            $this->db->query("SELECT voornaam,
                                    achternaam,
                                    woonplaats,
                                    telefoonnummer,
                                    status 
                                    FROM instructeur 
                                    limit :pageNumber, :pageOffset");

            $this->db->bind(":pageNumber", ($pageNumber * 5) - 5);
            $this->db->bind(":pageOffset", $pageNumber * 5);
        }
        return $this->db->resultSet();
    }
}


?>