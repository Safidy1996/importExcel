<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Base_Model.php");
class Personne extends Base_Model {

    public $nom_personne;
    public $prenom_personne;
    public $dette_personne;
    public $creance_personne;
    public $id_personne;
    public $commentaire;
	public function __construct($object = NULL){
        
        parent::__construct($object);

        $this->nom_table="personne";
        $this->primary_key="id_personne";
        if ($object === NULL) return;
        $this->__set("id_personne", $object->id_personne);
        $this->__set("etat", $object->etat);
        $this->__set("nom_personne", $object->nom_personne);
        $this->__set("prenom_personne", $object->prenom_personne);
        $this->__set("dette_personne", $object->dette_personne);
        $this->__set("creance_personne", $object->creance_personne);


    }
    
    public function __get($name) {
		if(isset($this->$name)) {
            if(is_string($this->$name) && (strcmp($this->$name, "undefined")==0 OR strcmp($this->$name, "null")==0)) return NULL;
            return $this->$name;
        }
		return NULL;
    }
       
	public function getFields() {
        return array (
            "id_personne" => $this->__get("id_personne"),
            "etat" => $this->__get("etat"),
            "nom_personne" => $this->__get("nom_personne"),
            "prenom_personne" => $this->__get("prenom_personne"), 
            "dette_personne" => $this->__get("dette_personne"),
            "creance_personne" => $this->__get("creance_personne")
        );
    }
    
    public function toArray($array) {
        
        $rights = array();
        foreach ($array as $right) {

            $rights[] = new Personne($right);
            
        }
        return $rights;
    }

}
