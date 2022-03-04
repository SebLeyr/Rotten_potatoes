<?php 
    class Distribuer {
        //attributs
        public $connect;
        private $table ='distribuer';
        
        private $id_jeu;
        private $id_plateforme;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_jeu(){
            return $this->id_jeu;
        }
    
        public function setId_jeu($id_jeu){
            $this->id_jeu = $id_jeu;
        }
    
        public function getId_plateforme(){
            return $this->id_plateforme;
        }
    
        public function setId_plateforme($id_plateforme){
            $this->id_plateforme = $id_plateforme;
        }

        //CRUD

        //create
        public function createDistrib(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            id_jeu = :id_jeu,
                            id_plateforme = :id_plateforme';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_plateforme', $this->id_plateforme);
            return $stmt->execute();
        }

        //read
        public function readDistrib(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readDistribJeu(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_jeu', $this->id_jeu);
            $stmt->execute();
            return $stmt;
        }

        public function readDistribPlateforme(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_plateforme = :id_plateforme';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_plateforme', $this->id_plateforme);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleDistrib(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_plateforme = :id_plateforme';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_jeu', $this->id_jeu);
            $stmt->bindParam('id_plateforme', $this->id_plateforme);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateDistrib(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            id_plateforme = :id_plateforme
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_plateforme = :id_plateforme2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_plateforme', $this->id_plateforme);
            $stmt->bindParam(':id_plateforme2', $this->id_plateforme);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteDistribJeu(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteDistribPlateforme(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            id_plateforme = :id_plateforme';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_plateforme', $this->id_plateforme);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>