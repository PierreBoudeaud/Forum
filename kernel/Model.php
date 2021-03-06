<?php
	/**
	*		@author LUTAU T
	*/
	include_once(CONTROLLER."Erreur.php");
	abstract class Model{
		
		private $table;
		private $pk;
		private $attribTech;
		private $autoincrement;
		private $fk;
		
		/**
		*		__construct - Constructeur de la classe Model
		*		$table et $pk font partis de l'objet Model.
		*
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function __construct($table, $pk, $autoincrement, $fk){
			$this->table = $table;
			$this->pk = $pk;
			$this->autoincrement = $autoincrement;
			$this->attribTech = array('table', 'pk','attribTech', 'autoincrement', 'fk');
			$this->fk = $fk;
		}
		
		/**
		*	doBelongsToAssoc - Récupère l'id l'objet associé à celui ci
		*	Ce traduit dans la base de donnée par un FOREIGN KEY | En privé pour qu'elle soit accessible uniquement par les méthodes de cette objet. Ex : Utilisateur n'y a pas accés.
		* 	@see read() Lit la ligne dans la table de l'objet associé avec l'id passé en paramètre 
		*/
		private function doBelongsToAssoc(){
			foreach($this->fk as $cle=>$valeur){
				$id = $this->$valeur;
				$this->$valeur = new $cle();
				$this->$valeur->read($id);
			}
		}
		
		/*private function TabPk($id){
			$taille = sizeof($this->pk);
			for($i=0; $i < $taille; $i++){
				$tab[$this->pk[$i]] = $id[$id];
				$i++;
			}
			
			return $tab;
		}*/
		
		/**
		*		lineExist - Test la ligne dans la BDD
		*		Test si la ligne existe dans la BDD et renvoie un booleen
		*
		*		@param $id int Identifiant de la ligne
		*		@return Boolean Retourne un booleen en fonction de si la ligne existe
		*		@author BOUDEAUD P
		*		@date 25/10/2016
		*/
		public function lineExist($id){
			$req = "SELECT COUNT(*) FROM {$this->table} WHERE {$this->pk} = '{$id}'";
			$DB = $this->connexion();
			$rep = $DB->prepare($req);
			$rep->execute();
			$row = $rep->fetch();
			return($row['0'] > 0);
			
		}
		
		/**
		*		connexion - Connexion à la base de données
		*		Charge les informations de connexion depuis un fichier configuration (.ini)
		*
		*		@return PDO La connexion à la base de donnée
		*		@author BOUDEAUD P
		*		@date 04/10/2016
		*/
		protected function connexion(){
			$ini_parse = parse_ini_file(CONF."bdd.ini", true);//Fichier de configuration
			$dsn = $ini_parse['database']['type'].":dbname=".$ini_parse['database']['dbName'].";host=".$ini_parse['database']['host'].";port=".$ini_parse['database']['port'];
			try{
				$DB = new PDO($dsn, $ini_parse['database']['pseudo'], $ini_parse['database']['mdp']);
			}catch(PDOException $e){
				//echo "Connexion échouée : ".$e->getMessage();
				$DB = null;
				$Erreur = new controller_erreur();
				$Erreur->E69();
				exit();
			}
			return $DB;
		}
		
		
		/**
		*		create - Créer un enregistrement dans la base de données
		*		Créer un enregistrement à partir de l'objet courant
		*
		*		@see Model::connexion()		Connexion à la base
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function create(){
				$prop = "";
				$value = "";
			
				if($this->autoincrement){
					$this->attribTech[] = $this->pk;
				}
				foreach($this as $key=>$val){
					if(!in_array($key, $this->attribTech)){
						$prop = "{$prop} {$key},";
						$val = str_replace("'", "''", $val);
						$value = $value."'".htmlspecialchars($val)."',";
					}
				}
				$prop = substr($prop, 0, -1);
				$value = substr($value, 0, -1);
				$req = "INSERT INTO {$this->table}({$prop}) VALUES({$value})";
				$bdd = $this->connexion();
				$bool = $bdd->exec($req);
				$bdd = null;
				return $bool;
		}
		
		
		
		/**
		*		update - Modifier un enregistrement dans la base de données
		*		Modifie un enregistrement à partir de l'identifiant de l'objet courant
		*
		*		@param String $id identifiant de l'enregistrement à modifier
		*		@see Model::connexion()		Connexion à la base
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function update(){
			$bool = $this->lineExist($this->{$this->pk});
			if($bool){
				$tabAttrib = $this->attribTech;
				$req = "UPDATE {$this->table} SET ";
			
				if(!in_array($this->pk, $tabAttrib)){
					$tabAttrib[] = $this->pk;
				}
			
				foreach($this as $key=>$val){
					if(!in_array($key, $tabAttrib)){
						$req = "{$req} {$key} = '{$val},'";
					}
				}
				$req = substr($req, 0, -1);
				$req = $req . " WHERE {$this->pk} = {$this->{$this->pk}}";
				echo "<br>".$req."<br>";
				$bdd = $this->connexion();
				$bdd->exec($req);
				$bdd = null;
			}
			return $bool;
		}
		
		
		/**
		*		delete - Suppression un enregistrement de la base de données
		*		Supprime un enregistrement dans la base de données en fonction de l'id
		*
		*		@param String $id identifiant de l'enregistrement à supprimer
		*		@see Model::connexion()		 Connexion à la base
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function delete($id){
			$bool = $this->lineExist($id);
			if($bool){
				$req = "DELETE FROM {$this->table} WHERE {$this->pk} = '{$id}'";
				$bdd = $this->connexion();
				$bdd->exec($req);
				$bdd = null;
			}
			return $bool;
		}
		
		
		/**
		*		read - Lire un enregistrement
		*		Lit un enregistrement en fonction de l'id
		*
		*		@param String $id identifiant de l'enregistrement à lire
		*		@see Model::connexion()		Connexion à la base
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function read($id){
			$bool = $this->lineExist($id);
			if($bool){
				$req = "SELECT * FROM {$this->table} WHERE {$this->pk} = '{$id}'";
				$bdd = $this->connexion();
				$rep = $bdd->query($req);
				$result = $rep->fetch(PDO::FETCH_ASSOC);
				$rep->closeCursor();
				$bdd = null;
				foreach($result as $key=>$val){
					$this->$key = $val;
				
				}
				
				if($this->fk != null){
					$this->doBelongsToAssoc();
				}
				
				
			}
			return $bool;
		}
		
		
		/**
		*		find - trouver un enregistrement
		*		Trouve un enregistrement en fonction d'une condition
		*
		*		@param String $condition condition pour trier les enregistrements à trouver
		*		@see Model::connexion()		Connexion à la base
		*		@see Model::read($id)	Lit et crée un objet en fonction de l'id envoyé
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function find($condition=null, $orderBy = null, $keyNotUse = array()){
			$keyNotUse = array_merge($keyNotUse, $this->attribTech);
			// var_dump($keyNotUse);
			
			$req = "SELECT * FROM {$this->table}";
			
			if($condition != null){
				$req = $req." WHERE {$condition}";
			}
			
			if($orderBy != null){
				$req = $req." ORDER BY {$orderBy}";
			}
			
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			$bdd = null;
			
			$tab = array();
			while($result = $rep->fetch()){
					$object = new $this->table();
					$object->read($result['0']);
					// var_dump($keyNotUse);
					$tab[] = $object->totable($keyNotUse);
			}
			$rep->closeCursor();
			// var_dump($tab);
			return($tab);
		}
		
		/**
		*	totable - Envoie toute les valeurs de l'objet courant dans un tableau
		*
		*	@return Tab Tableau de valeurs
		*/
		public function totable($keyNotUse = array()){
			/*echo "<p>this</p>";
			var_dump($this);
			echo "<p>keyNotUse</p>";
			var_dump($keyNotUse);*/
			$tab = array();
			foreach($this as $key=>$val){
					if(!in_array($key, $keyNotUse)){
                        if(is_object($val)){
							/*echo "<p>val</p>";
							var_dump($val);*/
							$val = $val->toTable($keyNotUse);
                        }
						$tab[$key] = $val;
					}
				}
			return $tab;
		}
	}
	
?>
