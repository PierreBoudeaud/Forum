<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php

	if(!empty($_SESSION['id'])){
		$nomUtil_BDD = $_SESSION['pseudo'];
		$imgUtil_BDD = "https://www.gravatar.com/avatar/".$_SESSION['avatar'];
		
		$lienConnexion =	"<a id='deconnexion'>"
							."Déconnexion"
							."</a>";
		$lienCreation = "";
		
	}else{
		$nomUtil_BDD = "Non connecté";
		$imgUtil_BDD = "https://www.gravatar.com/avatar/00000000000000000000000000000000";
		
		$lienConnexion =	"<a id='connexion'>Connexion</a>";
		$lienCreation = "<a id='creation'>Créer un compte</a>";
		
		echo "
			
<div id='dialog' title='Connexion'>
	<p>Veuillez-vous identifier :</p>
	<form id='connexion-form' method='post' action='".WEBROOT."utilisateur/connexion'>
		
		<table>
			<tr>
				<td class='connexLib'>Pseudo :</td>
				<td><input type='text' name='pseudo' id='pseudo' required></td>
				<td class='obligatoire'>*</td>
			</tr>
			<tr>
				<td class='connexLib'>Mot de passe :</td>
				<td><input type='password' name='mdp' id='mdp' required></td>
				<td class='obligatoire'>*</td>
			</tr>
			<tr>
				<td colspan=3 id='obligatoireDesc'><center>* Champs obligatoire</center></td>
			</tr>
		</table>
	</form>
</div>
				
			";
	}
	
	
	$userpanel=
		"<a href='".WEBROOT."'>
			<img id='imgUtilisateur' src='" . $imgUtil_BDD . "'>
		</a>"
		."<div id='infosUtilisateur'>"
		.$nomUtil_BDD
		."<br/>"
		.$lienConnexion
		."</br>"
	    .$lienCreation
		."</div>";
?>