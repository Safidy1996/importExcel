<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExpTable extends Base_Model {

    public $id_exp_table;
	public $nom_exp_table;

	public function __construct($object = NULL){
		$this->nom_table="exp_table";
        $this->primary_key="id_exp_table";
        if ($object === NULL) return;

        $this->__set("id_exp_table", $object->id_exp_table);
        $this->__set("nom_exp_table", $object->nom_exp_table);

	}
	public function getFields() {
        return array (
            "id_exp_table" => $this->__get("id_exp_table"),
            "nom_exp_table" => $this->__get("nom_exp_table")
        );
    }


    public function toArray($array) {
        $rights = array();
        foreach ($array as $right) {
            $rights[] = new ExpTable($right);
            
        }
        return $rights;
    }

    

}
