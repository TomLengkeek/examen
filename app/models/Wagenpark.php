<?php
class Wagenpark 
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
            echo "connectie met database niet gelukt" . $e->getMessage();
        }
    }
    
    //deze functie haalt alles op uit het wagenpark database en sorteers de date op kenteken
    public function getAutos()
    {
        $this->db->query("SELECT * FROM wagenpark ORDER BY kenteken");
        return $this->db->resultSet();
    }
}