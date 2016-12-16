<?php
/**
 * Sujet - Controller des Sujets
 * 
 *
 * @author pboudeaud
 */
    require_once(APP."Controller.php");
    class controller_sujet extends Controller{
        private $models;
        
        public function __construct(){
            $this->models = array("Sujet", "Utilisateur");
            parent::__construct($this->models);
        }
        
        public function liste(){
            $this->set($this->Sujet->find());
            $this->render('liste');
        }
        
        public function newf(){
            $this->render('new');
        }
        
    }
?>
