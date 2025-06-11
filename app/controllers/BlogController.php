<?php


class BlogController {
	public function index() {
		$pageStyle = "blog.css";
		// $jsFile = ["cart-counter.js","blog.js"];
		$jsFile = ["blog.js"];

		// Inclusion du header commun
		include_once __DIR__ . '/../includes/header.php';

		// Inclusion de la vue principale
        include_once __DIR__ . '/../views/blog.php';

		// Inclusion du footer commun
		include_once __DIR__ . '/../includes/footer.php';
	}
}



?>