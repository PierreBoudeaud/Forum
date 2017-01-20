<?php
/**
 * Description of Message
 *
 * @author pboudeaud
 */
    require_once(APP."Controller.php");
    class controller_message extends Controller{
        protected $models;
		
	public function __construct(){
            $this->models = array('Message', 'Sujet', 'Utilisateur');
            parent::__construct($this->models);
	}
        
        public function liste($sujet = null){
            
            if($sujet == null){
                $this->set($this->Message->find(null, "idmessage", array("sujetmessage")));
                $this->render('liste');
            }
            else{
                $this->Sujet->read($sujet);
				$sujet = $this->Sujet->totable();
                $this->set(array("sujet" => $sujet['libellesujet'], "idsujet" => $sujet['idsujet'], "messages" => $this->Message->find('sujetmessage = '.$sujet['idsujet'], "idmessage", array("sujetmessage")), "listeSujet" => true));
				$this->render('liste');
            }
        }
        
        public function newf($sujet, $util){
            $this->set(array("sujet" => $sujet, "utilisateur" => $util));
            $this->render('new');
        }
        
        public function create($sujet, $util){
            $this->Message->setContenu($_POST['message']);
            $dateDuJour = date('Y-m-d');
            $this->Message->setDate($dateDuJour);
            $this->Message->setDateModif($dateDuJour);
            $this->Message->setSujet($sujet);
            $this->Message->setUtil($util);
            $this->Message->create();
            $this->liste($sujet);
        }
    }
