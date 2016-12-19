<?php
	require_once(APP."Controller.php");
	class controller_accueil extends Controller{
		
		protected $models;
		
		public function __construct(){
			$this->models = array();
			parent::__construct($this->models);
		}
		
		
		public function index(){
                    require_once(CONTROLLER."Sujet.php");
                        $Sujet = new controller_sujet();
			$Sujet->liste();
		}
	}
?>