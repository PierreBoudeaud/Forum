<?php
	include_once(APP.'Model.php');
	class Message extends Model{
		protected $idmessage;
		protected $contenumessage;
		protected $datemessage;
		protected $datemodificationmessage;
		protected $sujetmessage;
		protected $utilisateurmessage;
		
		public function __construct($id=null, $contenu=null, $date=null, $dateModif=null, $idSujet=null, $idUtil=null){
			parent::__construct('message', 'idmessage', true, array('sujet' => 'sujetmessage', 'utilisateur' => 'utilisateurmessage'));
			$this->idmessage = $id;
			$this->contenumessage = $contenu;
			$this->datemessage = $date;
			$this->datemodificationmessage = $dateModif;
			$this->sujetmessage = $idSujet;
			$this->utilisateurmessage = $idUtil;
		}
		
		public function getId(){
			return $this->idmessage;
		}
		
		public function getContenu(){
			return $this->contenumessage;
		}
		
		public function getDate(){
			return $this->datemessage;
		}
		
		public function getDateModif(){
			return $this->datemodificationmessage;
		}
		
		public function getSujet(){
			return $this->sujetmessage;
		}
		
		public function getUtil(){
			return $this->utilisateurmessage;
		}
		
		public function setId($id){
			$this->idmessage;
		}
		
		public function setContenu($contenu){
			$this->contenumessage;
		}
		
		public function setDate($date){
			$this->datemessage;
		}
		
		public function setDateModif($dateModif){
			$this->datemodificationmessage;
		}
		
		public function setSujet($Sujet){
			$this->sujetmessage;
		}
		
		public function setUtil($Util){
			$this->utilisateurmessage;
		}
	}
?>