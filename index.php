<?php
	require("/kernel/Utilisateur.php");
	$util = new Utilisateur(3, "deltadu17", "pierre.boudeaud@live.fr", "abc");
	echo "Utilisateur : ".$util->getId()." ".$util->getPseudo()." ".$util->getEMail()." ".$util->getMDP()."<br>";
	$util->create();
	$util->update($util->getId(), "Jojo Bernard", "jojo.bernard@trololol.com", "123");
	$util->setPseudo("Jojo Bernard");
	$util->setEMail("jojo.bernard@trololol.com");
	$util->setMDP("123");
	$str = "Utilisateur : ".$util->getId()." ".$util->getPseudo()." ".$util->getEMail()." ".$util->getMDP();
	echo $str;
	$util->delete(6);
	$find = $util->find("pseudoutilisateur='deltadu17'");
	print_r($find);
	$util->read(5);
	echo "<br><br>Utilisateur : ".$util->getId()." ".$util->getPseudo()." ".$util->getEMail()." ".$util->getMDP();
	$util->update(1);
?>