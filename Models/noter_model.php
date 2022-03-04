<?php 
    class Noter {
        //attributs
        public $connect;
        private $table ='noter';
        
        private $id_jeu;
        private $id_util;
        private $note;

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
    
        public function getNote(){
            return $this->note;
        }
    
        public function setNote($note){
            $this->note = $note;
        }

        //CRUD

        //create
        public function createNote(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            id_jeu = :id_jeu,
                            id_util = :id_util,
                            note = :note';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_util', $this->id_util);
            $stmt->bindParam(':note', $this->note);
            return $stmt->execute();
        }

        //read
        public function readNote(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readNoteJeu(){
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

        public function readNoteUtil(){
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

        public function readSingleNote(){
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
        public function updateNote(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            note = :note,
                        WHERE
                            note = :note2
                        AND
                            id_jeu = :id_jeu
                        AND
                            id_util = :id_util';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->bindParam(':id_util', $this->id_util);
            $stmt->bindParam(':note', $this->note);
            $stmt->bindParam(':note2', $this->note);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteNoteJeu(){
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

        public function deleteNoteUtil(){
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