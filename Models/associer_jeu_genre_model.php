<?php 
    class Associer {
        //attributs
        public $connect;
        private $table ='associer';
        
        private $id_jeu;
        private $id_genre;

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
    
        public function getId_genre(){
            return $this->id_genre;
        }
    
        public function setId_genre($id_genre){
            $this->id_genre = $id_genre;
        }

        //CRUD

        //create
        public function createAssoc(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            id_jeu = :id_jeu,
                            id_genre = :id_genre';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_genre', $this->id_genre);
            return $stmt->execute();
        }

        //read
        public function readAssoc(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readAssocJeu(){
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

        public function readAssocGenre(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_genre = :id_genre';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_genre', $this->id_genre);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleAssoc(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_genre = :id_genre';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_jeu', $this->id_jeu);
            $stmt->bindParam('id_genre', $this->id_genre);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateAssoc(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            id_genre = :id_genre
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_genre = :id_genre2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_genre', $this->id_genre);
            $stmt->bindParam(':id_genre2', $this->id_genre);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteAssocJeu(){
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

        public function deleteAssocGenre(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            id_genre = :id_genre';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_genre', $this->id_genre);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>