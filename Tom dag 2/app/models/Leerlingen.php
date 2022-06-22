<?php 

class Leerlingen implements IModels{
    private $db;
    public $naam;
    public function __construct(){
        $this->db = new Database();
    }
    
    public function getSingle()
    {
        $this->db->query("SELECT Id,Naam from Leerling WHERE Naam = :Naam");
        $this->db->bind(":Naam", $this->naam);
        
        return $this->db->result();
    }
    public function getAll(){

    }
}

?>