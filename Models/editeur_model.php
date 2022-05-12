<?php 
    class Editeur {
        //attributs
        public $connect;
        private $table ='editeurs';
        
        private $id_editeur;
        private $nom_editeur;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_editeur(){
            return $this->id_editeur;
        }

        public function setId_editeur($id_editeur){
            $this->id_editeur = $id_editeur;
        }
    
        public function getNom_editeur(){
            return $this->nom_editeur;
        }
    
        public function setNom_editeur($nom_editeur){
            $this->nom_editeur = $nom_editeur;
        }

        //CRUD

        //create
        public function createEditeur(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            nom_editeur = :nom_editeur';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_editeur', $this->nom_editeur);
            return $stmt->execute();
        }

        //read
        //à corriger
        /*
        public function getId_editeurByName(){
            $myQuery = 'SELECT
                            id_editeur
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_editeur = '.$this->nom_editeur.'';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }*/

        //read all editors
        public function readEditeur(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        //read one editor by name
        public function readSingleEditeur(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_editeur = :nom_editeur';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_editeur', $this->nom_editeur);
            $stmt->execute();
            return $stmt;
        }

        //read one editor by id
        public function readSingleEditeurById(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_editeur = :id_editeur';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_editeur', $this->id_editeur);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateEditeur(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            nom_editeur = :nom_editeur
                        WHERE
                            nom_editeur = :nom_editeur2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_editeur', $this->nom_editeur);
            $stmt->bindParam(':nom_editeur2', $this->nom_editeur);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteEditeurt(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            nom_editeur = :nom_editeur';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_editeur', $this->nom_editeur);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>