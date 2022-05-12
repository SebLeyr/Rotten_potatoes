<?php 
    class Studio {
        //attributs
        public $connect;
        private $table ='studios';
        
        private $id_studio;
        private $nom_studio;

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
    
        public function getNom_studio(){
            return $this->nom_studio;
        }
    
        public function setNom_studio($nom_studio){
            $this->nom_studio = $nom_studio;
        }

        //CRUD

        //create
        public function createStudio(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            nom_studio = :nom_studio';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_studio', $this->nom_studio);
            return $stmt->execute();
        }

        //read

        //à corriger
        /*
        public function getId_studioByName(){
            $myQuery = 'SELECT
                            id_studio
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_studio = '.$this->nom_studio.'';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }*/

        //read all studios
        public function readStudio(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        //read one studio by name
        public function readSingleStudio(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_studio = :nom_studio';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_studio', $this->nom_studio);
            $stmt->execute();
            return $stmt;
        }

        //read one studio by id
        public function readSingleStudioById(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            id_studio = :id_studio';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_studio', $this->id_studio);
            $stmt->execute();
            return $stmt;
        }

        //read all studio's games
        public function readStudioGames(){
            $myQuery = 'SELECT
                            nom_jeu
                        FROM
                            jeux
                        WHERE
                            jeux.id_studio = (SELECT 
                                                id_studio 
                                            FROM 
                                                '.$this->table.' 
                                            WHERE 
                                                nom_studio = :nom_studio)';
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_studio', $this->nom_studio);
            $stmt->execute();
            return $stmt;
        }

                //read image by studio id
                public function readImageByIdStudio() {
                    $myQuery = 'SELECT
                                    url_img
                                FROM
                                    images
                                INNER JOIN
                                    rattacher
                                ON
                                    rattacher.id_img = images.id_img
                                WHERE
                                    rattacher.id_studio = :id_studio';
        
                    $stmt = $this->connect->prepare($myQuery);
                    $stmt->bindParam(':id_studio', $this->id_studio);
                    $stmt->execute();
                    return $stmt;
                }

        //update
        public function updateStudio(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            nom_studio = :nom_studio
                        WHERE
                            nom_studio = :nom_studio2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_studio', $this->nom_studio);
            $stmt->bindParam(':nom_studio2', $this->nom_studio);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteStudio(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            nom_studio = :nom_studio';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_studio', $this->nom_studio);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>