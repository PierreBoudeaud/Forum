<?php
	class user extends controller{
		protected $models = array("users");
		
		public function index(){
			$top = array('taptop' => $this->users->find('', 'nom'));
			$this->set($top);
			$this->render('index');
		}
	}
?>