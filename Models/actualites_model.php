<?php 
    class Actualite {
        //attributs
        public $connect;
        private $table ='actualites';
        
        private $id_actu;
        private $nom_actu;
        private $texte_actu;

        public function __construct(){
            $this->connect = new Bdd();
            $this->connect = $this->connect->getConnexion();
        }

        //getters setters

        public function getTable(){
            return $this->table;
        }
    
        public function getId_actu(){
            return $this->id_actu;
        }
    
        public function getNom_actu(){
            return $this->nom_actu;
        }
    
        public function setNom_actu($nom_actu){
            $this->nom_actu = $nom_actu;
        }
    
        public function getTexte_actu(){
            return $this->texte_actu;
        }
    
        public function setTexte_actu($texte_actu){
            $this->texte_actu = $texte_actu;
        }

        //CRUD
        //create
        public function createActu(){}
        //read
        public function readActu(){}
        //update
        public function updateActu(){}
        //delete
        public function deleteActu(){}
    }
?>