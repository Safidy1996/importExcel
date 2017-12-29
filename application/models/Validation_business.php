<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation_business extends CI_Model {
	public $baseModels;
	public $regleBusiness;

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
		$class = ucwords($nomTable);
		$this->load->model($class);
		$temp = new $class();
		$this->baseModels = find($temp, $nomTable);

		//echo $nomTable."<br>".$this->db->last_query();
		//echo $class."<br>";
		//var_dump($this->baseModels); echo "<br>";
	}

	public function validate() {
		
		foreach($this->baseModels as $baseModel) {

			$this->regleBusiness->update_regles_par_validite($baseModel);
		}
	}
}