<?php
Class Actieveleerling{

  // defineer je namen die worden gebruikt
    private $db;
    public $Email;
    public $voornaam;
    public $achternaam;
    public $oldemail;
    

  

// functie voor gebruiker om een gebruiker te verwijderen.    
    public function deleteGebruiker(){
      $this->db->query('DELETE FROM `actieve leerlingen` WHERE Email = :Email');
      $this->db->bind(":Email", $this->Email);
      $this->db->execute();
}
// functie voor gebruiker om een gebruiker te updaten.
  public function updateGebruiker(){
    $this->db->query("UPDATE gebruiker 
    SET email = :email, voornaam = :voornaam, achternaam = :achternaam
    WHERE email = :oldemail");

    $this->db->bind(":email", $this->email);
    $this->db->bind(":voornaam", $this->voornaam);
    $this->db->bind(":achternaam", $this->achternaam);
    $this->db->bind(":oldemail", $this->oldemail);
    
    $this->db->execute();
  }

  //  functie voor het maken een create
  public function createGebruiker($post){

    //INSERT INTO `gebruiker` (`email`, `voornaam`, `achternaam`, `createdAt`, `updatedAt`) VALUES ('peterpan@gmail.com', 'e', 'e', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
    $this->db->query("INSERT INTO gebruiker SET email = :email, voornaam = :voornaam, achternaam = :achternaam");
    
    $this->db->bind(':email', $post["email"], );
    $this->db->bind(':voornaam', $post["voornaam"], );
    $this->db->bind(':achternaam', $post["achternaam"], );
  
    $this->db->execute();

}
}
?>