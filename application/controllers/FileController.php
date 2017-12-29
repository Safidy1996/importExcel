<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Base_Controller.php");
class FileController extends Base_Controller {
	public function __construct() {
        parent::__construct();
        
    }
    public function do(){
        $res=$this->importFile('F:/personne.xlsx',"Personne",1);
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
            
            save($obj,$obj->__get("nom_table"));
        }

    }
}
