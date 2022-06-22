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
// functie voor lessen van leerlingen op te halen.
public function getAllleerlingen(){
$this->db->query("SELECT leerling.*, lessen.* FROM `leerling` INNER JOIN `lessen` ON `leerling`.`Id` = `lessen`.`leerling`  AND `leerling`.`Id` ");
// var_dump($this->db->resultSet());exit();
return $this->db->resultSet();
}

// hij haalt een record op uit de database    
public function getSingle($Id){
    //echo $Id;exit();
$this->db->query("SELECT * FROM `lessen` WHERE lessen.Id = :Onderdeel");
$this->db->bind(":Onderdeel", $Id);
//var_dump($this->db);exit();
return $this->db->single();

}

// functie voor onderdeel van een onderdeel te updaten.
public function updateonderdeel($post){
    $this->db->query("UPDATE `lessen` 
    SET Onderdeel = :Onderdeel WHERE Id = :Id");
    $this->db->bind(":Id", $post["Id"]);
    $this->db->bind(":Onderdeel", $post["Onderdeel"]);
    $this->db->execute();
}
}