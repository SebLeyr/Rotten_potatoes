<?php 
    class Plateforme {
        //attributs
        public $connect;
        private $table ='plateformes';
        
        private $id_plateforme;
        private $nom_plateforme;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_plateforme(){
            return $this->id_plateforme;
        }
    
        public function getNom_plateforme(){
            return $this->nom_plateforme;
        }
    
        public function setNom_plateforme($nom_plateforme){
            $this->nom_plateforme = $nom_plateforme;
        }

        //CRUD

        //create
        public function createPlateforme(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            nom_plateforme = :nom_plateforme';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_plateforme', $this->nom_plateforme);
            return $stmt->execute();
        }

        //read

        //à corriger
        public function getId_plateformeByName(){
            $myQuery = 'SELECT
                            id_plateforme
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_plateforme = '.$this->nom_plateforme.'';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readPlateforme(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readSinglePlateforme(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_plateforme = :nom_plateforme';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_plateforme', $this->nom_plateforme);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updatePlateforme(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            nom_plateforme = :nom_plateforme
                        WHERE
                            nom_plateforme = :nom_plateforme2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_plateforme', $this->nom_plateforme);
            $stmt->bindParam(':nom_plateforme2', $this->nom_plateforme);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deletePlateforme(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            nom_plateforme = :nom_plateforme';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_plateforme', $this->nom_plateforme);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>