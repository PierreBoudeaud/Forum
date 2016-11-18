<?php
	class Message extends Model{
		protected $idmessage;
		protected $contenumessage;
		protected $datemessage;
		protected $datemodificationmessage;
		protected $idsujetmessage;
		protected $idutilisateurmessage;
		
		public function __construct($id, $contenu, $date, $dateModif, $idSujet, $idUtil){
			parent::__construct('message', 'idmessage', true);
			$this->idmessage = $id;
			$this->contenumessage = $contenu;
			$this->datemessage = $date;
			$this->datemodificationmessage = $dateModif;
			$this->idsujetmessage = $idSujet;
			$this->idutilisateurmessage = $idUtil;
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
		
		public function getIdSujet(){
			return $this->idsujetmessage;
		}
		
		public function getIdUtil(){
			return $this->idutilisateurmessage;
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
		
		public function setIdSujet($idSujet){
			$this->idsujetmessage;
		}
		
		public function setIdUtil($IdUtil){
			$this->idutilisateurmessage;
		}
	}
?>