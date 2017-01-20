<div id='content'>
	<center>
		<table>
		<?php
		$utilisateur = $this->viewvar;
			echo "<tr>";
				echo "<th>Avatar</th>";
				echo "<td><img src='https://gravatar.com/avatar/{$utilisateur['avatarutilisateur']}'/></td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<th>Pseudo</th>";
				echo "<td>{$utilisateur['pseudoutilisateur']}</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<th colspan='2'><button id='changePassword' class='ui-button ui-widget ui-corner-all'>Modifier le mot de passe</button></th>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<th>Email</th>";
				echo "<td>{$utilisateur['emailutilisateur']}</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<th>Type de compte</th>";
				echo "<td>{$utilisateur['typecompteutilisateur']}</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td colspan='3'><a href='https://gravatar.com/profile/{$utilisateur['avatarutilisateur']}'>Modifier Avatar</a></td>";
			echo "<tr>";
		?>
		</table>
	</center>
	<script>
		$("#changePassword").click(function(){
			window.location.href = "<?php echo WEBROOT."utilisateur/changepassword"; ?>";
		});
	</script>
</div>