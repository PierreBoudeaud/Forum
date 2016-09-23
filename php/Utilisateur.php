<?php
	class Utilisateur{
		private $id, $pseudo, $eMail, $mDP;

		public function __construct($id, $pseudo, $eMail, $mDP){
			$this->id = $id;
			$this->pseudo = $pseudo;
			$this->eMail = $eMail;
			$this->mDP = $mDP;
		}

		public function getId(){
			return $this->id;
		}

		public function getPseudo(){
			return $this->pseudo;
		}

		public function getEMail(){
			return $this->eMail;
		}

		public function getmDP(){
			return $this->mDP;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function setPseudo($pseudo){
			$this->pseudo = $pseudo;
		}

		public function setEMail($eMail){
			$this->eMail = $eMail;
		}

		public function setmDP($mDP){
			$this->mDP = $mDP;
		}

		public function create(){
			$bdd = $this->connexion();
			$req = "INSERT INTO UTILISATEUR(pseudoutilisateur, emailutilisateur, mdputilisateur) VALUES('" . $this->pseudo . "', '" . $this->eMail . "', '" . $this->mDP . "')";
			echo "<br>".$req."<br>";
			$bdd->exec($req);
		}

		public function read(){
			$bdd = $this->connexion();
			$req = "SELECT * FROM UTILISATEUR";
			$rep = $bdd->query($req);
			return $rep;
		}

		public function update($idUtilisateur, $newPseudo, $newEmailUtilisateur, $newMdpUtilisateur){
			$bdd = $this->connexion();
			$req = "UPDATE UTILISATEUR SET pseudoutilisateur = '$newPseudo', emailutilisateur = '$newEmailUtilisateur', mdputilisateur = '$newMdpUtilisateur' WHERE idUtilisateur = $idUtilisateur";
			echo $req;
			$bdd->exec($req);
		}

		public function delete($idUtilisateur){
			$bdd = $this->connexion();
			$req = "DELETE FROM UTILISATEUR WHERE idUtilisateur = $idUtilisateur";
			echo $req;
			$bdd->exec($req);
		}

		private function connexion(){
			$ini_parse = parse_ini_file("cfg/bdd.ini");
			$dsn = $ini_parse['type'].":dbname=".$ini_parse['dbName'].";host=".$ini_parse['host'].";port=".$ini_parse['port'];
			echo "<br>$dsn<br>";
			try{
				$DB = new PDO($dsn, $ini_parse['pseudo'], $ini_parse['mdp']);
			}catch(PDOException $e){
				echo "Connexion échouée : ".$e->getMessage();
				$DB = null;
			}
			return $DB;
		}
	}
?>