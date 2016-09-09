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

		public function create(){
			$bdd = connexion();
			$req = "INSERT INTO UTILISATEUR VALUES(" . $this->id . ", " . $this->pseudo . ", " . $this->eMail . ", " . $this->mDP . ")";
			echo "<br>".$req."<br>";
			//$bdd->prepare($req);
		}

		function connexion(){
		$ModeBdd = "pgsql"; //pgsql : Postgres | mysql : MySQL
		$Adresse = "localhost";
		$Pseudo = "postgres";
		$MDP = "pgadmin";
		$dbName = "Forum";

		$dsn = $ModeBdd.":dbname=".$dbName.";host=".$Adresse;
		echo "<br>$dsn<br>";
		try{
			$DB = new PDO($dsn, $Pseudo, $MDP);
		}catch(PDOException $e){
			echo "Connexion échouée : ".$e->getMessage();
			$DB = null;
		}

		return($DB);
	}
	}
?>