    <div id='content'>
            <center>
                <meta charset="utf-8">
	<?php
	if(!empty($this->viewvar['listeSujet'])){
		if(!empty($_SESSION['id'])){
			echo "<a href='".WEBROOT."message/newf/{$this->viewvar['idsujet']}/{$_SESSION['id']}'  style='color: gold'>Nouveau message</a>";
		}
            ?>
		<table border=1>
                    <tr>
                        <td colspan='2'><?php echo $this->viewvar['sujet'] ?></td>
                        
                    </tr>
			<?php
			foreach($this->viewvar['messages'] as $message){
								echo "<tr>";
					echo "	<td>
								<img src='http://gravatar.com/avatar/{$message['utilisateurmessage']['avatarutilisateur']}'/>
								<p>{$message['utilisateurmessage']['pseudoutilisateur']}</p>
							</td>";
                                        echo "  <td>
                                                    <p style='color:gold'>Posté le ". utf8_encode(strftime('%A %e %B %Y', strtotime($message['datemessage'])))."</p>
                                                        </br>
                                                    <p>{$message['contenumessage']}</p>
                                                </td>";
                                echo "</tr>";
			}
			
		echo "</table>";
	}
	else{
		echo "<table border=1>";
			foreach($this->viewvar as $message){
                                echo "<tr>";
					echo "  <td>
													<img src='http://gravatar.com/avatar/{$message['utilisateurmessage']['avatarutilisateur']}'/>
                                                    <p>{$message['utilisateurmessage']['pseudoutilisateur']}</p>
                                                    <p>Sujet : {$message['sujetmessage']['libellesujet']}</p>
                                                </td>";
                                        echo "  <td>
                                                    <p>Posté le ". utf8_encode(strftime('%A %e %B %Y', strtotime($message['datemessage'])))."</p>
                                                        </br>
                                                    <p>{$message['contenumessage']}</p>
                                                </td>";
                                echo "</tr>";
			}
			
		echo "</table>";
	}
	?>	
	</center>
    </div>
