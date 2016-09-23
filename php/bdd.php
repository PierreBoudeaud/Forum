<?php
/*Configuration lien BDD et connexion*/

	function connexion(){
		$ModeBdd = "pgsql"; //pgsql : Postgres | mysql : MySQL
		$Adresse = "localhost";
		$Pseudo = "postgres";
		$MDP = "pgadmin";
		$dbName = "Forum";

		$dsn = $ModeBdd.":dbname=".$dbName.";host=".$Adresse;
		try{
			$DB = new PDO($dsn, $Pseudo, $MDP);
		}catch(PDOException $e){
			echo "Connexion échouée : ".$e->getMessage();
			$DB = null;
		}

		return($DB);
	}
?>