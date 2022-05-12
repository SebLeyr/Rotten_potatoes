<?php 
    class Jeu {
        //attributs
        public $connect;
        private $table ='jeux';
        
        private $id_jeu;
        private $nom_jeu;
        private $date_sortie_jeu;
        private $nombre_de_joueurs;
        private $resume_jeu;
        private $id_studio;
        private $id_editeur;

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
    
        public function getNom_jeu(){
            return $this->nom_jeu;
        }
    
        public function setNom_jeu($nom_jeu){
            $this->nom_jeu = $nom_jeu;
        }
    
        public function getDate_sortie_jeu(){
            return $this->date_sortie_jeu;
        }
    
        public function setDate_sortie_jeu($date_sortie_jeu){
            $this->date_sortie_jeu = $date_sortie_jeu;
        }
    
        public function getNombre_de_joueurs(){
            return $this->nombre_de_joueurs;
        }
    
        public function setNombre_de_joueurs($nombre_de_joueurs){
            $this->nombre_de_joueurs = $nombre_de_joueurs;
        }
    
        public function getResume_jeu(){
            return $this->resume_jeu;
        }
    
        public function setResume_jeu($resume_jeu){
            $this->resume_jeu = $resume_jeu;
        }
    
        public function getId_studio(){
            return $this->id_studio;
        }
    
        public function setId_studio($id_studio){
            $this->id_studio = $id_studio;
        }
    
        public function getId_editeur(){
            return $this->id_editeur;
        }
    
        public function setId_editeur($id_editeur){
            $this->id_editeur = $id_editeur;
        }

        //CRUD

        //create
        public function createJeu(){
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            nom_jeu = :nom_jeu,
                            date_sortie_jeu = :date_sortie_jeu,
                            nombre_de_joueurs = :nombre_de_joueurs,
                            resume_jeu = :resume_jeu,
                            id_studio = :id_studio,
                            id_editeur = :id_editeur';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_jeu', $this->nom_jeu);
            $stmt->bindParam(':date_sortie_jeu', $this->date_sortie_jeu);
            $stmt->bindParam(':nombre_de_joueurs', $this->nombre_de_joueurs);
            $stmt->bindParam(':resume_jeu', $this->resume_jeu);
            $stmt->bindParam(':id_studio', $this->id_studio);
            $stmt->bindParam(':id_editeur', $this->id_editeur);
            return $stmt->execute();
        }

        //read

        //read all games
        public function readJeu(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }

        //read one game by name
        public function readSingleJeu(){
            $myQuery = 'SELECT 
                            * 
                        FROM
                            '.$this->table.'
                        WHERE
                            nom_jeu = :nom_jeu';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_jeu', $this->nom_jeu);
            $stmt->execute();
            return $stmt;
        }

        //read platform by game id
        public function readPlateformeByIdJeu() {
            $myQuery = 'SELECT
                            nom_plateforme
                        FROM
                            plateformes
                        INNER JOIN
                            distribuer
                        ON
                            distribuer.id_plateforme = plateformes.id_plateforme
                        WHERE
                            distribuer.id_jeu = :id_jeu';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->execute();
            return $stmt;
        }

        //read type by game id
        public function readGenreByIdJeu() {
            $myQuery = 'SELECT
                            nom_genre
                        FROM
                            genres
                        INNER JOIN
                            associer
                        ON
                            associer.id_genre = genres.id_genre
                        WHERE
                            associer.id_jeu = :id_jeu';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':id_jeu', $this->id_jeu);
            $stmt->execute();
            return $stmt;
        }

        //update
        public function updateJeu(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            nom_jeu = :nom_jeu,
                            date_sortie_jeu = :date_sortie_jeu,
                            nombre_de_joueurs = :nombre_de_joueurs,
                            resume_jeu = :resume_jeu,
                            id_studio = :id_studio,
                            id_editeur = :id_editeur
                        WHERE
                            nom_jeu = :nom_jeu2,
                            date_sortie_jeu = :date_sortie_jeu2,
                            nombre_de_joueurs = :nombre_de_joueurs2,
                            resume_jeu = :resume_jeu2,
                            id_studio = :id_studio2,
                            id_editeur = :id_editeur2';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_jeu', $this->nom_jeu);
            $stmt->bindParam(':nom_jeu2', $this->nom_jeu);
            $stmt->bindParam(':date_sortie_jeu', $this->date_sortie_jeu);
            $stmt->bindParam(':date_sortie_jeu2', $this->date_sortie_jeu);
            $stmt->bindParam(':nombre_de_joueurs', $this->nombre_de_joueurs);
            $stmt->bindParam(':nombre_de_joueurs2', $this->nombre_de_joueurs);
            $stmt->bindParam(':resume_jeu', $this->resume_jeu);
            $stmt->bindParam(':resume_jeu2', $this->resume_jeu);
            $stmt->bindParam(':id_studio', $this->id_studio);
            $stmt->bindParam(':id_studio2', $this->id_studio);
            $stmt->bindParam(':id_editeur', $this->id_editeur);
            $stmt->bindParam(':id_editeur2', $this->id_editeur);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //delete
        public function deleteJeu(){
            $myQuery = 'DELETE FROM
                            '.$this->table.'
                        WHERE
                            nom_jeu = :nom_jeu';
            
            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(':nom_jeu', $this->nom_jeu);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>