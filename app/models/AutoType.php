<?php

class AutoType
{
    public $logs = [];
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //reads all information from the table and returns a string for a html selector
    public function getSingleAutoType()
    {
        $this->db->query("SELECT * FROM automodel");
        $result = $this->db->resultSet();

        return $result;
    }

    public function GetTransmissie()
    {

        $this->db->query("SELECT * FROM transmissienaam");
        $result = $this->db->resultSet();

        return $result;
    }
}
