<?php 
    class Utilisateur {
        //attributs
        public $connect;
        private $table ='utilisateurs';
        
        private $id_util;
        private $pseudo_util;
        private $date_util;
        private $email_util;
        private $mot_de_passe_util;
        private $id_droit;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_util(){
            return $this->id_util;
        }
    
        public function getPseudo_util(){
            return $this->pseudo_util;
        }
    
        public function setPseudo_util($pseudo_util){
            $this->pseudo_util = $pseudo_util;
        }
    
        public function getDate_util(){
            return $this->date_util;
        }
    
        public function setDate_util($date_util){
            $this->date_util = $date_util;
        }
    
        public function getEmail_util(){
            return $this->email_util;
        }
    
        public function setEmail_util($email_util){
            $this->email_util = $email_util;
        }
    
        public function getMot_de_passe_util(){
            return $this->mot_de_passe_util;
        }
    
        public function setMot_de_passe_util($mot_de_passe_util){
            $this->mot_de_passe_util = $mot_de_passe_util;
        }
    
        public function getId_Utilisateur(){
            return $this->id_droit;
        }
    
        public function setId_droit($id_droit){
            $this->id_droit = $id_droit;
        }

        //CRUD

        //create
        public function createUtilisateur(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            pseudo_util = :pseudo_util,
                            date_util = :date_util,
                            email_util = :email_util,
                            mot_de_passe_util = :mot_de_passe_util,
                            id_droit = :id_droit';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':pseudo_util', $this->pseudo_util);
            $stmt->bindParam(':date_util', $this->date_util);
            $stmt->bindParam(':email_util', $this->email_util);
            $stmt->bindParam(':mot_de_passe_util', $this->mot_de_passe_util);
            $stmt->bindParam(':id_droit', $this->id_droit);
            return $stmt->execute();
        }

        //read
        public function readUtilisateur(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleUtilisateur(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            pseudo_util = :pseudo_util';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':pseudo_util', $this->pseudo_util);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateUtilisateur(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            pseudo_util = :pseudo_util,
                            date_util = :date_util,
                            email_util = :email_util,
                            mot_de_passe_util = :mot_de_passe_util,
                            id_droit = :id_droit
                        WHERE
                            pseudo_util = :pseudo_util2,
                            date_util = :date_util2,
                            email_util = :email_util2,
                            mot_de_passe_util = :mot_de_passe_util2,
                            id_droit = :id_droit2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':pseudo_util', $this->pseudo_util);
            $stmt->bindParam(':pseudo_util2', $this->pseudo_util);
            $stmt->bindParam(':date_util', $this->date_util);
            $stmt->bindParam(':date_util2', $this->date_util);
            $stmt->bindParam(':email_util', $this->email_util);
            $stmt->bindParam(':email_util2', $this->email_util);
            $stmt->bindParam(':mot_de_passe_util', $this->mot_de_passe_util);
            $stmt->bindParam(':mot_de_passe_util2', $this->mot_de_passe_util);
            $stmt->bindParam(':nom_droit', $this->nom_droit);
            $stmt->bindParam(':nom_droit2', $this->nom_droit);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteUtilisateur(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            pseudo_util = :pseudo_util';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':pseudo_util', $this->pseudo_util);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>