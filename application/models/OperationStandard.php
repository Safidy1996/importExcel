<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OperationStandard extends Base_Model {

    public $libelle_operation_standard="";
    public $id_operation_standard;

	public function __construct($object = NULL){

        $this->nom_table="operation_standard";

        $this->primary_key="id_operation_standard";

        if ($object === NULL) return;

        $this->__set("id_operation_standard", $object->id_operation_standard);

        $this->__set("libelle_operation_standard", $object->libelle_operation_standard);

    }
    public function getFields() {

        return array (
            "id_operation_standard" => $this->__get("id_operation_standard"),
            "libelle_operation_standard" => $this->__get("libelle_operation_standard")
        );
        
    }
    public function toArray($array) {
        //var_dump($array);
        $rights = array();
        foreach ($array as $right) {

            $rights[] = new OperationStandard($right);
            
        }
        return $rights;
    }
    

	
}
