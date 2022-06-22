<?php
class Les 
{
    
    // Properties, fields
    private $db;

    //constructor voor database
    public function __construct(){
        try 
        {    
            $this->db = new Database();

            //echo "connectie met database gelukt";
        } 
        catch (Exception $e) 
        {
            //error message als het connecten met de database niet is gelukt
            echo "connectie met database niet gelukt" . $e->getMessage();
        }
    }
    
    //deze functie haalt alles op uit het wagenpark database en sorteers de date op kenteken
    public function getLessenKonijn()
    {
        $this->db->query("SELECT * FROM lessen ORDER BY id");
        return $this->db->resultSet();
    }

    public function getLessenSlavink()
    {
        $this->db->query("SELECT * FROM lessen ORDER BY id");
        return $this->db->resultSet();
    }

    public function getLessenOtto()
    {
        $this->db->query("SELECT * FROM lessen ORDER BY id");
        return $this->db->resultSet();
    }

    public function getLeerlingen()
    {
        $this->db->query("SELECT * FROM leerlingen ORDER BY id");
        return $this->db->resultSet();
    }
}