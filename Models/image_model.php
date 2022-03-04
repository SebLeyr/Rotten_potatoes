<?php 
    class Image {
        //attributs
        public $connect;
        private $table ='images';
        
        private $id_img;
        private $url_img;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_img(){
            return $this->id_img;
        }
    
        public function getUrl_img(){
            return $this->url_img;
        }
    
        public function setUrl_img($url_img){
            $this->url_img = $url_img;
        }

        //CRUD

        //create
        public function createImage(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            url_img = :url_img';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':url_img', $this->url_img);
            return $stmt->execute();
        }

        //read
        public function readImage(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleImage(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            url_img = :url_img';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':url_img', $this->url_img);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateImage(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            url_img = :url_img,
                        WHERE
                            url_img = :url_img2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':url_img', $this->url_img);
            $stmt->bindParam(':url_img2', $this->url_img);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteImage(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            url_img = :url_img';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':url_img', $this->url_img);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>