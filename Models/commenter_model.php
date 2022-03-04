<?php 
    class Commenter {
        //attributs
        public $connect;
        private $table ='commenter';
        
        private $id_jeu;
        private $id_util;
        private $commentaire;

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
    
        public function getCommentaire(){
            return $this->commentaire;
        }
    
        public function setCommentaire($commentaire){
            $this->commentaire = $commentaire;
        }

        //CRUD

        //create
        public function createCom(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            id_jeu = :id_jeu,
                            id_util = :id_util,
                            commentaire = :commentaire';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_util', $this->id_util);
            $stmt->bindParam(':commentaire', $this->commentaire);
            return $stmt->execute();
        }

        //read
        public function readCom(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readComJeu(){
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

        public function readComUtil(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_util = :id_util';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_util', $this->id_util);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleCom(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_util = :id_util';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_util', $this->id_util);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateCom(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            commentaire = :commentaire,
                        WHERE
                            commentaire = :commentaire2
                        AND
                            id_jeu = :id_jeu
                        AND
                            id_util = :id_util';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_util', $this->id_util);
            $stmt->bindParam(':commentaire', $this->commentaire);
            $stmt->bindParam(':commentaire2', $this->commentaire);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteComJeu(){
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

        public function deleteComUtil(){
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