<div id='content'>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS."sujet/new.css" ?>">
	<center>
            <form action="create" method="post">
		<table>
		<tr>
			<th>Titre</th>
			<td><input type='text' name='text'></td>
		</tr>
		<tr>
			<th>Description</th>
                        <td><textarea name='text'></textarea></td>
		</tr>
		</table>
                <input type='submit' value="Créer le sujet"><input type="button" id="annuler" value="Annuler">
                </form>
	</center>
	<script>				
		$(document).ready(function(){
                        /**
                         *  Redirection au clic du bouton annuler
                         * */
                        $('#annuler').click(function(){
                            window.location.href = 'liste';
                        });
 
		});
	</script>
</div>