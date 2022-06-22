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

    //functie om pakket info op te halen allen met de naam "Pakket 1"
    public function getpakketInfo()
    {
        $this->db->query("SELECT * FROM pakketten  WHERE naam ='Pakket 1'");
        return $this->db->resultSet();
    }

    //functie om lessen op te halen allen met het leerling id "3" en alleen de lessen die na deze dag komen
    public function getLessenLeerling()
    {
        $this->db->query("SELECT * FROM lessen WHERE leerling ='3' AND datum <= CURDATE()");
        return $this->db->resultSet();
    }

    //functie om leerlingen op te halen allen met de naam "Konijn"
    public function getLeerlingen()
    {
        $this->db->query("SELECT * FROM leerlingen WHERE naam = 'Konijn'");
        return $this->db->resultSet();
    }
}