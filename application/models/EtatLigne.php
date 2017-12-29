<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EtatLigne extends Base_Model {
    private $libelle_etat_ligne;
    private $liste;
    private $id_etat_ligne;
	public function __construct(){
		$this->nom_table="etat_ligne";
    }
    public function getFields() {
        return array (
            "id_etat_ligne" => $this->__get("id_etat_ligne"),
            "libelle_etat_ligne" => $this->__get("libelle_etat_ligne")
        );
    }

	
}
