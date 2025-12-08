<?php

namespace model\manager;

use model\ManagerInterface;
use model\StringTrait;
use model\mapping\RecipesMapping;
use model\mapping\CommentMapping;
use model\mapping\UserMapping;
use PDO;
use Exception;

class CommentManager implements ManagerInterface
{
    private PDO $connect;

    public function __construct(PDO $connect)
    {
        $this->connect = $connect;
    }
    // Récupération des Traits
    use StringTrait;

    // récupération de tous les commentaires
    public function getAllComments(): array
    {
        $sql = "SELECT c.*, u.`users_id`, u.`user_name`, r.`recipes_id`, r.`recipe_title` , r.`recipe_slug`
                FROM `comments` c
                INNER JOIN `users` u ON c.`users_users_id` = u.`users_id`
                INNER JOIN `recipes` r ON c.`recipes_recipes_id` = r.`recipes_id`
                ORDER BY c.`comment_created_date` DESC";
        $prepare = $this->connect->prepare($sql);
        try {
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
            $prepare->closeCursor();

            $comments = [];
            foreach ($result as $row) {
                $comment = new CommentMapping($row);
                $user = new UserMapping($row);
                $recipe = new RecipesMapping($row);
                $comment->setUsers($user);
                $comment->setRecipes($recipe);
                $comments[] = $comment;
            }
            return $comments;

        } catch (Exception $e) {
            echo "Erreur lors de la récupération des commentaires : " . $e->getMessage();
            return [];
        }
    }

    // Récupération de tous les commentaires d'une recette
    public function findAllByRecipeId(int $recipeId): array
    {
        $sql = "SELECT c.*, u.user_name 
                FROM `comments` c
                JOIN `users` u ON c.users_users_id = u.users_id
                WHERE c.recipes_recipes_id = :recipeId AND c.comment_is_published = 0
                ORDER BY c.comment_created_date DESC";
        $prepare = $this->connect->prepare($sql);
        try {
            $prepare->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
            $prepare->closeCursor();

            $comments = [];
            foreach ($result as $row) {
                $comment = new CommentMapping($row);
                $user = new UserMapping($row);
                $comment->setUsers($user);
                $comments[] = $comment;
            }
            return $comments;

        } catch (Exception $e) {
            echo "Erreur lors de la récupération des commentaires de la recette : " . $e->getMessage();
            return [];
        }
    }


    // insertion d'un commentaire
    public function insertComment(CommentMapping $comment): bool
    {
        // si l'utilisateur n'est pas connecté
        if(!isset($_SESSION['users_id']))
            throw new Exception("Vous devez être connecté pour poster un commentaire");

        // Vérifier si la recette est définie dans le commentaire
        if (is_null($comment->getRecipes()) || is_null($comment->getRecipes()->getRecipesId())) {
            throw new Exception("Le commentaire doit être associé à une recette.");
        }

        // préparation de la requête
        $sql = "INSERT INTO `comments` (comment_sujet, comment_message, users_users_id, recipes_recipes_id) 
                VALUES (:sujet, :message, :users_id, :recipes_id)";
        $prepare = $this->connect->prepare($sql);
        try {
            $prepare->bindValue(':sujet', $comment->getCommentSujet());
            $prepare->bindValue(':message', $comment->getCommentMessage()); 
            $prepare->bindValue(':users_id', $_SESSION['users_id'], PDO::PARAM_INT);
            $prepare->bindValue(':recipes_id', $comment->getRecipes()->getRecipesId(), PDO::PARAM_INT);
            $prepare->execute();
            return true;
        } catch (Exception $e) {
            echo "Erreur lors de l'insertion du commentaire : " . $e->getMessage();
            return false;
        }
    }
}