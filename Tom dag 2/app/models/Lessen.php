<?php 

class Lessen implements IModels{
    private $db;
    public $leerling;
    public $id;

    public function __construct(){
        $this->db = new Database();
    }
    
    public function getSingle()
    {
        
    }
    public function getAll(){

    }
    //get the lesson information
    //based on what student we are
    public function getLessonInfo(){
        $this->db->query("SELECT Lessen.Id,Lessen.Datum,Instructeur.Naam as Instructeur from Lessen
        join Instructeur on Lessen.Instructeur = Instructeur.Email
        where Lessen.Leerling = :leerling and not Datum  > CURRENT_DATE
        order by Datum asc");

        $this->db->bind(":leerling", $this->leerling);

        return $this->db->resultSet();
    }
    //get the opmerking based on the lesson
    public function getOpmerkingWithLes(){
        $this->db->query("SELECT Opmerkingen.Opmerking from Lessen
        join Opmerkingen on Lessen.Id = Opmerkingen.Les
        where Lessen.Id = :id");

        $this->db->bind(":id", $this->id);
        
        return $this->db->resultSet();
    }
    //get the onderwerp based on the lesson
    public function getOnderwerpWithLes(){
        $this->db->query("SELECT Onderwerpen.Onderwerp from Lessen
        join Onderwerpen on Lessen.Id = Onderwerpen.Les
        where Lessen.Id = :id");

        $this->db->bind(":id", $this->id);
        
        return $this->db->resultSet();
    }
}

?>