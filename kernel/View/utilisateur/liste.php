<div id='content'>
	<center>
		<link rel="stylesheet" type="text/css" href="<?php echo CSS."utilisateur/liste.css" ?>">
	<?php echo "<a href='".WEBROOT."utilisateur/newf' style='color: gold'>Nouvel utilisateur</a>";?>
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
										echo "<td><p class='delete' id='{{$utilisateur['idutilisateur']}}'>&#x1F5D1;</p></td>";
								echo "</tr>";
			}
	?>
		</table>
		<div id="delete-alert" style="display: none">
			<p>Êtes-vous sûre de supprimer l'utilisateur avec l'id <strong id='utilisateurDel'></strong> ?</p>
			
			<input type="hidden" id='idUtilDel' />
			<button id='OuiDel' class="ui-button ui-widget ui-corner-all">Oui</button>
			<button id='NonDel' class="ui-button ui-widget ui-corner-all">Non</button>
		</div>
	</center>
	<script>
		$('.delete').click(function(){
			var id = this.id;
			id = id.replace(/{/, "");
			id = id.replace(/}/, "");
			$('#utilisateurDel').html(id);
			$('#idUtilDel').val(id);
			$('#delete-alert').show();
		});
		
		//Annuler la suppression
		$('#NonDel').click(function(){
			$('#delete-alert').hide();
		});
		
		$('#OuiDel').click(function(){
			window.location.href = "<?php echo WEBROOT.'utilisateur/delete/'; ?>" + $('#idUtilDel').val();
		});
	</script>
</div>