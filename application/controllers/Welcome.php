
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		

	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guid_utilisateure/general/urls.html
	 */
	public function index()
	{
		/*$data["page"] = "sign-in.php";
		$this->load->view('base-template',$data);*/
		$this->load->view('sign-in.php');
	}

	public function signup()
	{
		/*$data["page"] = "sign-in.php";
		$this->load->view('base-template',$data);*/
		$this->load->view('sign-up.php');
	}

	public function validate_signup(){
		$this->load->model('Utilisateur_Model');

		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$sexe = $this->input->post('sexe');
		$mail = $this->input->post('mail');
		$pwd = $this->input->post('password');


		$model = new Utilisateur_Model();

		$model->__set("nom_utilisateur", $nom);
		$model->__set("prenom_utilisateur", $prenom);
		$model->__set("sexe_utilisateur", $sexe);
		$model->__set("mail_utilisateur", $mail);
		$model->__set("mdp_utilisateur", sha1($pwd));
		
		save($model, 'utilisateur');
		
		redirect(base_url('Welcome/index'));
	}

	
	public function home()  
	{

		$data["page"] = "home.php";
		$this->load->view('base-template',$data);
	}

	public function authentificate() {
		$this->load->model('Utilisateur_Model');
		
		$login = $this->input->post('mail');
		$mdp = $this->input->post('password');
		
		$row = $this->Utilisateur_Model->isAuthentificate($login,$mdp);
		if($row != null)
			$this->set_user_to_session($row);
		// Connection reussi
		if($row != null) {
			//Vérification type utilisateur
			$this->home();
		}

		// Probleme de connection
		else{
			$this->logout(true);
		}
	}

	private function set_user_to_session($user){
		$this->session->set_userdata('user',$user);
		$this->session->set_userdata('user_string',$user->getFields());
	}
		
	public function logout($isError = false) {
		$this->session->sess_destroy();
		if($isError){
			$data["error"] = "Identifiant ou mot de passe invalide";
			$this->load->view('sign-in.php',$data);
		}
		else
			redirect('Welcome/index');
	}

	public function erreur($message="Vous n'avez pas l'autrorisation pour consulter cete page"){
		$data["page"] = "error.php";
		$data["message"] = $message;
		$data["menu"] = "Erreur";
		$this->load->view('base-template',$data);
	}




}
