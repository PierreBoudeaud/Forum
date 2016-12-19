    <div id='content'>
        <meta charset="utf-8">
            <center>
		<table border=1>
			<?php
			foreach($this->viewvar as $message){
                                echo "<tr>";
					echo "  <td>
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
			?>
		</table>
	</center>
    </div>
