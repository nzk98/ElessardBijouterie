<?php

class BoutiqueController {
	public function index() {
		$pageStyle = "boutique.css";
		$jsFile = ["cart.js", "boutique.js"];

		// Récupération des créations
		require_once __DIR__ . '/../models/Creation.php';
		$creations = Creation::getAllCreations();

		// Inclusion du header commun
		include_once __DIR__ . '/../includes/header.php';

		// Inclusion de la vue principale avec les créations
		include_once __DIR__ . '/../views/boutique.php';

		// Inclusion du footer commun
		include_once __DIR__ . '/../includes/footer.php';
	}
}



?>