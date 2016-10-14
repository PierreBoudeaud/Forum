<?php
	abstract class Model{
		
		private $table;
		private $pk;
		private $attribTech;
		private $autoincrement;
		
		/**
		*		__construct - Construit l'objet Model
		*
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function __construct($table, $pk, $autoincrement){
			$this->table = $table;
			$this->pk = $pk;
			$this->autoincrement = $autoincrement;
			$this->attribTech = array('table', 'pk','attribTech', 'autoincrement');
		}
		
		/**
		*		connexion - Connexion à la base de données
		*		Charge les informations de connexion depuis un fichier configuration (.ini)
		*
		*		@return La connexion à la base de donnée
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		protected function connexion(){
			$ini_parse = parse_ini_file("/cfg/bdd.ini", true);//Fichier de configuration
			$dsn = $ini_parse['database']['type'].":dbname=".$ini_parse['database']['dbName'].";host=".$ini_parse['database']['host'].";port=".$ini_parse['database']['port'];
			try{
				$DB = new PDO($dsn, $ini_parse['database']['pseudo'], $ini_parse['database']['mdp']);
			}catch(PDOException $e){
				echo "Connexion échouée : {$e->getMessage()}</br>";
				$DB = null;
			}
			return $DB;
		}
		
		
		/**
		*		create - crée une ligne de la base de données
		*		table appartient à l'objet
		*
		*		@see Model::connexion()	crée la connexion avec la base de données
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function create(){
			$prop = "";
			$value = "";
			
			//Si la clé est autoincrement 
			if(!in_array($this->pk, $this->attribTech) && $this->autoincrement){
				$this->attribTech[] = $this->pk;
			}
			foreach($this as $key=>$val){
				if(!in_array($key, $this->attribTech)){
					$prop = "{$prop} {$key},";
					$value = "{$value} '{$val}',";
				}
			}
			$prop = substr($prop, 0, -1);
			$value = substr($value, 0, -1);
			$req = "INSERT INTO {$this->table}({$prop}) VALUES({$value})";
			echo "<br>".$req."<br>";
			$bdd = $this->connexion();
			$bdd->exec($req);
			$bdd = null;
		}
		
		
		
		/**
		*		update - modifie une ligne de la base de données
		*		table et pk appartient à l'objet
		*
		*		@param in $id : clé primaire de la table
		*		@see Model::connexion()	crée la connexion avec la base de données
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function update(){
			$tabAttrib = $this->attribTech;
			$req = "UPDATE {$this->table} SET ";
			
			if(!in_array($this->pk, $tabAttrib)){
				$tabAttrib[] = $this->pk;
			}
			
			foreach($this as $key=>$val){
				if(!in_array($key, $tabAttrib)){
					$req = "{$req} {$key} = '{$val}',";
				}
			}
			$req = substr($req, 0, -1);
			$req = $req . " WHERE {$this->pk} = '{$this->{$this->pk}}'";
			echo "<br>".$req."<br>";
			$bdd = $this->connexion();
			$bdd->exec($req);
			$bdd = null;
		}
		
		
		/**
		*		delete - Supprime une ligne de la base de données
		*		table et pk appartiennent à l'objet
		*
		*		@param in $id : clé primaire de la table
		*		@see Model::connexion()	crée la connexion avec la base de données
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function delete($id){
			
			$req = "DELETE FROM {$this->table} WHERE {$this->pk} = '{$id}'";
			echo "<br>$req</br>";
			$bdd = $this->connexion();
			$bdd->exec($req);
			$bdd = null;
		}
		
		
		/**
		*		read - lit une ligne de la base de données
		*		table et pk appartiennent à l'objet
		*
		*		@param in $id : clé primaire de la table
		*		@see Model::connexion()	crée la connexion avec la base de données
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function read($id){
			$req = "SELECT * FROM {$this->table} WHERE {$this->pk} = {$id}";
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			$bdd = null;//Déconnexion de la bdd
			$result = $rep->fetch(PDO::FETCH_ASSOC);
			$rep->closeCursor();
			
			foreach($result as $key=>$val){
				$this->$key = $val;
				
			}
		}
		
		
		/**
		*		find - cherche une ligne de la base de données
		*		table appartient à l'objet
		*
		*		@param in $condition : clé primaire de la table
		*		@see Model::connexion()	crée la connexion avec la base de données
		*		@author BOUDEAUD P
		*		@date 30/09/2016
		*/
		public function find($condition){
			$req = "SELECT * FROM {$this->table} WHERE {$condition}";
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			$bdd = null;
			$tmp[] = "";
			while($result = $rep->fetch(PDO::FETCH_ASSOC)){
					$tmp[] = $result;
			}
			$rep->closeCursor();
			
			return($tmp);
		}
		
		public function lineExist($id){
			$req = "SELECT * FROM {$this->table} WHERE {$this->pk} = {$id}";
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			$bdd = null;
			
		}
	}
	
?>