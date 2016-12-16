    <div id='content'>
            <center>
	<?php echo "<a href='".WEBROOT."sujet/newf'>Ajouter un sujet</a>";?>
		<table border=1>
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Créateur</th>
                                
			</tr>
			<?php
			foreach($this->viewvar as $sujet){
                                echo "<tr>";
					echo "<td>{$sujet['libellesujet']}</td>";
					echo "<td><a href='".WEBROOT."message/liste/{$sujet['idsujet']}'>{$sujet['descriptionsujet']}</a></td>";
                                        echo "<td>{$sujet['utilisateursujet']['pseudoutilisateur']}</td>";
                                echo "</tr>";
			}
			?>
		</table>
	</center>
    </div>
