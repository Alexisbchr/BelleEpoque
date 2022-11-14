<?php

	// Récupérer ce que JS nous a envoyé
	$page = "allcours";
	$content = file_get_contents("php://input");
	$data = json_decode($content, true);
	$search = "%" . $data['textToFind'] . "%";
	// Se connecter à la bdd
	$bdd = new PDO('mysql:host=db.3wa.io;port=3306;dbname=beucheralexis_belle_epoque',
				'beucheralexis',
				'6e8483129fd777c045a2009608fa54d9');
	$sth = $bdd->prepare('SELECT * FROM cours WHERE title LIKE :find
			ORDER BY cours.id DESC limit 3');
			$sth->bindValue('find', $search, PDO::PARAM_STR);
			$sth->execute();
			$coursFind = $sth->fetchAll(PDO::FETCH_ASSOC);
			$numberOfCours = count($coursFind);
			var_dump()
			include '../includes/_searchlesson.phtml';
