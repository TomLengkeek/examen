<?php

class Autokm
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function GetAllInvoerAuto()
    {

        $this->db->query('SELECT * FROM kmstanden ORDER BY id');
        $this->db->execute();
        return $this->db->resultSet();
    }

    // get single om enkel km te roepen
    public function getSingleKm($id)
    {
        $this->db->query("SELECT * FROM kmstanden WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return  $this->db->single();
    }


    public function updateKmStand($post)
    {
        $this->db->query("UPDATE kmstanden
                        SET kmstand = :kmstand
                        WHERE id = :id");

        $this->db->bind(':kmstand', $post["kmstand"], PDO::PARAM_INT);

        return $this->db->execute();
    }
}
