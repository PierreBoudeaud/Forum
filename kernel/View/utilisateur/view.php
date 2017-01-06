<div id='content'>
	<center>
	<?php echo "<a href='".WEBROOT."utilisateur/liste'>Retour liste utilisateur</a>";?>
		<table border="1">
			<tr>
				<th>Avatar</th>
				<th>Identifiant</th>
				<th>Pseudo</th>
				<th>Email</th>
				<th>Mot de passe</th>
				<th>Type de compte</th>
			</tr>
			<?php
			
			$utilisateur = $this->viewvar;
			if($utilisateur['typecompteutilisateur'] == 0){
				$typecompteutilisateur = "Utilisateur";
			}
			else{
				$typecompteutilisateur = "Administrateur";
			}
                                echo "<tr>";
                                	echo "<td><img src='https://gravatar.com/avatar/{$utilisateur['avatarutilisateur']}'/></td>";
									echo "<td>{$utilisateur['idutilisateur']}</td>";
									echo "<td>{$utilisateur['pseudoutilisateur']}</td>";
									echo "<td>{$utilisateur['emailutilisateur']}</td>";
									echo "<td>{$utilisateur['mdputilisateur']}</td>";
									echo "<td>{$typecompteutilisateur}</td>";
								echo "</tr>";
			?>
		</table>
	</center>
</div>