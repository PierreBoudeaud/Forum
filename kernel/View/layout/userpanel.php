<?php
	$isConnected=false;
	
	
	

	if($isConnected){
		$nomUtil_BDD = "Laedoline";
		$imgUtil_BDD = "gwentitia.png";
		
		$lienConnexion =	"<a href='#'>"
							."Déconnexion"
							."</a>";
		
	}else{
		$nomUtil_BDD = "Non connecté";
		$imgUtil_BDD = "default-user.png";
		
		$lienConnexion =	"<a href='#'>"
							."Connexion"
							."</a>";
	}
	
	
	$userpanel=
		"<a href='".WEBROOT."'>
			<img id='imgUtilisateur' src='" . IMG . $imgUtil_BDD . "'>
		</a>"
		."<div id='infosUtilisateur'>"
		.$nomUtil_BDD
		."<br/>"
		.$lienConnexion
		."</div>";
?>