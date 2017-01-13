<?php
	require_once(APP."Controller.php");
	class controller_erreur extends Controller{
		
		protected $models;
		
		public function __construct(){
			$this->models = array();
			parent::__construct($this->models);
		}
		
		//Page introuvable
		public function e404(){
			$this->render("e404");
		}
		
		/**
		*	e69 - Communication base de donnée impossible
		*/
		public function e69(){
			$this->render("e69");
		}
		
		/**
		*	eu401 - Erreur de mot de passe ou utilisateur introuvable
		*/
		public function eu401(){
			$this->render("eu401");
		}
		
		/**
		*	e406 - Suppression impossible
		*/
		public function e406(){
			$this->render("e406");
		}
	}
?>
