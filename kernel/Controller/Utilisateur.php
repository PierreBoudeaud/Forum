<?php
	require_once(APP."Controller.php");
	class controller_utilisateur extends controller{
		protected $models;
		
		public function __construct(){
			$this->models = array('Utilisateur');
			parent::__construct($this->models);
		}
		
		/**
		*	charger_erreur() - Charge l'erreur 404
		*/
		private function charger_erreur(){
			require_once(CONTROLLER.'Erreur.php');
			$Erreur = new controller_erreur();
			$Erreur->e404();
		}
		
		/**
		*	view() - Affiche les informations d'un utilisateur
		*	@param idUtil Id de l'utilisateur à charger
		*/
		public function view($idUtil){
			
			if($_SESSION['typeCompte'] == 1 && $this->Utilisateur->read($idUtil)){
				$this->set($this->Utilisateur->toTable());
				$this->render('view');
			}
			else{
				$this->charger_erreur();
			}
			
		}
		
		/**
		*	profile() - Affiche le profil de l'utilisateur
		*/
		public function profile(){
			if(!empty($_SESSION['id']) && $this->Utilisateur->read($_SESSION['id'])){
				$utilisateur = $this->Utilisateur->toTable();
				if($utilisateur['typecompteutilisateur'] == 0){
					$utilisateur['typecompteutilisateur'] = "Utilisateur";
				}
				else{
					$utilisateur['typecompteutilisateur'] = "Administrateur";
				}
				$this->set($utilisateur);
				$this->render('profile');
			}else{
				$this->charger_erreur();
			}
		}
		
		/**
		*	liste - Affiche tout les utilisateurs dans la bdd (Sauf utilisateur supprimé)
		*/
		public function liste(){
			if(!empty($_SESSION['typeCompte']) && $_SESSION['typeCompte'] == 1){
				$this->set($this->Utilisateur->find("idutilisateur != 0", "idutilisateur"));
				$this->render('liste');
			}
			else{
				$this->charger_erreur();
			}
		}
		
		/**
		* newf - Formulaire création utilisateur
		*/
		public function newf(){
			$this->render('new');
		}
		
		/**
		*	create - Récupère les données du formulaire et crée une ligne en bdd
		*/
		public function create(){
			$check = $this->Utilisateur->find("pseudoutilisateur = '".$_POST['pseudo']."'", null);
			if(empty($check[0]['pseudoutilisateur'])){
				$this->Utilisateur->setPseudo($_POST['pseudo']);
				$this->Utilisateur->setEmail($_POST['email']);
				$this->Utilisateur->setMDP(password_hash($_POST['mdp'], PASSWORD_DEFAULT));
				$this->Utilisateur->setAvatar(md5( strtolower( trim( $_POST['email'] ) ) ));
				$this->Utilisateur->create();
				require_once(CONTROLLER.'Accueil.php');
				$Accueil = new controller_accueil();
				$Accueil->index();
			}
			else{
				$this->charger_erreur();
			}
		}
		
		/**
		*	delete - Supprime un utilisateur
		*	@param $idUtil Identifiant de l'utilisateur supprimé de la bdd
		*/
		public function delete($idUtil){
			if(!empty($_SESSION['typeCompte']) && $_SESSION['typeCompte'] == 1 && $this->Utilisateur->delete($idUtil)){
				$this->liste();
			}else{
				require_once(CONTROLLER.'Erreur.php');
				$Erreur = new controller_erreur();
				$Erreur->e406();
			}
		}
		
		/**
		*	connexion - Teste le pseudo et le mot de passe et "crée" la session
		*	Charge SESSION
		*/
		public function connexion(){
			function erreur(){
				require_once(CONTROLLER.'Erreur.php');
				$Erreur = new controller_erreur();
				$Erreur->eu401();
			}
			$result = $this->Utilisateur->find("pseudoutilisateur = '".$_POST['pseudo']."'", null);
			if(sizeof($result) == 1){
				$this->Utilisateur->read($result[0]['idutilisateur']);
				if(password_verify($_POST['mdp'], $this->Utilisateur->getMDP())){
					$_SESSION['id'] = $this->Utilisateur->getId();
					$_SESSION['pseudo'] = $this->Utilisateur->getPseudo();
					$_SESSION['email'] = $this->Utilisateur->getEmail();
					$_SESSION['avatar'] = $this->Utilisateur->getAvatar();
					$_SESSION['typeCompte'] = $this->Utilisateur->getTypeCompte();
					require_once(CONTROLLER.'Accueil.php');
					$Accueil = new controller_accueil();
					$Accueil->index();
				}
				else{
					erreur();
				}
			}
			else{
				erreur();
			}
		}
		
		/**
		*	deconnexion - Deconnecte l'utilisateur et détruit la session
		*/
		public function deconnexion(){
			unset($_SESSION['id']);
			session_destroy();
			require_once(CONTROLLER.'Accueil.php');
			$Accueil = new controller_accueil();
			$Accueil->index();
		}
        
		/**
		*	changePassword() - Affiche la page de changement de mot de passe ou le change dans la base
		*/
		public function changePassword($mdp = null){
			if($mdp == null){
				$this->render("changePassword");
			}else{
				$this->Utilisateur->setMDP($mdp);
				$this->Utilisateur->update();
				$this->profile();
			}
		}
	}
?>