<?php

class Autokm
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function GetSingleInvoerAuto()
    {

        $this->db->query('SELECT * FROM kilometersinvoer ORDER BY id');
        $this->db->execute();
        return $this->db->resultSet();
    }

    
}
