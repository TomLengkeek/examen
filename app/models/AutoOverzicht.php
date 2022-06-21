<?php

class AutoOverzicht

{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }




    public function GetSingleAuto()
    {

        $this->db->query('SELECT * FROM lesautos ORDER BY Auto_Kleur');
        $this->db->execute();
        return $this->db->resultSet();
    }


    // function om artikel te createn
    public function createAuto($post)
    {

        $this->db->query("INSERT INTO lesautos(Auto_Id, Auto_Type, Auto_Model, Auto_Kleur, Transmissie_Naam, Auto_Nummer, Beschikbaar, )
                            VALUES (:Auto_Id, :Auto_Type, :Auto_Model, :Auto_Kleur, :Transmissie_Naam, :Auto_Nummer, :Beschikbaar, )");


        $this->db->bind(':Auto_Id', NULL, PDO::PARAM_INT);
        $this->db->bind(':Auto_Type', $post["Auto_Type"]);
        $this->db->bind(':Auto_Model', $post["Auto_Model"]);
        $this->db->bind(':Auto_Kleur', $post["Auto_Kleur"]);
        $this->db->bind(':Transmissie_Naam', $post["Transmissie_Naam"]);
        $this->db->bind(':Auto_Nummer', $post["Auto_Nummer"]);
        $this->db->bind(':Beschikbaar', $post["Beschikbaar"]);

        return $this->db->execute();
    }


    public function deleteAuto($id)
    {
        $this->db->query("DELETE FROM lesautos WHERE Auto_Id = :Auto_Id");
        $this->db->bind("Auto_Id", $id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}
