<?php
	require_once(APP."Controller.php");
	class controller_accueil extends Controller{
		
		protected $models;
		
		public function __construct(){
			$this->models = array();
			parent::__construct($this->models);
		}
		
		
		public function index(){
			$this->render("index");
		}
	}
?>