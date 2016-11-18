<?php
	/**
	*	@author BOUDEAUD P
	*	@date 08/11/2016
	*
	*/
	
	define("ROOT", str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']));//Racine du serveur
	define("WEBROOT", str_replace("index.php", "", $_SERVER['SCRIPT_NAME']));//Racine du projet
	define("MODEL", ROOT."kernel/Model/");//Racine du dossier Model
	define("CONTROLLER", ROOT."kernel/Controller/");//Racine du dossier Controller
	define("VIEW", ROOT."kernel/View/");//Racine du dossier View
	define("APP", ROOT."kernel/");//Racine du dossier kernel (Classes généraliste)
	define("CONF", ROOT."conf/");//Racine du dossier conf
	
	
	/*echo '<pre>';
		print_r($_SERVER);//Affichage des informations serveur
	echo '</pre>';*/
	
	//Test controller
	if (empty($_GET['p'])){
		$controller = "accueil";
		$split = array();
	}
	else {
		$split = explode("/", $_GET['p']);
		$controller = $split['0'];
	}
	
	//Test méthode
	if (empty($split)){
		$method = "index";
	}
	else {
		$method = $split['1'];
	}
	
	require_once(CONTROLLER.$controller.".php");
	$objet = new $controller();
	
	if(method_exists($objet, $method)){
		unset($split['0']);
		unset($split['1']);
		call_user_func_array(array($controller, $method), $split);
	}
	else{
		echo "<title>Error 404</title>";
		include(VIEW."e404.php");
	}
	
	echo "
		<style>
			r{
				color : red;
			}
		</style>
	";
	
	echo "ROOT : <r>".ROOT. "</r><br>WEBROOT : <r>".WEBROOT. "</r><br>MODEL : <r>".MODEL. "</r><br>CONTROLLER : <r>".CONTROLLER. "</r><br>VIEW : <r>".VIEW. "</r><br>APP : <r>".APP. "</r><br>CONF : <r>".CONF."</r>"; //[TEST] Affichage des CONSTANTES

	?>