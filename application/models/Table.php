<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends Base_Model {
	private $nom_exp_table;
	private $id_exp_table;
	public function __construct(){
		
	}
	public function getFields() {
        return array (
            "id_exp_table" => $this->__get("id_exp_table"),
            "nom_exp_table" => $this->__get("nom_exp_table")
        );
    }

    public function getFieldsNoId() {
        return array (
            "nom_exp_table" => $this->__get("nom_exp_table")
        );
    }

}
