<?php


class HomeController {
	public function index() {
		$pageStyle = "home.css";
		// $jsFile = ["cart-counter.js","carousel.js"];
		$jsFile = ["carousel.js"];

		// Inclusion du header commun
		include_once __DIR__ . '/../includes/header.php';
		
		// Inclusion de la vue principale
		include_once __DIR__ . '/../views/index.php';
		
		// Inclusion du footer commun
		include_once __DIR__ . '/../includes/footer.php';
	}
}


?>
