<div id='content'>
	<center>
	<?php echo "<a href='".WEBROOT."utilisateur/liste'>Retour liste utilisateur</a>";?>
		<table>
			<tr>
				<th>Avatar</th>
				<th>Identifiant</th>
				<th>Pseudo</th>
				<th>Email</th>
				<th>Mot de passe</th>
			</tr>
			<?php
			
			$utilisateur = $this->viewvar;
                                echo "<tr>";
                                	echo "<td><img src='https://gravatar.com/avatar/{$utilisateur['avatarutilisateur']}'/></td>";
									echo "<td>{$utilisateur['idutilisateur']}</td>";
									echo "<td>{$utilisateur['pseudoutilisateur']}</td>";
									echo "<td>{$utilisateur['emailutilisateur']}</td>";
									echo "<td>{$utilisateur['mdputilisateur']}</td>";
								echo "</tr>";
			?>
		</table>
	</center>
</div>