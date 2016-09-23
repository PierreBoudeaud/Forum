<?php
	include('Model.php');
	class Utilisateur extends Model{
		
		private $idUtilisateur, $pseudoUtilisateur, $eMailUtilisateur, $mDPUtilisateur;
		
		//Attributs techniques
		protected $table = 'utilisateur', $pk = 'idUtilisateur';
		
		public function __construct($id, $pseudo, $eMail, $mDP){
			$this->idUtilisateur = $id;
			$this->pseudoUtilisateur = $pseudo;
			$this->eMailUtilisateur = $eMail;
			$this->mDPUtilisateur = $mDP;
			$this->table = 'utilisateur';
			$this->pk = 'idUtilisateur';
		}

		public function getId(){
			return $this->idUtilisateur;
		}

		public function getPseudo(){
			return $this->pseudoUtilisateur;
		}

		public function getEMail(){
			return $this->eMailUtilisateur;
		}

		public function getmDP(){
			return $this->mDPUtilisateur;
		}

		public function setId($id){
			$this->idUtilisateur = $id;
		}

		public function setPseudo($pseudo){
			$this->pseudoUtilisateur = $pseudo;
		}

		public function setEMail($eMail){
			$this->eMailUtilisateur = $eMail;
		}

		public function setmDP($mDP){
			$this->mDPUtilisateur = $mDP;
		}

		//Créer utilisateur dans la bdd
		public function create(){
			$bdd = $this->connexion();
			$req = "INSERT INTO UTILISATEUR(pseudoutilisateur, emailutilisateur, mdputilisateur) VALUES('" . $this->pseudo . "', '" . $this->eMail . "', '" . $this->mDP . "')";
			echo "<br>".$req."<br>";
			$bdd->exec($req);
		}

		//Mise à jour de la bdd
		public function update($idUtilisateur, $newPseudo, $newEmailUtilisateur, $newMdpUtilisateur){
			$bdd = $this->connexion();
			$req = "UPDATE UTILISATEUR SET pseudoutilisateur = '$newPseudo', emailutilisateur = '$newEmailUtilisateur', mdputilisateur = '$newMdpUtilisateur' WHERE idUtilisateur = $idUtilisateur";
			echo $req;
			$bdd->exec($req);
		}

	}
?>