<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegleValidation extends Base_Model {
	public $valeur_regle_validation;
	public $date_regle_validation;
	public $id_utilisateur;
	public $id_exp_table;
	public $id_regle_validation;
	public $commentaire;
	public function __construct($object = NULL){
		$this->nom_table="regle_validation";
		$this->primary_key="id_regle_validation";
		if ($object === NULL) return;
        $this->__set("id_regle_validation", $object->id_regle_validation);
		$this->__set("id_utilisateur", $object->id_utilisateur);
		$this->__set("id_exp_table", $object->id_exp_table);
		$this->__set("valeur_regle_validation", $object->valeur_regle_validation);
		$this->__set("date_regle_validation", $object->date_regle_validation);
		$this->__set("commentaire", $object->commentaire);

		
	}
	public function getFields() {
        return array (
            "id_regle_validation" => $this->__get("id_regle_validation"),
            "id_utilisateur" => $this->__get("id_utilisateur"),
            "id_exp_table" => $this->__get("id_exp_table"),
            "valeur_regle_validation" => $this->__get("valeur_regle_validation"), 
			"date_regle_validation" => $this->__get("date_regle_validation"),
			"commentaire" => $this->__get("commentaire"),
        );
	}
	public function toArray($array) {
        
        $rights = array();
        foreach ($array as $right) {

            $rights[] = new RegleValidation($right);
            
        }
        return $rights;
    }
	
}
