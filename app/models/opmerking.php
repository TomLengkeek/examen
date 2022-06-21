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
$this->db->query("SELECT leerling.*, lessen.* FROM `leerling` INNER JOIN `lessen` ON `leerling`.`Id` = `lessen`.`leerling`  AND `leerling`.`Id` = 3");
// var_dump($this->db->resultSet());exit();
return $this->db->resultSet();
}

// hij haalt een record op uit de database    
public function getSingle(){
$this->db->query("SELECT * FROM `lessen` INNER JOIN `opmerkingen` WHERE Datum =:Datum");
$this->db->bind(":Datum", $this->Datum);

return $this->db->single();

}

// functie voor gebruiker om een gebruiker te updaten.
public function updateopmerking(){
    $this->db->query("UPDATE `opmerkingen` 
    SET Opmerking = :Opmerking, Les = :Les
        WHERE Opmerking = :oldOpmerking");
    $this->db->bind(":Les", $this->Les);
    $this->db->bind(":Opmerking", $this->Opmerking);
    $this->db->bind(":oldOpmerking", $this->oldOpmerking);
    
    $this->db->execute();
}

}