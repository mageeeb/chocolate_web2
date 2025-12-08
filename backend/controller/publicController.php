<?php

use model\manager\CategoryManager;
use model\manager\CommentManager;
use model\manager\RecipesManager;
use model\manager\UserManager;
use model\mapping\CommentMapping;

if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];

    $auteursAutorises = ['Daniel', 'JM', 'Mykyta', 'Reda', 'Sam', 'Sola'];
    switch ($pg) {
        case 'recette':
            // Traitement de la soumission de commentaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'submit-comment') {
                try {
                    // On utilise le slug de l'URL pour être sûr de l'associer à la bonne recette
                    $slug = $_GET['slug'] ?? '';
                    $recipeForComment = (new RecipesManager($connectPDO))->getRecipesBySlug($slug);

                    if (!$recipeForComment) {
                        throw new Exception("Recette non trouvée pour l'ajout du commentaire.");
                    }

                    // Création du mapping pour le commentaire
                    $comment = new CommentMapping([
                        'comment_sujet' => $_POST['comment_sujet'],
                        'comment_message' => $_POST['comment_message'],
                    ]);
                    $comment->setRecipes($recipeForComment);

                    // Insertion du commentaire
                    $commentManager = new CommentManager($connectPDO);
                    $commentManager->insertComment($comment);

                    // Redirection pour éviter la resoumission du formulaire
                    header('Location: ?pg=recette&slug=' . $slug);
                    exit();

                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }


            if (isset($_GET['slug'])) {
                $slug = $_GET['slug'];
                // On instancie le manager des recettes
                $recipesManager = new RecipesManager($connectPDO);
                // On récupère la recette via son slug
                $recette = $recipesManager->getRecipesBySlug($slug);

                // Si la recette n'existe pas, on affiche une 404
                if (!$recette) {
                    http_response_code(404);
                    require_once "../../frontend/view/404.html.php";
                    exit;
                }

                // On charge les commentaires pour cette recette
                $commentManager = new CommentManager($connectPDO);
                $comments = $commentManager->findAllByRecipeId($recette->getRecipesId());
                $recette->setComments($comments);

                // On charge les likes pour cette recette
                $likesManager = new \model\manager\LikesManager($connectPDO);
                $ratingInfo = $likesManager->getAverageRatingByRecipeId($recette->getRecipesId());
                $recette->setLikesInfo($ratingInfo);

                // On construit le chemin vers le fichier de vue
                $chemin = "../../frontend/view/recettes/" . $recette->getRecipeSlug() . ".html.php";

                // Si le fichier de vue existe, on l'inclut. Sinon, 404.
                if (is_file($chemin)) {
                    // La variable $recette sera disponible dans la vue
                    require_once $chemin;
                } else {
                    http_response_code(404);
                    require_once "../../frontend/view/404.html.php";
                }
            } else {
                // Si pas de slug, on redirige ou on affiche une erreur
                http_response_code(404);
                require_once "../../frontend/view/404.html.php";
            }
            exit; // On arrête l'exécution ici

        case 'like-recipe':
            header('Content-Type: application/json');
            $response = ['success' => false, 'message' => 'Erreur inconnue.'];

            // On vérifie si l'utilisateur est connecté
            if (!isset($_SESSION['users_id'])) {
                $response['message'] = 'Vous devez être connecté pour noter une recette.';
                echo json_encode($response);
                exit;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recipe_id'], $_POST['rating'])) {
                try {
                    $recipeId = (int) $_POST['recipe_id'];
                    $rating = (int) $_POST['rating'];
                    $userId = (int) $_SESSION['users_id'];

                    $likesManager = new \model\manager\LikesManager($connectPDO);

                    // On vérifie si l'utilisateur a déjà voté pour cette recette
                    $existingLike = $likesManager->findOneByUserAndRecipe($userId, $recipeId);

                    if ($existingLike) {
                        // Si l'utilisateur a déjà voté, on met à jour son vote
                        $existingLike->setLikeCote($rating);
                        $success = $likesManager->updateLike($existingLike);
                        $response['message'] = "Votre vote a été mis à jour.";
                    } else {
                        // Sinon, on insère un nouveau vote
                        $like = new \model\mapping\LikesMapping([
                            'users_users_id' => $userId,
                            'recipes_recipes_id' => $recipeId,
                            'like_cote' => $rating
                        ]);
                        $success = $likesManager->addLike($like);
                        $response['message'] = "Votre vote a été enregistré.";
                    }


                    if ($success) {
                        $ratingInfo = $likesManager->getAverageRatingByRecipeId($recipeId);
                        $response['success'] = true;
                        $response['new_average'] = round($ratingInfo['average'], 1);
                        $response['new_count'] = $ratingInfo['count'];
                    } else {
                        $response['message'] = "Erreur lors de l'enregistrement du vote.";
                    }

                } catch (Exception $e) {
                    $response['message'] = "Erreur : " . $e->getMessage();
                }
            } else {
                $response['message'] = 'Données manquantes.';
            }

            echo json_encode($response);
            exit;

        case 'login':
            // On test si le formulaire est soumis
            $succesLogin = "";
            $erreurLogin = "";
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['user_name']) && !empty($_POST['user_pwd'])) {
                // On prépare les données à envoyer à UserManager
                $userData = [
                    'user_name' => $_POST['user_name'] ?? '',
                    'user_pwd' => $_POST['user_pwd'] ?? ''
                ];
                // Création d'une instance de UserManager avec la connexion PDO
                $userManager = new UserManager($connectPDO);

                // Connexion
                if ($userManager->connect($userData)) {
                    $succesLogin = "Vous êtes bien connecté(e), bienvenue !";
                } else {
                    // Échec de connexion
                    $erreurLogin = "Identifiants incorrects ou compte inexistant.";
                }
            }
            // On inclut la vue du formulaire de connexion/inscription
            require_once "../../frontend/view/login.html.php";
            break;

        case 'register':
            $succesRegister = "";
            $erreurRegister = "";
            if (
                $_SERVER['REQUEST_METHOD'] === 'POST'
                && !empty($_POST['register_name'])
                && !empty($_POST['register_mail'])
                && !empty($_POST['register_pwd'])
                && !empty($_POST['register_pwd_confirm'])
            ) {
                // On prépare les données à envoyer à UserManager
                $registerData = [
                    'user_name' => $_POST['register_name'] ?? '',
                    'user_mail' => $_POST['register_mail'] ?? '',
                    'user_pwd' => $_POST['register_pwd'] ?? '',
                    'user_pwd_confirm' => $_POST['register_pwd_confirm'] ?? '',
                ];

                // Création d'une instance de UserManager avec la connexion PDO
                $userManager = new UserManager($connectPDO);

                try {
                    $result = $userManager->register($registerData);
                    if ($result) {
                        $succesRegister = "Vous êtes bien inscrit(e), bienvenue !";
                    } else {
                        $erreurRegister = "Erreur lors de l'inscription, veuillez réessayer.";
                    }
                } catch (Exception $e) {
                    $erreurRegister = $e->getMessage();
                }
            }
            // On inclut la vue du formulaire de connexion/inscription
            require_once "../../frontend/view/login.html.php";
            break;



        case 'logout':
            $userManager = new UserManager($connectPDO);
            $userManager->disconnect();
            header('Location: ./index.php');
            exit;

        case 'categories':
            $recipesManager = new RecipesManager($connectPDO);
            $recipes = $recipesManager->getAllRecipes();
            require_once "../../frontend/view/categories.html.php";
            break;



        case 'about':
            require_once "../../frontend/view/about.html.php";
            break;

        default:
            require_once "../../frontend/view/404.html.php";
    }
} else {
    require_once "../../frontend/view/index.html.php";
}