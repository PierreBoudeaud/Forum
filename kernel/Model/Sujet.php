<?php
	include_once(APP.'Model.php');
	class Sujet extends Model{
		
		protected $idsujet;
		protected $libellesujet;
		protected $descriptionsujet;
		protected $utilisateursujet;
		
		public function __construct($id=null, $lib=null, $descrip=null, $idUtil=null){
			parent::__construct('sujet', 'idsujet', true, array('utilisateur' => 'utilisateursujet'));
			$this->idsujet = $id;
			$this->libellesujet = $lib;
			$this->descriptionsujet = $descrip;
			$this->utilisateursujet = $idUtil;
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
			return $this->utilisateursujet;
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
			$this->utilisateursujet = $idUtil;
		}
	}
?>