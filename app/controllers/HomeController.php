<?php


class HomeController {
	public function index() {
		$pageStyle = "home.css";

		// Récupération des images du carrousel
		require_once __DIR__ . '/../models/ImageCreation.php';
		$carouselImages = ImageCreation::getCarouselImages();

		// Inclusion du header commun
		include_once __DIR__ . '/../includes/header.php';
		
		// Inclusion de la vue principale
		include_once __DIR__ . '/../views/index.php';
		
		// Inclusion du footer commun
		include_once __DIR__ . '/../includes/footer.php';
	}
}


?>
