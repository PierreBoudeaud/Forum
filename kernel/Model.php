<?php
	abstract class Model{
		
		protected $table;
		protected $pk;
		
		public function __construct(){
			$this->table = "";
			$this->pk = "";
		}
		
		
		protected function connexion(){
			//Connexion à la base de donnée
			$ini_parse = parse_ini_file("/cfg/bdd.ini");//Fichier de configuration
			$dsn = $ini_parse['type'].":dbname=".$ini_parse['dbName'].";host=".$ini_parse['host'].";port=".$ini_parse['port'];
			//echo "<br>$dsn<br>";
			try{
				$DB = new PDO($dsn, $ini_parse['pseudo'], $ini_parse['mdp']);
			}catch(PDOException $e){
				echo "Connexion échouée : ".$e->getMessage();
				$DB = null;
			}
			return $DB;
		}
		
		//Créer utilisateur dans la bdd
		public function create(){
			$req = "INSERT INTO {$this->table} VALUES(";
			$notFirstComma = 0;
			foreach($this as $key=>$val){
				if($notFirstComma > 0){
					$req = $req . ", ";
				}
				$req = $req . $val;
				$notFirstComma++;
			}
			$req = $req . ")";
			echo "<br>".$req."<br>";
			//$bdd = $this->connexion();
			//$bdd->exec($req);
		}
		
		
		/**
		*		delete - Supprime une ligne de la base de données
		*		table et pk appartiennent à l'objet
		*
		*		@param id : clé primaire de la table
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function delete($id){
			
			$req = "DELETE FROM {$this->table} WHERE {$this->pk} = $id";
			echo $req;
			$bdd = $this->connexion();
			$bdd->exec($req);
		}
		
		
		/**
		*		read - lit une ligne de la base de données
		*		table et pk appartiennent à l'objet
		*
		*		@param id : clé primaire de la table
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function read($id){
			//Lecture de la bdd
			$req = "SELECT * FROM {$this->table} WHERE {$this->pk} = $id";
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			$result = $rep->fetch(PDO::FETCH_ASSOC);
			$rep->closeCursor();
			echo "Avant<br>";
			print_r($this);
			echo "<br><br>";
			foreach($result as $key=>$val){
				$this->$key = $val;
				
			}
			echo "Après<br>";
			print_r($this);

		}
	}
	
?>