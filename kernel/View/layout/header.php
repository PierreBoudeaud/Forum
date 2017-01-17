<?php
	$header="<a href='".WEBROOT."'><img src='".IMG."home.png' alt='Accueil'/></a>";
	if(!empty($_SESSION['id'] && $_SESSION[('typeCompte')] == 1)){
		$header = $header." <a href='".WEBROOT."message/liste'><img src='".IMG."messages.png' alt='Messages'/></a> <a href='".WEBROOT."utilisateur/liste'><img src='".IMG."users.png' alt='Utilisateurs'/></a>";
	}
?>