<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Validation extends CI_Controller {
        public function __construct() {
                parent::__construct();		
        }
        public function index()
        {
                $this->load->model("Utilisateur_Model");
                $this->load->model("Validation_business");

                $nomTable = "personne";
                $class = ucwords($nomTable);
                $this->load->model($class);

                $_utilisateur = $this->session->userdata('user_string');
                $_user = find(new Utilisateur_Model(), "utilisateur",array("id_utilisateur" => $_utilisateur["id_utilisateur"]));


                $validationBusiness = new Validation_business();
                $validationBusiness->initialize($_user[0], $nomTable);

                $validationBusiness->validate();

                $list = getListWithComments($nomTable);
                var_dump($list);
        }
    
}
