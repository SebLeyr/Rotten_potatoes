<?php 
    class Rattacher {
        //attributs
        public $connect;
        private $table ='rattacher';
        
        private $id_studio;
        private $id_img;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_studio(){
            return $this->id_studio;
        }
    
        public function setId_studio($id_studio){
            $this->id_studio = $id_studio;
        }
    
        public function getId_img(){
            return $this->id_img;
        }
    
        public function setId_img($id_img){
            $this->id_img = $id_img;
        }

        //CRUD

        //create
        public function createRattacher(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            id_studio = :id_studio,
                            id_img = :id_img';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_studio', $this->id_studio);
            $stmt->bindParam(':id_img', $this->id_img);
            return $stmt->execute();
        }

        //read
        public function readRattacher(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readRattacherJeu(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_studio = :id_studio';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_studio', $this->id_studio);
            $stmt->execute();
            return $stmt;
        }

        public function readRattacherImg(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_img = :id_img';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_img', $this->id_img);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleRattacher(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_studio = :id_studio
                        AND
                            id_img = :id_img';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam('id_studio', $this->id_studio);
            $stmt->bindParam('id_img', $this->id_img);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateRattacher(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            id_img = :id_img
                        WHERE
                            id_studio = :id_studio
                        AND
                            id_img = :id_img2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_studio', $this->id_studio);
            $stmt->bindParam(':id_img', $this->id_img);
            $stmt->bindParam(':id_img2', $this->id_img);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteRattacherJeu(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            id_studio = :id_studio';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_studio', $this->id_studio);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteRattacherImg(){
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