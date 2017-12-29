<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegleNonValide extends Base_Model {
    public $id_regle_non_valide;
    public $nomtable;
    public $id_regle_validation;
    public $id_class;

	public function __construct(){
		$this->nom_table="regle_non_valide";
    }
    public function getFields() {
        return array (
            "id_regle_non_valide" => $this->__get("id_regle_non_valide"),
            "nomtable" => $this->__get("nomtable"),
            "id_regle_validation" => $this->__get("id_regle_validation"),
            "id_regle_validation" => $this->__get("id_regle_validation"),
            "id_class" => $this->__get("id_class")
        );
    }
    public function toArray($array) {
        //var_dump($array);
        $rights = array();
        foreach ($array as $right) {

            $rights[] = new RegleNonValide($right);
            
        }
        return $rights;
    }

	
}
