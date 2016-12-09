<?php
	require_once(APP."Controller.php");
	class controller_utilisateur extends controller{
		protected $models;
		
		public function __construct(){
			$this->models = array('Utilisateur');
			parent::__construct($this->models);
		}
		
		public function view($nbvue){
			
			if($this->Utilisateur->read($nbvue)){
				$this->set($this->Utilisateur->toTable());
				$this->render('view');
			}
			
		}
		
		public function list(){
			$this->set($this->Utilisateur->find());
			$this->render('list');
		}
		
		public function new(){
			$this->render('new');
		}
		
		public function create(){
			$this->Utilisateur->setPseudo($_POST['pseudo']);
			$this->Utilisateur->setEmail($_POST['email']);
			$this->Utilisateur->setMDP($_POST['mdp']);
			$this->Utilisateur->create();
			$this->list();
		}
	}
?>