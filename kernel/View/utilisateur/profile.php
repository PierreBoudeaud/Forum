<div id='content'>
	<center>
		<table border="1">
			<tr>
				<th>Avatar</th>
				<th>Pseudo</th>
				<th>Email</th>
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
									echo "<td>{$utilisateur['pseudoutilisateur']}</td>";
									echo "<td>{$utilisateur['emailutilisateur']}</td>";
									echo "<td>{$typecompteutilisateur}</td>";
								echo "</tr>";
			?>
		</table>
		
		<table>
		<?php
			echo "<tr>";
				echo "<th>Avatar</th>";
				echo "<td><img src='https://gravatar.com/avatar/{$utilisateur['avatarutilisateur']}'/></td>";
				echo "<td>Modifier Avatar</td>";
			echo "</tr>";
		?>
		</table>
	</center>
</div>