<?php


class ArticleController {
	public function index() {
		$pageStyle = "article.css";
		// $jsFile = ["cart-counter.js","blog.js", "article.js"];
		$jsFile = ["blog.js", "article.js"];

		// Inclusion du header commun
		include_once __DIR__ . '/../includes/header.php';

		// Inclusion de la vue principale
		include_once __DIR__ . '/../views/article.php';

		// Inclusion du footer commun
		include_once __DIR__ . '/../includes/footer.php';
	}
}   



?>