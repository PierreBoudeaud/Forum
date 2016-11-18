<?php
	include("/kernel/Model.php");
	include("/kernel/Utilisateur.php");
	include("/kernel/Sujet.php");
	include("/kernel/Message.php");
	
	$util = new Utilisateur(3, "deltadu17", "pierre.boudeaud@live.fr", "abc");
	//echo "Utilisateur : ".$util->getId()." ".$util->getPseudo()." ".$util->getEMail()." ".$util->getMDP()."<br>";
	$util->create();
	//$util->update($util->getId(), "Jojo Bernard", "jojo.bernard@trololol.com", "123");
	$util->setPseudo("Jojo Bernard");
	$util->setEMail("jojo.bernard@trololol.com");
	$util->setMDP("123");
	$str = "Utilisateur : ".$util->getId()." ".$util->getPseudo()." ".$util->getEMail()." ".$util->getMDP();
	echo $str."<br>";
	//$util->delete(6);
	$find = $util->find("pseudoutilisateur='deltadu17'");
	print_r($find);
	$util->read(8);
	echo "<br><br>Utilisateur : ".$util->getId()." ".$util->getPseudo()." ".$util->getEMail()." ".$util->getMDP();
	//$util->update(1);
	echo "<br>";
	$sujet = new Sujet(1, "Les chats", "Les chats nos amis de toujours", 8);
	//$sujet->create();
	$utilSujet = new Utilisateur(0, "", "", "");
	$utilSujet->read($sujet->getIdUtil());
	echo "</br>Sujet n° : {$sujet->getId()}</br>Nom : {$sujet->getLib()}</br>description : {$sujet->getDesc()}</br>Posté par {$utilSujet->getPseudo()}";
	
	echo "</br></br>";
	
	$message = new Message(1, "Le chat est un vertébré de la famille des Mammifère", date('d/m/Y'), date('d/m/Y'), 1, 8);
	//$message->create();
	$utilMessage = new Utilisateur(0, "", "", "");
	$sujetMessage = new Sujet(0, "", "", 0);
	
	$utilMessage->read($message->getIdUtil());
	$sujetMessage->read($message->getIdSujet());
	$utilSujet->read($sujet->getIdUtil());
	echo "</br>Sujet n° : {$sujet->getId()}</br>Nom : {$sujet->getLib()}</br>description : {$sujet->getDesc()}</br>Sujet crée par {$utilSujet->getPseudo()}
	</br>Message : {$message->getContenu()}</br>Posté par {$utilMessage->getPseudo()} le {$message->getDate()} modifié le {$message->getDatemodif()}";
?>