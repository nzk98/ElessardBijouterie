<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class AdminFormCreationController {
    public function index() {
        if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
            header('Location: index.php?page=Accueil');
            exit();
        }

        $pageTitle = "Création de Bijou";
        $pageStyle = "admin.css";
        $jsFile = ["admin.js"];

        // Traitement du formulaire si soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleFormSubmission();
        }

        // Inclusion de l'en-tête spécifique à l'administration
        include_once __DIR__ . '/../includes/header.php';

        // Afficher la sidebar seulement si l'admin est connecté
        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
            include_once __DIR__ . '/../includes/admin_sidebar.php';
        }

        // Inclusion de la vue principale (le formulaire)
        include_once __DIR__ . '/../views/formulaireCreation.php';

        // Inclusion du pied de page spécifique à l'administration
        include_once __DIR__ . '/../includes/footer.php';
    }

    private function handleFormSubmission() {
        try {
            // Validation des données
            $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8') : '';
            $description = isset($_POST['description']) ? htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8') : '';
            $prix = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_FLOAT);
            $categorie = filter_input(INPUT_POST, 'categorie', FILTER_VALIDATE_INT);
            $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_INT) ?? 0;
            $matiere = filter_input(INPUT_POST, 'matiere', FILTER_VALIDATE_INT) ?? 1; // Valeur par défaut

            // Validation des données
            if (empty($nom) || empty($description) || $prix === false || $categorie === false) {
                throw new Exception("Tous les champs obligatoires doivent être remplis et valides");
            }

            // Affichage du contenu de $_FILES['image'] pour debug
            echo '<pre>';
            print_r($_FILES['image']);
            echo '</pre>';

            // Traitement des images (optionnelles)
            $images = [];
            if (isset($_FILES['image']) && $_FILES['image']['error'][0] !== UPLOAD_ERR_NO_FILE) {
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                $uploadDir = 'assets/images/creations/';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                foreach ($_FILES['image']['tmp_name'] as $key => $tmpName) {
                    if ($_FILES['image']['error'][$key] === UPLOAD_ERR_OK) {
                        $type = $_FILES['image']['type'][$key];
                        if (!in_array($type, $allowedTypes)) {
                            continue;
                        }
                        $filename = uniqid() . '_' . basename($_FILES['image']['name'][$key]);
                        $uploadFile = $uploadDir . $filename;
                        if (move_uploaded_file($tmpName, $uploadFile)) {
                            $images[] = $uploadFile;
                        }
                    }
                }
            }
            // Affichage du contenu de $images pour debug
            
            

            // Création de l'objet Creation
            require_once __DIR__ . '/../models/Creation.php';
            $creation = new Creation([
                'nom' => $nom,
                'description' => $description,
                'prix' => $prix,
                'stock' => $stock,
                'id_categorie' => $categorie,
                'id_matiere' => $matiere,
                'images' => $images
            ]);

            // Insertion dans la base de données
            if ($creation->insererCreation()) {
                $_SESSION['success'] = "Produit créé avec succès";
                // Redirection pour éviter la re-soumission du formulaire
                header('Location: index.php?page=AdminFormCreation');
                exit();
            } else {
                throw new Exception("Erreur lors de l'insertion dans la base de données");
            }

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            // Ne pas rediriger ici pour afficher l'erreur sur la page actuelle
        }
    }
}
