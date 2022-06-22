<?php
Class instructeurles{

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
// functie voor lessen van student gegevens op te halen.
public function getAllopmerkleerlingen(){
$this->db->query("SELECT leerling.*, lessen.* FROM `leerling` INNER JOIN `lessen` ON `leerling`.`Id` = `lessen`.`leerling`  AND `leerling`.`Id` = 3");
// var_dump($this->db->resultSet());exit();
return $this->db->resultSet();
}

// hij haalt een record op uit de database    
public function getSingle($Id){
    //echo $Id;exit();
$this->db->query("SELECT * FROM `lessen` INNER JOIN `opmerkingen` WHERE opmerkingen.Id =:Id");
$this->db->bind(":Id", $Id);
//var_dump($this->db);exit();
return $this->db->single();

}

// functie voor opmerking van een les te updaten.
public function updateopmerking(){
    $this->db->query("UPDATE `opmerkingen` 
    SET Opmerking = :Opmerking, Id = :Id
        WHERE Opmerking = :oldOpmerking");
    $this->db->bind(":Id", $this->Id);
    $this->db->bind(":Opmerking", $this->Opmerking);
    $this->db->bind(":oldOpmerking", $this->oldOpmerking);
    
    $this->db->execute();
}

}