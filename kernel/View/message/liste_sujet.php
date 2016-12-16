    <div id='content'>
            <center>
	<?php
           $utilisateur = 1/*$this->viewvar['utilisateur']*/;
            echo "<a href='".WEBROOT."message/newf/{$this->viewvar['idsujet']}/{$utilisateur}'>Nouveau message</a>";?>
                <?php
                /*echo "<pre>";
                print_r($this->viewvar);
                echo "</pre>";*/
                ?>
		<table border=1>
                    <tr>
                        <td colspan='2'><?php echo $this->viewvar['sujet'] ?></td>
                        
                    </tr>
			<?php
			foreach($this->viewvar['messages'] as $message){
                                echo "<tr>";
					echo "<td>{$message['utilisateurmessage']['pseudoutilisateur']}</td>";
                                        echo "  <td>
                                                    <p>Posté le ".strftime('%A %e %B %Y', strtotime($message['datemessage']))."</p>
                                                        </br>
                                                    <p>{$message['contenumessage']}</p>
                                                </td>";
                                echo "</tr>";
			}
			?>
		</table>
	</center>
    </div>
