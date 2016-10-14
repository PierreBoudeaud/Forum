<?php
	class Utilisateur extends Model{
		
		protected $idutilisateur;
		protected $pseudoutilisateur;
		protected $emailutilisateur;
		protected $mdputilisateur;
		
		public function __construct($id, $pseudo, $eMail, $mDP){
			//parent:: <=> super en Java
			parent::__construct('utilisateur', 'idutilisateur', true);
			$this->idutilisateur = $id;
			$this->pseudoutilisateur = $pseudo;
			$this->emailutilisateur = $eMail;
			$this->mdputilisateur = $mDP;
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