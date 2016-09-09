<?php
	
	require("/php/Utilisateur.php");
	$mdp = sha1("dui480");
	$util = new Utilisateur(1, "deltadu17", "pierre.boudeaud@live.fr", $mdp);
	$str = "Utilisateur : " + $util->getId() + " " + $util->getPseudo() + " " + $util->getEMail() + " " + $util->getMDP();
	echo "
		<head>
			<meta charset='UTF-8'>
			<title>Forum - STS 2</title>
		</head>
		<body>
			<p>" + $str + "</p>
		</body>
	";
?>