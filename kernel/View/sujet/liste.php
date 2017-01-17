    <div id='content'>
        <meta charset="utf-8">
            <center>
	<?php if(!empty($_SESSION['id'])){ echo "<a href='".WEBROOT."sujet/newf' style='color: gold'>Ajouter un sujet</a>";}?>
		<table border=1>
			<tr>
				<th>Titre</th>
				<th>Description</th>
                                
			</tr>
			<?php
			foreach($this->viewvar as $sujet){
				echo "<tr>";
					echo "<th style='color: gold'>{$sujet['libellesujet']}</th>";
					echo "<td><a href='".WEBROOT."message/liste/{$sujet['idsujet']}'><p>{$sujet['descriptionsujet']}</p></br><p>Crée par <strong>{$sujet['utilisateursujet']['pseudoutilisateur']}</strong></p></a></td>";
                echo "</tr>";
			}
			?>
		</table>
	</center>
    </div>
