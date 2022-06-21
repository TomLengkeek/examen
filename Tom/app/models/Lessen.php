<?php 

class Lessen implements IModels{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    
    public function getSingle()
    {
        
    }
    public function getAll(){

    }
    //get all the lessons based on the current date
    public function getTodaysLessons(){
        $this->db->query("SELECT lessen.id,lessen.datum,leerling.naam 
        FROM lessen 
        join leerling on lessen.leerling = leerling.id 
        WHERE datum = CURRENT_DATE
        ORDER BY leerling.naam ASC");
        return $this->db->resultSet();
    }
}

?>