<?php
	class Controller{
		//Attribs
		protected $viewvar = array();
		//protected $models = array();
		public $layout;
		
		//methods
		public function __construct($lesModel, $layout = "default"){
			foreach($lesModel as $unModel){
				$this->loadmodel($unModel);
			}
			$this->layout = $layout;
		}
		/**
		*	loadModel - Charge le model passé en paramètre
		*	@param $model Le model à charger
		*/		
		public function loadmodel($model){
			require_once(MODEL.$model.'.php');
			$this->$model = new $model();
		}
		
		/**
		*	set - Prépare variables pour la vue
		*	@param $v variable array() venant du controller
		*/
		public function set($v){
			$this->viewvar = array_merge($this->viewvar, $v);
		}
		
		/**
		*	render - appelle la vue associé pour l'affichage
		*	@param $script le nom de la vue à l'afficher
		*/
		public function render($script){
			
			extract($this->viewvar);//tableau de données
			ob_start();//Temporisation de l'affichage | attente avant affichage
			require(VIEW.get_class($this).'/'.$script.'.php');//require interpréter
			$content = ob_get_clean();//Récupération du contenu de la vue précédemment require
			require(VIEW.'layout/'.$this->layout.'.php');
			//appel du template
		}
	}
?>