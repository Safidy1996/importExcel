<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur_Model extends CI_Model {

	public $id_utilisateur;
    public $nom_utilisateur;
    public $prenom_utilisateur;
	public $mail_utilisateur;
	public $sexe_utilisateur;
	public $mdp_utilisateur;

	public function __construct($object = NULL){
		if ($object === NULL) return;
        $this->__set("id_utilisateur", $object->id_utilisateur);
		$this->__set("nom_utilisateur", $object->nom_utilisateur);
		$this->__set("prenom_utilisateur", $object->prenom_utilisateur);
		$this->__set("mail_utilisateur", $object->mail_utilisateur);
		$this->__set("sexe_utilisateur", $object->sexe_utilisateur);
		$this->__set("mdp_utilisateur", $object->mdp_utilisateur);
	}
	
	public function __set($name, $value) {
		$this->$name = $value;
	}
	
	public function __get($name) {
		if(isset($this->$name)) {
            if(is_string($this->$name) && (strcmp($this->$name, "undefined")==0 OR strcmp($this->$name, "null")==0)) return NULL;
            return $this->$name;
        }
		return NULL;
	}

    public function toArray($array) {
        $rights = array();
        foreach ($array as $right) {

            $rights[] = new Utilisateur_Model($right);
        }
        return $rights;
    }

    public function getFields() {
        return array (
            "id_utilisateur" => $this->__get("id_utilisateur"),
            "nom_utilisateur" => $this->__get("nom_utilisateur"),
            "prenom_utilisateur" => $this->__get("prenom_utilisateur"),
            "mail_utilisateur" => $this->__get("mail_utilisateur"),
            "sexe_utilisateur" => $this->__get("sexe_utilisateur"),
            "mdp_utilisateur" => $this->__get("mdp_utilisateur")
        );
    }
    public function getFieldsNoId() {
        return array (
            "nom_utilisateur" => $this->__get("nom_utilisateur"),
            "prenom_utilisateur" => $this->__get("prenom_utilisateur"),
            "mail_utilisateur" => $this->__get("mail_utilisateur"),
            "sexe_utilisateur" => $this->__get("sexe_utilisateur"),
            "mdp_utilisateur" => $this->__get("mdp_utilisateur")
        );
    }

    public function isAuthentificate($mail_utilisateur,$mdp_utilisateur){

		//$query = "select * from utilisateur where sexe_utilisateur = '".$sexe_utilisateur."' and mdp_utilisateur = '".sha1($mdp_utilisateur)."'";
		$result = find(new Utilisateur_Model(), 'utilisateur', array('mail_utilisateur' => $mail_utilisateur,'mdp_utilisateur' => sha1($mdp_utilisateur)));

		$nbreResult = sizeof($result);
		if($nbreResult == 1){
			return $result[0];
		}
		else
			return null;
	}
}
