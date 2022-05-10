<?php 
    class Contenir {
        //attributs
        public $connect;
        private $table ='contenir';
        
        private $id_jeu;
        private $id_video;

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
    
        public function getId_video(){
            return $this->id_video;
        }
    
        public function setId_video($id_video){
            $this->id_video = $id_video;
        }
        
        //CRUD

        //create
        public function createContenir(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            id_jeu = :id_jeu,
                            id_video = :id_video';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_video', $this->id_video);
            return $stmt->execute();
        }

        //read
        public function readContenir(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readContenirJeu(){
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

        public function readContenirVideo(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_video = :id_video';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_video', $this->id_video);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleContenir(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_video = :id_video';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_video', $this->id_video);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateContenir(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            id_video = :id_video
                        WHERE
                            id_jeu = :id_jeu
                        AND
                            id_video = :id_video2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_video', $this->id_video);
            $stmt->bindParam(':id_video2', $this->id_video);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteContenirJeu(){
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

        public function deleteContenirVideo(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            id_video = :id_video';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_video', $this->id_video);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>