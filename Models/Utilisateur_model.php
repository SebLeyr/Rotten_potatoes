<?php 
    class User {
        //attributs
        public $connect;
        private $table ='users';
        
        private $id_user;
        private $pseudo_user;
        private $email_user;
        private $password_user;
        private $id_droit;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_user(){
            return $this->id_user;
        }

        public function setIdUser($id_user) {
            $this->id_user = $id_user;
        }
    
        public function getPseudo_user(){
            return $this->pseudo_user;
        }
    
        public function setPseudo_user($pseudo_user){
            $this->pseudo_user = $pseudo_user;
        }
    
        public function getEmail_user(){
            return $this->email_user;
        }
    
        public function setEmail_user($email_user){
            $this->email_user = $email_user;
        }
    
        public function getPassword_user(){
            return $this->password_user;
        }
    
        public function setPassword_user($password_user){
            $this->password_user = $password_user;
        }
    
        public function getId_droit(){
            return $this->id_droit;
        }
    
        public function setId_droit($id_droit){
            $this->id_droit = $id_droit;
        }

        //CRUD

        //create
        public function createUser(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            pseudo_user = :pseudo_user,
                            email_user = :email_user,
                            password_user = :password_user,
                            id_droit = :id_droit';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':pseudo_user', $this->pseudo_user);
            $stmt->bindParam(':email_user', $this->email_user);
            $stmt->bindParam(':password_user', $this->password_user);
            $stmt->bindParam(':id_droit', $this->id_droit);
            return $stmt->execute();
        }

        //read all users
        public function getUser(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        //read user by pseudo
        public function getSingleUser(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            pseudo_user = :pseudo_user';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':pseudo_user', $this->pseudo_user);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateUser(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            pseudo_user = :pseudo_user,
                            email_user = :email_user,
                            password_user = :password_user,
                            id_droit = :id_droit
                        WHERE
                            id_user = :id_user';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':pseudo_user', $this->pseudo_user);
            $stmt->bindParam(':email_user', $this->email_user);
            $stmt->bindParam(':password_user', $this->password_user);
            $stmt->bindParam(':id_droit', $this->id_droit);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteUser(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            pseudo_user = :pseudo_user';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':pseudo_user', $this->pseudo_user);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // verify if pseudo already exist
        public function verifyPseudo() {
            $myQuery = 'SELECT
                            *
                        FROM
                            '.$this->table.'
                        WHERE
                            pseudo_user = :pseudo_user';

            $stmt = $this->connect->prepare($myQuery);

            $stmt->bindParam(':pseudo_user', $this->pseudo_user);
            $stmt->execute();
            return $stmt;
        }

        // verify if mail already exist
        public function verifyMail() {
            $myQuery = 'SELECT
                            *
                        FROM
                            '.$this->table.'
                        WHERE
                            email_user = :email_user';

            $stmt = $this->connect->prepare($myQuery);

            $stmt->bindParam(':email_user', $this->email_user);
            $stmt->execute();
            return $stmt;
        }
    }
?>