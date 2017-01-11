<div id='content'>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS."sujet/new.css" ?>">
	<center>
            <?php
                $sujet = $this->viewvar['sujet'];
            ?>
            <form action="<?php echo WEBROOT."message/create/{$sujet}/{$_SESSION['id']}";?>" method="post">
		<table>
		<tr>
			<th>Message</th>
                        <td><textarea name='message'></textarea></td>
		</tr>
		</table>
                <input type='submit' value="Créer le message"><input type="button" id="annuler" value="Annuler">
                </form>
	</center>
	<script>				
		$(document).ready(function(){
                        /**
                         *  Redirection au clic du bouton annuler
                         * */
                        $('#annuler').click(function(){
                            window.location.href = '<?php echo WEBROOT."message/liste/{$sujet}"; ?>';
                        });
 
		});
	</script>
</div>