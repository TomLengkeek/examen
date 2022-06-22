<?php

class StudentLesOverzicht
{
    private $db;


    // bouw constructor om connectie met db te maken
    public function __construct()
    {
        // con naar Database waarin de connectie verwerkt zit
        $this->db = new Database;
    }


    // function om alle student lessen op te hale
    public function GetAllStudentLes()
    {

        // sql statement die de select uitvoert en DESC om het te descenden
        $this->db->query("SELECT * FROM lessen WHERE isactief = 1 ORDER BY id DESC");


        // resultset m om de resultaten op te halen
        $resultSet =  $this->db->resultSet();

        //  var_dump($resultSet);exit();

        // return de resultaten 
        return $resultSet;
    }


    // get single om 1 specifieke les op te halen om 1 row te selecteren uit de tabel lessen
    public function getSingleAfspraak()
    {

        // sql statemant om de select te maken
        $this->db->query("SELECT * FROM lessen WHERE id = :id");

        // bind the parameters via een placeholder die we in de sql statemant als :id hebben opgeslagen
        $this->db->bind(":id", $this->id);

        // return single om 1 row op te halen
        return $this->db->single();
    }


    // function om les te deleten uit de database
    public function deleteAfspraak($id)
    {
        // sql statemant om delete uit lesson uit te voeren
        $this->db->query("UPDATE  lessen
                        SET isactief = :val
                        WHERE id = :id");

        // bind the placeholder naar id
        $this->db->bind(":id", $id);
        $this->db->bind(":val", 0);

        // execute sql statemants/ bind
        $this->db->execute();
    }


    public function getReden()
    {
        $this->db->query("SELECT * FROM annuleerlessen ORDER BY reden");
        $result = $this->db->resultSet();

        return $result;
    }
}
