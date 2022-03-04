<?php 
    class Genre {
        //attributs
        public $connect;
        private $table ='genres';

        private $id_genre;
        private $nom_genre;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_genre(){
            return $this->id_genre;
        }
    
        public function getNom_genre(){
            return $this->nom_genre;
        }
    
        public function setNom_genre($nom_genre){
            $this->nom_genre = $nom_genre;
        }

        //CRUD

        //create
        public function createGenre(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            nom_genre = :nom_genre';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_genre', $this->nom_genre);
            return $stmt->execute();
        }

        //read
        public function readGenre(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleGenre(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_genre = :nom_genre';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('nom_genre', $this->nom_genre);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateGenre(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            nom_genre = :nom_genre
                        WHERE
                            nom_genre = :nom_genre2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_genre', $this->nom_genre);
            $stmt->bindParam(':nom_genre2', $this->nom_genre);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteGenre(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            nom_genre = :nom_genre';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_genre', $this->nom_genre);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>