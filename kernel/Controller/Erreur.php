<?php
	require_once(APP."Controller.php");
	class controller_erreur extends Controller{
		
		protected $models;
		
		public function __construct(){
			$this->models = array();
			parent::__construct($this->models);
		}
		
		public function e404(){
			$this->render("e404");
		}
		
		public function e69(){
			$this->render("e69");
		}
		
		public function eu401(){
			$this->render("eu401");
		}
		
		public function e406(){
			$this->render("e406");
		}
	}
?>