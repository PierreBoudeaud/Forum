<div id='content'>
	<center>
            <form action="create" method="post">
		<table>
		<tr>
			<th>Pseudo</th>
			<td><input type='text' name='pseudo'></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type='text' name='email'></td>
		</tr>
		<tr>
			<th>Mot de passe</th>
			<td><input type='password' id="password" name='mdp'><input type="button" id='seePass' value="Voir mot de passe"><input id='passvisible' value='true'></td>
		</tr>
		<!--<tr>
			<th>Vérification du mot de passe</th>
			<td><input type='text' name='emp_rue'></td>
		</tr>-->
		</table>
                <input type='submit' value="Créer l'utilisateur"><input type="button" id="annuler" value="Annuler">
                </form>
	</center>
	<script>
		$('#seePass').click(function(){
							if($('#passvisible').val() == 'true'){
								$('#password').removeAttr("type");
								$('#password').prop('type', 'password');
								$('#passvisible').val("true");
							}
							else{
								$('#password').removeAttr("type");
								$('#password').prop('type', 'text');
								var text = false;
								$('#passvisible').val(text);
							}
			
						});
	</script>
</div>