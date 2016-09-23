<?php
	abstract class Model{
		
		protected $table, $pk;
		
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
		
		public function delete($id){
			$req = "DELETE FROM {$this->table} WHERE {$this->pk} = $id";
			echo $req;
			$bdd = $this->connexion();
			$bdd->exec($req);
		}
		
		
		public function readAll(){
			//Lecture de la bdd
			$req = "SELECT * FROM {$this->table}";
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			$result = $rep->fetch(PDO::FETCH_ASSOC);
			$rep->closeCursor();
			return $result;
		}
		
		public function read($id){
			//Lecture de la bdd
			$req = "SELECT * FROM {$this->table} WHERE {$this->pk} = $id";
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			$result = $rep->fetch(PDO::FETCH_ASSOC);
			$rep->closeCursor();
			print_r($this);
			echo "<br><br>";
			foreach($result as $key=>$val){
				$this->$key = $val;
			}
			print_r($this);
			
			return $result;
		}
	}
	
?>