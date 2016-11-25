<?php
	include_once(APP.'Model.php');
	class Utilisateur extends Model{
		
		protected $idutilisateur;
		protected $pseudoutilisateur;
		protected $emailutilisateur;
		protected $mdputilisateur;
		
		/**
		*		__construct - Construit l'objet Model
		*
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function __construct($id=null, $pseudo=null, $eMail=null, $mDP=null){
			//parent:: <=> super en Java
			parent::__construct('utilisateur', 'idutilisateur', true, null);
			$this->idutilisateur = $id;
			$this->pseudoutilisateur = $pseudo;
			$this->emailutilisateur = $eMail;
			$this->mdputilisateur = $mDP;
		}

		/**
		*		getId - Retourne l'id de l'utilisateur
		*
		*		@return $this->idutilisateur 
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
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