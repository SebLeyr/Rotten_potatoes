<?php 
    class Droit {
        //attributs
        public $connect;
        private $table ='droits';
        
        private $id_droit;
        private $nom_droit;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_droit(){
            return $this->id_droit;
        }
    
        public function getNom_droit(){
            return $this->nom_droit;
        }
    
        public function setNom_droit($nom_droit){
            $this->nom_droit = $nom_droit;
        }

        //CRUD

        //create
        public function createDroit(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            nom_droit = :nom_droit';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_droit', $this->nom_droit);
            return $stmt->execute();
        }

        //read
        public function readDroit(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleDroit(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_droit = :nom_droit';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('nom_droit', $this->nom_droit);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateDroit(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            nom_droit = :nom_droit
                        WHERE
                            nom_droit = :nom_droit2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_droit', $this->nom_droit);
            $stmt->bindParam(':nom_droit2', $this->nom_droit);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteDroit(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            nom_droit = :nom_droit';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_droit', $this->nom_droit);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>