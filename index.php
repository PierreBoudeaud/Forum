<?php
	/**
	*	@author BOUDEAUD P
	*	@date 08/11/2016
	*
	*/
	session_start();
	setlocale(LC_TIME, 'fr_FR.utf8','fra');
	define("ROOT", str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']));//Racine du serveur
	define("WEBROOT", str_replace("index.php", "", $_SERVER['SCRIPT_NAME']));//Racine du projet
	define("MODEL", ROOT."kernel/Model/");//Racine du dossier Model
	define("CONTROLLER", ROOT."kernel/Controller/");//Racine du dossier Controller
	define("VIEW", ROOT."kernel/View/");//Racine du dossier View
	define("APP", ROOT."kernel/");//Racine du dossier kernel (Classes généraliste)
	define("CONF", ROOT."conf/");//Racine du dossier conf
	define("CSS", WEBROOT."css/");//Racine du dossier css
	define("IMG", WEBROOT."img/");//Racine du dossier img
	
	if (ob_get_level() == 0) ob_start();
        echo "
	<link rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
	<script src='https://code.jquery.com/jquery-1.12.4.js'></script>
	<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
	<div id='loader' title='Chargement en cours'>
		<center>
			<img src='https://media.giphy.com/media/h53aZhPiGKhr2/giphy.gif' alt='Loading...'>
			<p>Chargement en cours...</p>
		</center>
	</div>
	
	<script>
		$( function() {
			$( '#loader' ).dialog({
				autoOpen: true
			});
		} );
	</script>
	";
        ob_flush();
        flush();

		ob_end_flush();
	
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
	$controller = ucfirst($controller);	
	//Test méthode
	if (empty($split)){
		$method = "index";
	}
	else {
		$method = $split['1'];
	}
	
	
	
	require_once(CONTROLLER.$controller.".php");
	$temp = "controller_".$controller;
	$objet = new $temp();

	if(method_exists($objet, $method)){
		unset($split['0']);
		unset($split['1']);
		call_user_func_array(array($objet, $method), $split);
	}
	else{
		$controller = "erreur";
		$method = "e404";
		require_once(CONTROLLER.$controller.".php");
		$temp = "controller_".$controller;
		$erreur = new $temp();
		call_user_func_array(array($erreur, $method), array());
	}
	echo xdebug_time_index();
	?>
