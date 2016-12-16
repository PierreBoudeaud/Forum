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
                $this->set($this->Message->find());
                $this->render('liste');
            }
            else{
                $sujet = $this->Sujet->find('idsujet = '.$sujet);
                $this->set(array("sujet" => $sujet[0]['libellesujet'], "idsujet" => $sujet[0]['idsujet'], "messages" => $this->Message->find('sujetmessage = '.$sujet[0]['idsujet'])));
                $this->render('liste_sujet');
            }
        }
        
        public function newf($sujet, $util){
            $this->set(array("sujet" => $sujet, "utilisateur" => $util));
            $this->render('new');
        }
    }
