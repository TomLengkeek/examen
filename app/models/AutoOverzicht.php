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


    // function om een auto te creeren
    public function createAuto($post)
    {

        $this->db->query("INSERT INTO lesautos(Auto_Id, Auto_Type, Auto_Model, Auto_Kleur, Transmissie_Naam, Kilometerstand, Auto_Nummer, Beschikbaar, Date_Create, Date_Update)
                            VALUES (:Auto_Id, :Auto_Type, :Auto_Model, :Auto_Kleur, :Transmissie_Naam, :Kilometerstand, :Auto_Nummer, :Beschikbaar, :Date_Create, :Date_Update)");

        // INSERT INTO `lesautos` (`Auto_Id`, `Auto_Type`, `Auto_Model`, `Auto_Kleur`, `Transmissie_Naam`, `Kilometerstand`, `Auto_Nummer`, `Beschikbaar`, `Date_Create`, `Date_Update`)
        //  VALUES ('12', 'A3', 'Audi', 'wit', 'Diesel', '11500', '12332', 'ja', '2022-06-22 11:04:54', '2022-06-20 21:51:08');


        $this->db->bind(':Auto_Id', NULL, PDO::PARAM_INT);
        $this->db->bind(':Auto_Type', $post["Auto_Type"]);
        $this->db->bind(':Auto_Model', $post["Auto_Model"]);
        $this->db->bind(':Auto_Kleur', $post["Auto_Kleur"]);
        $this->db->bind(':Transmissie_Naam', $post["Transmissie_Naam"]);
        $this->db->bind(':Kilometerstand', $post["Kilometerstand"]);
        $this->db->bind(':Auto_Nummer', $post["Auto_Nummer"]);
        $this->db->bind(':Beschikbaar', $post["Beschikbaar"]);
        $this->db->bind(':Date_Create', $post["Date_Create"]);
        $this->db->bind(':Date_Update', $post["Date_Update"]);

        return $this->db->execute();
    }


    public function deleteAuto($id)
    {
        $this->db->query("DELETE FROM lesautos WHERE Auto_Id = :Auto_Id");
        $this->db->bind("Auto_Id", $id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}
