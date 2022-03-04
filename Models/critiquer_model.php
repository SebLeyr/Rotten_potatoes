<?php 
    class Critiquer {
        //attributs
        public $connect;
        private $table ='critiquer';
        
        private $id_jeu;
        private $id_util;
        private $critique;

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
    
        public function getId_util(){
            return $this->id_util;
        }
    
        public function getCritique(){
            return $this->critique;
        }
    
        public function setCritique($critique){
            $this->critique = $critique;
        }

        //CRUD

        //create
        public function createCritique(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            id_jeu = :id_jeu,
                            id_util = :id_util,
                            critique = :critique';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_util', $this->id_util);
            $stmt->bindParam(':critique', $this->critique);
            return $stmt->execute();
        }

        //read
        public function readCritique(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readCritiqueJeu(){
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

        public function readCritiqueUtil(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_util = :id_util';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_util', $this->id_util);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleCritique(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_util = :id_util';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_jeu', $this->id_jeu);
            $stmt->bindParam('id_util', $this->id_util);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateCritique(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            critique = :critique,
                        WHERE
                            critique = :critique2
                        AND
                            id_jeu = :id_jeu
                        AND
                            id_util = :id_util';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_util', $this->id_util);
            $stmt->bindParam(':critique', $this->critique);
            $stmt->bindParam(':critique2', $this->critique);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteCritiqueJeu(){
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

        public function deleteCritiqueUtil(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_util = :id_util';
            
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