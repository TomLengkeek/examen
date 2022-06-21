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
        //echo $id;
        // exit();
        $this->db->query("SELECT kmstanden.Auto, Auto.Type
        FROM kmstanden
        INNER JOIN Auto ON kmstanden.Auto = Auto.Auto");


        $this->db->bind(':id', $id, PDO::PARAM_INT);
        //var_dump($this->db->single());
        //exit();
        return  $this->db->single();
    }


    public function updateKmStand($post)
    {
        // var_dump($_POST);exit();

        var_dump($post["id"]);

        var_dump($post["kmstand"]);

        exit();

        $this->db->query("UPDATE kmstanden SET kmstand = :kmstand WHERE id = :id");

        $this->db->bind(':kmstand', $post["kmstand"], PDO::PARAM_INT);
        $this->db->bind(':id', $post["id"], PDO::PARAM_INT);


        return $this->db->execute();
    }
}
