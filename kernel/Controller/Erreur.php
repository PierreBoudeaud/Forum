<?php
	require_once(APP."Controller.php");
	class Erreur extends Controller{
		public function __construct(){
			parent:__construct();
		}
		
		public function e404(){
			$this->render("e404");
		}
	}
?>