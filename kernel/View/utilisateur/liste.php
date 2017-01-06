<div id='content'>
	<center>
		<link rel="stylesheet" type="text/css" href="<?php echo CSS."utilisateur/liste.css" ?>">
	<?php echo "<a href='".WEBROOT."utilisateur/newf'>Nouvel utilisateur</a>";?>
		<table border=1>
			<tr>
				<th>Identifiant</th>
				<th>Pseudo</th>
				<th>Affichage</th>
				<th>Suppression</th>
			</tr>
			<?php
			foreach($this->viewvar as $utilisateur){
                                echo "<tr>";
									echo "<td>{$utilisateur['idutilisateur']}</td>";
									echo "<td>{$utilisateur['pseudoutilisateur']}</td>";
									echo "<td><a href='".WEBROOT."utilisateur/view/".$utilisateur['idutilisateur']."'>&#x1F50D;</a></td>";
									echo "<td><p class='delete'>&#x1F5D1;</p></td>";
								echo "</tr>";
			}
	?>
		</table>
	</center>
	<script>
		
	</script>
</div>