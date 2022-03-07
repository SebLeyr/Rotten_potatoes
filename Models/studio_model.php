<?php 
    class Studio {
        //attributs
        public $connect;
        private $table ='studios';
        
        private $id_studio;
        private $nom_studio;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_studio(){
            return $this->id_studio;
        }
    
        public function getNom_studio(){
            return $this->nom_studio;
        }
    
        public function setNom_studio($nom_studio){
            $this->nom_studio = $nom_studio;
        }

        //CRUD

        //create
        public function createStudio(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            nom_studio = :nom_studio';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_studio', $this->nom_studio);
            return $stmt->execute();
        }

        //read

        //à corriger
        public function getId_studioByName(){
            $myQuery = 'SELECT
                            id_studio
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_studio = '.$this->nom_studio.'';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readStudio(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleStudio(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_studio = :nom_studio';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_studio', $this->nom_studio);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateStudio(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            nom_studio = :nom_studio
                        WHERE
                            nom_studio = :nom_studio2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_studio', $this->nom_studio);
            $stmt->bindParam(':nom_studio2', $this->nom_studio);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteStudio(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            nom_studio = :nom_studio';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_studio', $this->nom_studio);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>