<?php
	class Sujet extends Model{
		
		protected $idsujet;
		protected $libellesujet;
		protected $descriptionsujet;
		protected $idutilisateursujet;
		
		public function __construct($id, $lib, $descrip, $idUtil){
			parent::__construct('sujet', 'idsujet', true);
			$this->idsujet = $id;
			$this->libellesujet = $lib;
			$this->descriptionsujet = $descrip;
			$this->idutilisateursujet = $idUtil;
		}
		
		public function getId(){
			return $this->idsujet;
		}
		
		public function getLib(){
			return $this->libellesujet;
		}
		
		public function getDesc(){
			return $this->descriptionsujet;
		}
		
		public function getIdUtil(){
			return $this->idutilisateursujet;
		}
		
		public function setId($id){
			$this->idsujet = $id;
		}
		
		public function setLib($lib){
			$this->libellesujet = $lib;
		}
		
		public function setDesc($Desc){
			$this->descriptionsujet = $Desc;
		}
		
		public function setIdUtil($idUtil){
			$this->idutilisateursujet = $idUtil;
		}
	}
?>