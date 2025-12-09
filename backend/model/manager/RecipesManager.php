<?php

namespace model\manager;

use PDO;
use Exception;
use model\mapping\RecipesMapping;
use model\ManagerInterface;
use model\StringTrait;
use model\mapping\UserMapping;

class RecipesManager implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    // Utilisation du trait
    use StringTrait;

    // Récuperation de toute les recettes
    public function getAllRecipes(): array
    {
        $sql = "SELECT r.*, u.users_id, u.user_name, u.user_mail, u.user_pwd, u.user_role,
                       GROUP_CONCAT(DISTINCT c.category_slug) as category_slugs,
                       GROUP_CONCAT(DISTINCT i.ingredient_name SEPARATOR '|||') as ingredients_list,
                       AVG(l.like_cote) as average_rating
                FROM recipes r 
                JOIN users u ON r.users_users_id = u.users_id 
                LEFT JOIN category_has_recipes chr ON r.recipes_id = chr.recipes_recipes_id
                LEFT JOIN category c ON chr.category_category_id = c.category_id
                LEFT JOIN ingredients_has_recipes ihr ON r.recipes_id = ihr.recipes_recipes_id
                LEFT JOIN ingredients i ON ihr.ingredients_ingredients_id = i.ingredients_id
                LEFT JOIN likes l ON r.recipes_id = l.recipes_recipes_id
                GROUP BY r.recipes_id
                ORDER BY u.user_name, r.recipe_title";
        $stmt = $this->db->prepare($sql);
        try {
            $stmt->execute();
            $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            $listRecipes = [];
            foreach ($recipesData as $data) {
                // Créer un objet UserMapping pour l'auteur
                $user = new UserMapping($data);

                // Créer un objet RecipesMapping
                $recipe = new RecipesMapping($data);
                $recipe->setUser($user); // Associer l'auteur à la recette
                $recipe->average_rating = $data['average_rating'];

                $listRecipes[] = $recipe;
            }
            return $listRecipes;
        } catch (Exception $e) {
            echo "Erreur lors de la récupération des recettes : " . $e->getMessage();
            return [];
        }
    }

    // Récuperation via slug
    public function getRecipesBySlug(string $slug): ?RecipesMapping
    {
        $sql = "SELECT * FROM recipes WHERE recipe_slug = ? ";
        $stmt = $this->db->prepare($sql);
        try {
            $stmt->execute([$slug]);
            $recipe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if (empty($recipe))
                return null;
            $cat = new RecipesMapping($recipe);
            return $cat;

        } catch (Exception $e) {
            echo "Erreur lors de la récupération de la recette : " . $e->getMessage();
            return null;
        }
    }

    // Récuperation de la recette par son id
    public function getRecipesById(int $id): ?RecipesMapping
    {
        $sql = "SELECT * FROM recipes WHERE recipes_id = ? ";
        $stmt = $this->db->prepare($sql);
        try {
            $stmt->execute([$id]);
            $recipe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if (empty($recipe))
                return null;
            $cat = new RecipesMapping($recipe);
            return $cat;

        } catch (Exception $e) {
            echo "Erreur lors de la récupération de la recette : " . $e->getMessage();
            return null;
        }
    }

    public function insertRecipe(RecipesMapping $recipe): ?RecipesMapping
    {
        // On crée le slug à partir du titre
        $slug = $this->slugify($recipe->getRecipeTitle());
        $recipe->setRecipeSlug($slug);

        $sql = "INSERT INTO recipes (recipe_title, recipe_slug, recipe_desc, recipe_img, recipe_cook_time, users_users_id) 
                VALUES (:title, :slug, :desc, :img, :cook_time, :user_id)";

        $stmt = $this->db->prepare($sql);
        try {
            $stmt->bindValue(':title', $recipe->getRecipeTitle());
            $stmt->bindValue(':slug', $recipe->getRecipeSlug());
            $stmt->bindValue(':desc', $recipe->getRecipeDesc());
            $stmt->bindValue(':img', $recipe->getRecipeImg());
            $stmt->bindValue(':cook_time', $recipe->getRecipeCookTime(), PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $recipe->getUsersUsersId(), PDO::PARAM_INT);

            $stmt->execute();

            // On récupère l'ID de la recette insérée
            $recipe->setRecipesId($this->db->lastInsertId());

            return $recipe;

        } catch (Exception $e) {
            echo "Erreur lors de l'insertion de la recette : " . $e->getMessage();
            return null;
        }
    }

    /**
     * Récupère les recettes les mieux notées.
     * @param int $limit Le nombre maximum de recettes à retourner.
     * @return array Un tableau d'objets RecipesMapping avec leur note moyenne.
     */
    public function getTopRatedRecipes(int $limit = 4): array
    {
        $sql = "SELECT r.*, AVG(l.like_cote) AS average_rating
                FROM recipes r
                LEFT JOIN likes l ON r.recipes_id = l.recipes_recipes_id
                GROUP BY r.recipes_id
                ORDER BY average_rating DESC, r.recipe_title ASC
                LIMIT :limit";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

        try {
            $stmt->execute();
            $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            $listRecipes = [];
            foreach ($recipesData as $data) {
                $recipe = new RecipesMapping($data);
                // On ajoute la note moyenne directement à l'objet mapping si possible,
                // ou on la stocke séparément. Ici, je vais l'ajouter dans une propriété temporaire.
                $recipe->average_rating = $data['average_rating'];
                $listRecipes[] = $recipe;
            }
            return $listRecipes;
        } catch (Exception $e) {
            echo "Erreur lors de la récupération des recettes les mieux notées : " . $e->getMessage();
            return [];
        }
    }
}
