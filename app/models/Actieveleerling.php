<?php
Class Actieveleerling{

  // defineer je namen die worden gebruikt
    private $db;
    public $Email;
    public $voornaam;
    public $achternaam;
    public $oldemail;
    
//slaat database connectie op in $db
public function __construct(){
  $this->db = new Database();
}
// functie voor activeleerlingen gegevens op te halen.
public function getAllactiveleerlingen(){
$this->db->query("SELECT * FROM `actieve leerlingen`");
return $this->db->resultSet();
}

// hij haalt een record op uit de database    
public function getSingle(){
$this->db->query("SELECT * FROM `actieve leerlingen` WHERE Email =:Email");
$this->db->bind(":Email", $this->Email);
return $this->db->single();
}
// functie voor gebruiker om een gebruiker te verwijderen.    
    public function deleteGebruiker(){
      $this->db->query('DELETE FROM `actieve leerlingen` WHERE Email = :Email');
      $this->db->bind(":Email", $this->Email);
      $this->db->execute();
}
}
?>