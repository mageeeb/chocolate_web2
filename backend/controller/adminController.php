<?php

use model\manager\CategoryManager;
use model\manager\CommentManager;
use model\manager\RecipesManager;
use model\manager\UserManager;
use model\mapping\CommentMapping;
use model\manager\LikesManager;

// On vérifie si l'utilisateur est connecté et s'il est admin
if (!isset($_SESSION['users_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Si non, on le redirige vers la page d'accueil ou de connexion
    header('Location: ./index.php');
    exit;
}

// Logique pour le panneau d'administration
$recipesManager = new RecipesManager($connectPDO);
$userManager = new UserManager($connectPDO);
$commentManager = new CommentManager($connectPDO);
$likesManager = new LikesManager($connectPDO);

// Initialiser les variables pour éviter les erreurs "undefined" dans les vues
$allRecipes = [];
$allUsers = [];
$allComments = [];
$allLikes = [];
$successMessage = '';
$errorMessage = '';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add_recipe':
            // Afficher le formulaire d'ajout de recette
            require_once '../../frontend/view/admin/add_recipe.html.php';
            break;

        case 'save_recipe':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Valider et traiter les données du formulaire
                if (
                    !empty($_POST['recipe_title']) &&
                    !empty($_POST['recipe_desc']) &&
                    !empty($_POST['recipe_cook_time']) &&
                    !empty($_POST['recipe_img'])
                ) {
                    try {
                        $recipeData = [
                            'recipe_title' => $_POST['recipe_title'],
                            'recipe_desc' => $_POST['recipe_desc'],
                            'recipe_img' => $_POST['recipe_img'],
                            'recipe_cook_time' => (int)$_POST['recipe_cook_time'],
                            'users_users_id' => $_SESSION['users_id'] // L'ID de l'utilisateur connecté
                        ];
                        
                        $newRecipe = new \model\mapping\RecipesMapping($recipeData);
                        $insertedRecipe = $recipesManager->insertRecipe($newRecipe);

                        if ($insertedRecipe) {
                            $successMessage = "Recette '{$insertedRecipe->getRecipeTitle()}' ajoutée avec succès !";
                            
                            // Créer le fichier .html.php pour la nouvelle recette
                            $templatePath = '../../frontend/view/recettes/recipe_template.html.php';
                            $newRecipeFilePath = '../../frontend/view/recettes/' . $insertedRecipe->getRecipeSlug() . '.html.php';

                            if (file_exists($templatePath)) {
                                // Charger le template et le rendre générique en remplaçant la variable $recette par $insertedRecipe
                                ob_start();
                                $recette = $insertedRecipe;
                                include $templatePath;
                                $templateContent = ob_get_clean();

                                // S'assurer que le contenu du template est bien celui d'une page PHP
                                // et que les variables PHP ($recette) seront bien interprétées lors de l'inclusion future
                                $finalContent = str_replace(
                                    '<?= htmlspecialchars($recette->getRecipeTitle()) ?>',
                                    '<?= htmlspecialchars($recette->getRecipeTitle()) ?>', // Pas de remplacement ici, la variable sera injectée dynamiquement
                                    $templateContent
                                );
                                // TODO: Remplacer les placeholders pour les ingrédients, étapes, etc. si on les ajoute au formulaire

                                file_put_contents($newRecipeFilePath, $templateContent); // Utilisation directe du contenu capturé
                                $successMessage .= " La page a été créée : " . $insertedRecipe->getRecipeSlug() . ".html.php";
                            } else {
                                $errorMessage .= " Impossible de trouver le template de recette.";
                            }

                            // Redirection vers le tableau de bord admin après succès
                            header('Location: ?pg=admin&msg=' . urlencode($successMessage));
                            exit;

                        } else {
                            $errorMessage = "Erreur lors de l'ajout de la recette en base de données.";
                        }
                    } catch (Exception $e) {
                        $errorMessage = "Erreur : " . $e->getMessage();
                    }
                } else {
                    $errorMessage = "Tous les champs obligatoires doivent être remplis.";
                }
            } else {
                $errorMessage = "Méthode non autorisée pour cette action.";
            }
            // Si une erreur se produit, rediriger vers le tableau de bord avec le message
            if(!empty($errorMessage)){
                header('Location: ?pg=admin&error=' . urlencode($errorMessage));
                exit;
            }
            break;

        // case 'edit_recipe': ...
        // case 'delete_recipe': ...
        // case 'delete_comment': ...
        // etc.
        
        default:
            // Par défaut, afficher le tableau de bord
            $allRecipes = $recipesManager->getAllRecipes();
            $allUsers = $userManager->findAll();
            $allComments = $commentManager->getAllComments();
            $allLikes = $likesManager->getAllLikes();

            if (isset($_GET['msg'])) {
                $successMessage = $_GET['msg'];
            }
            if (isset($_GET['error'])) {
                $errorMessage = $_GET['error'];
            }
            require_once '../../frontend/view/admin.html.php';
            break;
    }
} else {
    // Par défaut, afficher le tableau de bord
    $allRecipes = $recipesManager->getAllRecipes();
    $allUsers = $userManager->findAll();
    $allComments = $commentManager->getAllComments();
    $allLikes = $likesManager->getAllLikes();

    if (isset($_GET['msg'])) {
        $successMessage = $_GET['msg'];
    }
    if (isset($_GET['error'])) {
        $errorMessage = $_GET['error'];
    }
    require_once '../../frontend/view/admin.html.php';
}
