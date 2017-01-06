<div id='content'>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS."utilisateur/new.css" ?>">
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
						<td><input type='password' id="password" name='mdp'><span class="show-password"><img src="<?php echo IMG."oeil.png"; ?>"></span><!--<input type="button" id='seePass' value="Voir mot de passe"><input id='passvisible' value='true'>--></td>
					</tr>
				</table>
                <input type='submit' value="Créer l'utilisateur"><input type="button" id="annuler" value="Annuler">
            </form>
	</center>
	<script>				
		$(document).ready(function(){
 
			$('.show-password').click(function() {
				if($(this).prev('input').prop('type') == 'password') {
					//Si c'est un input type password
					$(this).prev('input').prop('type','text');
				} else {
					//Sinon
					$(this).prev('input').prop('type','password');
				}
			});
                        
                        $('#annuler').click(function(){
                            window.location.href = '<?php echo WEBROOT; ?>';
                        });
 
		});
	</script>
</div>