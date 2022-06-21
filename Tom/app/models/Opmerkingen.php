<?php 

class Opmerkingen implements IModels{
    private $db;
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
}

?>