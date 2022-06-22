<?php

class StudentLesOverzicht
{
    private $db;


    // bouw constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    public function GetAllStudentLes()
    {


        $this->db->query("SELECT * FROM lessen ORDER BY id DESC");



        $resultSet =  $this->db->resultSet();

        //  var_dump($resultSet);exit();
        return $resultSet;
    }



    public function getSingleAfspraak()
    {
        $this->db->query("SELECT * FROM lessen WHERE id = :id");
        $this->db->bind(":id", $this->id);

        return $this->db->single();
    }


    public function deleteAfspraak()
    {
        $this->db->query("DELETE FROM lessen WHERE id = :id");
        $this->db->bind(":id", $this->id);

        $this->db->execute();
    }
}
