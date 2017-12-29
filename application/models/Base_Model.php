<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Model extends CI_Model {
	private $id;
	protected $nom_table;
	protected $primary_key;
	protected $etat;
	public $commentaire;
	public function __construct($object = NULL){
		if ($object === NULL) return;
		try{
			if(isset($object->commentaire))
				$this->__set("commentaire", $object->commentaire);        
		}
		catch(Exception $e){

		}
		
	}
	
	public function __get($name) {
		if(isset($this->$name)) {
            if(is_string($this->$name) && (strcmp($this->$name, "undefined")==0 OR strcmp($this->$name, "null")==0)) return NULL;
            return $this->$name;
        }
		return NULL;
	}
	public function __set($property,$value){
		
		$this->$property= $value;
		
	}
	public function setValide($value){
		$this->etat=$value;
	}
	public function toArray($array) {
        //var_dump($array);
        $rights = array();
        foreach ($array as $right) {

            $rights[] = new ExpTable($right);
            
        }
        return $rights;
    }
	
}
