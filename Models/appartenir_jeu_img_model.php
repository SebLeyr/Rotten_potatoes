<?php 
    class Appartenir {
        //attributs
        public $connect;
        private $table ='appartenir';
        
        private $id_jeu;
        private $id_img;

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
    
        public function getId_img(){
            return $this->id_img;
        }
    
        public function setId_img($id_img){
            $this->id_img = $id_img;
        }
        
        //CRUD

        //create
        public function createAppart(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            id_jeu = :id_jeu,
                            id_img = :id_img';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_img', $this->id_img);
            return $stmt->execute();
        }

        //read
        public function readAppart(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readAppartJeu(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->execute();
            return $stmt;
        }

        public function readAppartImg(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_img = :id_img';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_img', $this->id_img);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleAppart(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_img = :id_img';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_img', $this->id_img);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateAppart(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            id_img = :id_img
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_img = :id_img2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_img', $this->id_img);
            $stmt->bindParam(':id_img2', $this->id_img);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteAppartJeu(){
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

        public function deleteAppartImg(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            id_img = :id_img';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_img', $this->id_img);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>