<?php
	abstract class Model{
		
		protected $table;
		protected $pk;
		protected $attribTech = array('table', 'pk','attribTech');
		
		public function __construct(){
			$this->table = "";
			$this->pk = "";
			//$this->attribTech =  array('table', 'pk','attribTech');
		}
		
		/**
		*		connexion - Connexion à la base de données
		*		Charge les informations de connexion depuis un fichier configuration (.ini)
		*
		*		@return La connexion à la base de donnée
		*		@
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		protected function connexion(){
			$ini_parse = parse_ini_file("/cfg/bdd.ini");//Fichier de configuration
			$dsn = $ini_parse['type'].":dbname=".$ini_parse['dbName'].";host=".$ini_parse['host'].";port=".$ini_parse['port'];
			try{
				$DB = new PDO($dsn, $ini_parse['pseudo'], $ini_parse['mdp']);
			}catch(PDOException $e){
				echo "Connexion échouée : ".$e->getMessage();
				$DB = null;
			}
			return $DB;
		}
		
		
		/**
		*		create - crée une ligne de la base de données
		*		table appartient à l'objet
		*
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function create(){
			$req = "INSERT INTO {$this->table}(";
			$notFirstComma = 0;
			foreach($this as $key=>$val){
				if(!in_array($key, $this->attribTech) && $key != $this->pk){
					if($notFirstComma > 0){
						$req = $req . ", ";
					}
					$req = $req . $key;
					$notFirstComma++;
				}
			}
			$req = "{$req}) VALUES(";
			$notFirstComma = 0;
			foreach($this as $key=>$val){
				if(!in_array($key, $this->attribTech) && $key != $this->pk){
					if($notFirstComma > 0){
						$req = $req . ", ";
					}
					$req = $req . $val;
					$notFirstComma++;
				}
			}
			$req = $req . ")";
			echo "<br>".$req."<br>";
			//$bdd = $this->connexion();
			//$bdd->exec($req);
			//$bdd = null;
		}
		
		
		/**
		*		update - modifie une ligne de la base de données
		*		table et pk appartient à l'objet
		*
		*		@param in $id : clé primaire de la table
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function update($id){
			
			$req = "UPDATE {$this->table} SET ";
			$notFirstComma = 0;
			foreach($this as $key=>$val){
				if(!in_array($key, $this->attribTech) && $key != $this->pk){
					if($notFirstComma > 0){
						$req = $req . ", ";
					}
					$req = "{$req}{$key} = '{$val}'";
					$notFirstComma++;
				}
			}
			$req = $req . " WHERE {$this->pk} = {$id}";
			echo "<br>".$req."<br>";
			//$bdd = $this->connexion();
			//$bdd->exec($req);
			//$bdd = null;
		}
		
		
		/**
		*		delete - Supprime une ligne de la base de données
		*		table et pk appartiennent à l'objet
		*
		*		@param in $id : clé primaire de la table
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function delete($id){
			
			$req = "DELETE FROM {$this->table} WHERE {$this->pk} = $id";
			echo $req;
			$bdd = $this->connexion();
			$bdd->exec($req);
			$bdd = null;
		}
		
		
		/**
		*		read - lit une ligne de la base de données
		*		table et pk appartiennent à l'objet
		*
		*		@param in $id : clé primaire de la table
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function read($id){
			$req = "SELECT * FROM {$this->table} WHERE {$this->pk} = $id";
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			$result = $rep->fetch(PDO::FETCH_ASSOC);
			$rep->closeCursor();
			$bdd = null;
			foreach($result as $key=>$val){
				$this->$key = $val;
				
			}
		}
		
		
		/**
		*		find - cherche une ligne de la base de données
		*		table appartient à l'objet
		*
		*		@param in $condition : clé primaire de la table
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function find($condition){
			$req = "SELECT * FROM {$this->table} WHERE {$condition}";
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			$tmp[] = "";
			while($result = $rep->fetch(PDO::FETCH_ASSOC)){
					$tmp[] = $result;
			}
			$rep->closeCursor();
			$bdd = null;
			return($tmp);
		}
	}
	
?>