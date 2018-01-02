<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Base_Controller.php");
class ImporterFichier extends Base_Controller {

    public $color = array('#d9edf7',"#f5f5f5","#dff0d8","#fcf8e3","#f2dede");
	public function __construct() {
		parent::__construct();

	}

	public function index(){
		$this->load->model("ExpTable");

		$table = new ExpTable();

		$table_ = find($table,"exp_table");
		//echo $this->db->last_query() . '<br>';
		//var_dump($table_);
		$data["exp_table"] = $table_;

		$data["page"] = "importer-fichier.php";

		$this->load->view('base-template',$data);
	}

	public function validerFichier(){
		$table = $this->input->post("table");

        $class = ucwords($table);
        $this->load->model($class);

		$file_name = $this->input->post("file_name");

		if($file_name != ""){

			$file_name = getcwd() . '/assets/uploads/' . $file_name;

            //Insert into Excel
			$this->doo($file_name,$table);

            //Check Validation
            $this->checkValidation($table);

            //return list a affichée
            $list = find(new $class(),$table);

            //var_dump($list);

			$data["column"] = getColumnName($table);

			$data["data_list"] = $list;

			$data["page"] = "liste-importer.php";

            $data["color"] = $this->color;


			$this->load->view('base-template',$data);	
		}
	}


    public function checkValidation($nomTable)
    {
        $this->load->model("Utilisateur_Model");
        $this->load->model("Validation_business");

        
        $class = ucwords($nomTable);
        $this->load->model($class);

        $_utilisateur = $this->session->userdata('user_string');
        $_user = find(new Utilisateur_Model(), "utilisateur",array("id_utilisateur" => $_utilisateur["id_utilisateur"]));


        $validationBusiness = new Validation_business();
        $validationBusiness->initialize($_user[0], $nomTable);

        $validationBusiness->validate();
    }



	public function upload() {

        if (!empty($_FILES)) {

	        $tempFile = $_FILES['file']['tmp_name'];

	        $fileName = $_FILES['file']['name'];

	        $targetPath = 'C:/';

	        $targetFile = $targetPath . $fileName ;

	        move_uploaded_file($tempFile, $targetFile);
	        // if you want to save in db,where here
	        // with out model just for example
	        // $this->load->database(); // load database
	        // $this->db->insert('file_table',array('file_name' => $fileName));
        }
    }

    public function doo($file_name="",$table=""){
        $res=$this->importFile($file_name,$table,1);
        //echo count($res);
        $this->saveData($res);
        
    }
    public function importFile($file_path="",$nom_obj="",$header_row){
        $this->load->library('excel');
        //chargement du fichier
        $objPHPExcel = PHPExcel_IOFactory::load($file_path);
        $this->load->model($nom_obj);
        $worksheet  = $objPHPExcel->getActiveSheet();
        $tab_attribut =[];
        $resultat=array();
        $i=1;
        //Parcours par ligne 
        foreach ($worksheet->getRowIterator() AS $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
            $cells = [];
            //header row marque la ligne
            if($i==$header_row){
            foreach ($cellIterator as $cell) {
                    array_push($tab_attribut,$cell->getValue());
            }
            }
            else{
                $j=0;
                $obj=new $nom_obj();
                $reflection = new ReflectionClass($obj);
                foreach ($cellIterator as $cell) {
                    $attr=$tab_attribut[$j];
                    $property = $reflection->getProperty($attr);
                    $property->setAccessible(true);
                    $property->setValue($obj, $cell->getValue());
                    $j++;
                }
                $property = $reflection->getProperty("etat");
                $property->setAccessible(true);
                $property->setValue($obj,0);
                array_push($resultat,$obj);
                
            }
            
        $i++;
    }
    return $resultat;
}
    public function saveData($array){
        foreach($array as $obj){
            
            saveNoId($obj,$obj->__get("nom_table"));
        }

    }

}