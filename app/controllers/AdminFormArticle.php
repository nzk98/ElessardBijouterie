<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class AdminFormArticle {
    public function index() {
        if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
            header('Location: index.php?page=Accueil');
            exit();
        }

        $pageStyle = "admin.css";
        $jsFile = ["admin.js"];

        // Inclusion du header commun
		include_once __DIR__ . '/../includes/header.php';

         // Afficher la sidebar seulement si l'admin est connecté
         if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
             include_once __DIR__ . '/../includes/admin_sidebar.php';
         }

		// Inclusion de la vue principale
		include_once __DIR__ . '/../views/formulaireArticle.php';

		// Inclusion du footer commun
		include_once __DIR__ . '/../includes/footer.php';
    }
}

