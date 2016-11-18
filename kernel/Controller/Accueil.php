<?php
	require_once(APP."Controller.php");
	class Accueil extends Controller{
		//protected $models = array('');
		
		public function index(){
			$this->render("index");
		}
	}
?>