<?php 

class Opmerkingen implements IModels{
    private $db;
    public $id;
    public $les;
    public $opmerking;
    public function __construct(){
        $this->db = new Database();
    }

    public function getSingle()
    {
        $this->db->query("SELECT id,opmerking from opmerkingen WHERE les=:les");
        $this->db->bind(":les", $this->les);

        return $this->db->result();
    }

    public function getAll(){

    }

    public function insert(){
        $this->db->query("INSERT INTO opmerkingen (les,opmerking) VALUES (:les,:opmerking)");
        $this->db->bind(":les", $this->les);
        $this->db->bind(":opmerking", $this->opmerking);

        $this->db->execute();
    }

    public function update(){
        $this->db->query("UPDATE opmerkingen SET opmerking = :opmerking WHERE id = :id");
        $this->db->bind(":id", $this->id);
        $this->db->bind(":opmerking", $this->opmerking);

        $this->db->execute();
    }
}

?>