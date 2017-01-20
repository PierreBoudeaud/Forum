<?php
/**
 * Sujet - Controller des Sujets
 * 
 *
 * @author pboudeaud
 */
    require_once(APP."Controller.php");
    class controller_sujet extends Controller{
        private $models;
        
        public function __construct(){
            $this->models = array("Sujet", "Utilisateur");
            parent::__construct($this->models);
        }
        
        public function liste(){
            $this->set($this->Sujet->find(null, "libellesujet, idsujet"));
            $this->render('liste');
        }
        
        public function newf(){
            $this->render('new');
        }
		
	public function create($idUtil){
            $this->Sujet->setLib($_POST['titre']);
            $this->Sujet->setDesc($_POST['desc']);
            $this->Sujet->setIdUtil($idUtil);
            $this->Sujet->create();
            $this->liste();
	}
        
    }
?>
