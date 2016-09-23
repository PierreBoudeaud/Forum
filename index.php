<?php
	require("/kernel/Utilisateur.php");
	$util = new Utilisateur(3, "deltadu17", "pierre.boudeaud@live.fr", "dui480");
	echo "Utilisateur : ".$util->getId()." ".$util->getPseudo()." ".$util->getEMail()." ".$util->getMDP()."<br>";
	/*$util->create();
	$rep = $util->read();
	print_r($rep->fetchAll());
	$util->update($util->getId(), "Jojo Bernard", "jojo.bernard@trololol.com", "123");
	$util->setPseudo("Jojo Bernard");
	$util->setEMail("jojo.bernard@trololol.com");
	$util->setMDP("123");
	$str = "Utilisateur : ".$util->getId()." ".$util->getPseudo()." ".$util->getEMail()." ".$util->getMDP();
	echo $str;*/
	//$util->delete(4);
	print_r($util->read(1));
	echo "<br><br>Utilisateur : ".$util->getId()." ".$util->getPseudo()." ".$util->getEMail()." ".$util->getMDP();
?>