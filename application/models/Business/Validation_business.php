<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation_business extends CI_Model {
	private $baseModels;
	private $regleBusiness;

	public function __construct(){
		parent::__construct();
	}

	public function initialize($utilisateur, $nomTable){
		$this->load->model("Business/Regle_business");
		
		$this->regleBusiness = new Regle_business();
		$this->regleBusiness->initialize($utilisateur, $nomTable);

		$this->set_bases_model($nomTable);
		
	}

	private function set_bases_model($nomTable) {
		$baseModels = find(new $nomTable(), $nomTable);
	}

	public function validate() {
		foreach($baseModels as $baseModel) {
			$this->regleBusiness->update_regles_par_validite($baseModel);
		}
	}
}