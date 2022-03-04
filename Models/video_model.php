<?php 
    class Video {
        //attributs
        public $connect;
        private $table ='videos';

        private $id_video;
        private $nom_video;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_video(){
            return $this->id_video;
        }
    
        public function getNom_video(){
            return $this->nom_video;
        }
    
        public function setNom_video($nom_video){
            $this->nom_video = $nom_video;
        }

        //CRUD

        //create
        public function createVideo(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            nom_video = :nom_video';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_video', $this->nom_video);
            return $stmt->execute();
        }

        //read
        public function readVideo(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleVideo(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_video = :nom_video';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_video', $this->nom_video);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateVideo(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            nom_video = :nom_video
                        WHERE
                            nom_video = :nom_video2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_video', $this->nom_video);
            $stmt->bindParam(':nom_video2', $this->nom_video);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteVideo(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            nom_video = :nom_video';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_video', $this->nom_video);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>