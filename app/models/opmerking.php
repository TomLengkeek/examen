<?php
Class Opmerking{

  // defineer je namen die worden gebruikt
    private $db;
    public $Datum;
    public $Email;
    public $voornaam;
    public $achternaam;
    public $oldemail;
    
//slaat database connectie op in $db
public function __construct(){
  $this->db = new Database();
}
// functie voor gebruiker gegevens op te halen.
public function getAllopmerkleerlingen(){
$this->db->query("SELECT * FROM `lessen` INNER JOIN `opmerkingen`");
return $this->db->resultSet();
}

// hij haalt een record op uit de database    
public function getSingle(){
$this->db->query("SELECT * FROM `lessen` INNER JOIN `opmerkingen` WHERE Datum =:Datum");
$this->db->bind(":Datum", $this->Datum);

return $this->db->single();

}
}