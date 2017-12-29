<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base_Controller extends CI_Controller {
	public $limit = 10;
	public function __construct() {

		parent::__construct();
		$user = $this->session->userdata('user'); 
		
		if($user != null) {
			
		}
		else {
			redirect('Welcome/index');
		}

	}
}
