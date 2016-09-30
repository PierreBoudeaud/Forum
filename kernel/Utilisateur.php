<?php
	include('Model.php');
	class Utilisateur extends Model{
		
		protected $idutilisateur;
		protected $pseudoutilisateur;
		protected $emailutilisateur;
		protected $mdputilisateur;
		
		//Attributs techniques
		protected $table;
		protected $pk;
		
		public function __construct($id, $pseudo, $eMail, $mDP){
			$this->idutilisateur = $id;
			$this->pseudoutilisateur = $pseudo;
			$this->emailutilisateur = $eMail;
			$this->mdputilisateur = $mDP;
			$this->table = 'utilisateur';
			$this->pk = 'idutilisateur';
		}

		public function getId(){
			return $this->idutilisateur;
		}

		public function getPseudo(){
			return $this->pseudoutilisateur;
		}

		public function getEMail(){
			return $this->emailutilisateur;
		}

		public function getmDP(){
			return $this->mdputilisateur;
		}

		public function setId($id){
			$this->idutilisateur = $id;
		}

		public function setPseudo($pseudo){
			$this->pseudoutilisateur = $pseudo;
		}

		public function setEMail($eMail){
			$this->emailutilisateur = $eMail;
		}

		public function setmDP($mDP){
			$this->mdputilisateur = $mDP;
		}

	}
?>