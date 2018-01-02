<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regle_business extends CI_Model {
	private $utilisateur;
	private $regles;

	public function __construct(){
		parent::__construct();
		
		
	}

	public function initialize($_utilisateur=NULL, $nomTable=NULL){
		if ($_utilisateur === NULL || $nomTable == '') return;
		$this->utilisateur = $_utilisateur;

		
		
		$this->set_regles($_utilisateur, $nomTable);
	}

	public function __get($name) {
		if(isset($this->$name)) {
            if(is_string($this->$name) && (strcmp($this->$name, "undefined")==0 OR strcmp($this->$name, "null")==0)) return NULL;
            return $this->$name;
        }
		return NULL;
	}

	public function update_regles_par_validite($object) {
		$valide = true;
		foreach ($this->regles as $regle) {
		    if(!$this->udpate_regle_par_validite($regle, $object)) $valide = false;
		}

		if($valide) {
			$table = $object->__get("nom_table");
			$pk_table = $object->__get("primary_key");
			$object->setValide(true);

			update($object, $table, $pk_table);
		}
		
	}
	public function udpate_regle_par_validite($regle, $object) {

		if($this->is_regle_valide($regle, $object)) {
			return true;
		} else{
			$pk_table = $object->__get("primary_key");
			$table = $object->__get("nom_table");
			$id_regle = $regle->__get("id_regle_validation");
			$id_class = $object->__get($pk_table);

			$regleNonValide = new RegleNonValide();
			$regleNonValide->__set('nomtable',$table);
			$regleNonValide->__set('id_regle_validation',$id_regle);
			$regleNonValide->__set('id_class',$id_class);

			$instance = camel_case($table);
			saveNoId($regleNonValide,$regleNonValide->nom_table);

			return false;
		}
	}

	public function is_regle_valide($regle, $object) {
		$nomAttribut1 = $this->getNomAttribut($regle, 0);
		$nomAttribut2 = $this->getNomAttribut($regle, 1);

		$valeurAttribut1 = $this->getValeurAttribut($object,  $nomAttribut1);

		if(is_numeric($nomAttribut2)) $valeurAttribut2 = $nomAttribut2;
		else if($nomAttribut2 == '') $valeurAttribut2 = '';
		else $valeurAttribut2 = $this->getValeurAttribut($object,  $nomAttribut2);
		
		$operation = $this->get0peration($regle);
		
		switch ($operation->__get("libelle_operation_standard")) {
			case 'obligatoire':
				return $valeurAttribut1 != NULL && $valeurAttribut1 != '' && $valeurAttribut1 != 0;
				break;
			case '<':
				return $valeurAttribut1 <= $valeurAttribut2;
				break;
			case '>':
				return $valeurAttribut1 >= $valeurAttribut2;
				break;
			case '=':
				return $valeurAttribut1 == $valeurAttribut2;
				break;

			
			default:
				return null;
		}
	}



	//personne.dette > personne.creance : recuperer dette en tant que string si indice attribut est egale à 1
	//return null si l'indice n'est pas present, ne throw pas des exceptions
	public function getNomAttribut($regle, $indiceAttribut) {
		$nomAttribut = NULL;
		
		$operation = $this->get0peration($regle);
		
		$nomAttribut = explode ( $operation->__get('libelle_operation_standard') , $regle->__get("valeur_regle_validation"))[$indiceAttribut];
		
		return $nomAttribut;
	}


	//personne.dette > personne.creance : recuperer la dette de la personne si le nomAttribut = dette
	//return null si l'object ne contient pas d'attribut ayant le nom, ne throw pas des exceptions
	public function getValeurAttribut($object,  $nomAttribut) {
		$valeurAttribut = NULL;
		
		//to do
		//$reflector = new ReflectionClass($editor);
        //$getterMethod = $reflector->getMethod('__get');

		//$getterMethod->invoke($object, $nomAttribut);
		 //echo $nomAttribut."<br>";
		$valeurAttribut = $object->__get($nomAttribut);
		//var_dump($object); echo "<br>";
		//var_dump($object->__get("nom_personne"));
		return $valeurAttribut;
	}

	//personne.dette > personne.creance : recuperer le symbole superieur
	public function get0peration($regle) {
		$operation = NULL;

		$operationStandard = new OperationStandard();
		$_operationStandards = find($operationStandard, "operation_standard");

		foreach ($_operationStandards as $operationStandard) {
			if (strpos($regle->__get("valeur_regle_validation"), $operationStandard->__get("libelle_operation_standard")) !== false) {
			    return $operationStandard;
			}
		}

		return $operation;
	}

	//fonction qui retourn toute les regles d'un utilisateur pour une table
	public function set_regles($utilisateur, $table) {
		$regles = NULL;

		

		$regle = new RegleValidation();
		$expTable = new ExpTable();

		$idExpTable = NULL;

		$expTables = find($expTable, "exp_table", array("nom_exp_table" => $table));

		$nbreResult = sizeof($expTables);
		if($nbreResult == 1){
			$idExpTable = $expTables[0]->__get("id_exp_table");
		} else return null;
		
		$regles = find($regle, "regle_validation", array("id_utilisateur" => $utilisateur->id_utilisateur, "id_exp_table" => $idExpTable ));

		$regle_object = arrayAssociatifToObjectTable($regles,"RegleValidation","regle_validation");

		$this->regles = $regle_object;

	}

}