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
		
		public function liste(){
			$this->set($this->Utilisateur->find());
			$this->render('liste');
		}
		
		public function newf(){
			$this->render('new');
		}
		
		public function create(){
			$this->Utilisateur->setPseudo($_POST['pseudo']);
			$this->Utilisateur->setEmail($_POST['email']);
			$this->Utilisateur->setMDP(password_hash($_POST['mdp'], PASSWORD_DEFAULT));
			$this->Utilisateur->setAvatar(md5( strtolower( trim( $_POST['email'] ) ) ));
			$this->Utilisateur->create();
			$this->liste();
			var_dump($this->Utilisateur);
		}
		
		public function connexion(){
			$result = $this->Utilisateur->find("pseudoutilisateur = '".$_POST['pseudo']."'");
			
			if($this->Utilisateur->read($result[0]['idutilisateur']) && ($this->checkPassword($_POST['mdp']))){
				$_SESSION['id'] = $this->Utilisateur->getId();
				$_SESSION['pseudo'] = $this->Utilisateur->getPseudo();
				$_SESSION['email'] = $this->Utilisateur->getEmail();
				$_SESSION['avatar'] = $this->Utilisateur->getAvatar();
				require_once(CONTROLLER.'Accueil.php');
				$Accueil = new controller_accueil();
				$Accueil->index();
			}
			else{
				require_once(CONTROLLER.'Erreur.php');
				$Erreur = new controller_erreur();
				$Erreur->eu404();
			}
		}
		
		public function deconnexion(){
			unset($_SESSION['id']);
			session_destroy();
			require_once(CONTROLLER.'Accueil.php');
			$Accueil = new controller_accueil();
			$Accueil->index();
		}
                
        //V�rifie si mot de passe dans base est correcte � celui entr�e
        public function checkPassword($password){
        	return(password_verify($password, $this->Utilisateur->getMDP()));
        }
	}
?>