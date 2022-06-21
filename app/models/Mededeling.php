<?php
class Mededeling 
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
    public function getLeerlingen()
    {
        $this->db->query("SELECT * FROM leerlingen ORDER BY naam ASC");
        return $this->db->resultSet();
    }

    public function getInstructeurs()
    {
        $this->db->query("SELECT * FROM instructeurs ORDER BY naam ASC");
        return $this->db->resultSet();
    }

    public function getSingleLeerlingen($email) {
        $this->db->query("SELECT * FROM leerlingen WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function addMededelingLeerling($new, $old) {

        $this->db->query("UPDATE leerlingen SET mededeling=:new WHERE email = :old");

        $this->db->bind(':new', $new);
        $this->db->bind(':old',$old);

        $this->db->execute();
    }
}