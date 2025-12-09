<?php

namespace model\manager;

use PDO;
use Exception;
use model\mapping\UserMapping;
use model\ManagerInterface;
use model\UserInterface;


class UserManager implements ManagerInterface, UserInterface
{
    protected PDO $connect;

    public function __construct(PDO $connect)
    {
        $this->connect = $connect;
    }

    // Fonction de connexion de l'utilisateur
    public function connect(array $tab): bool
    {
        // Vérification minimale des champs attendus
        if (!isset($tab['user_name'], $tab['user_pwd'])) {
            return false;
        }

        // Création d'un UserMapping
        $user = new UserMapping($tab);

        // On prépare la requête SQL
        $sql = "SELECT * FROM users WHERE user_name = :user_name LIMIT 1;";

        try {
            $stmt = $this->connect->prepare($sql);
            $stmt->execute([
                ":user_name" => $user->getUserName()
            ]);

            // On vérifie qu'un utilisateur a été trouvé
            if ($stmt->rowCount() !== 1) {
                return false;
            }

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            // Vérification du mot de passe
            if (password_verify($user->getUserPwd(), $result['user_pwd'])) {
                session_regenerate_id(true);
                // On met à jour la session
                $_SESSION['users_id']   = $result['users_id'];
                $_SESSION['user_name']  = $result['user_name'];
                $_SESSION['user_mail']  = $result['user_mail'];
                $_SESSION['user_role']  = $result['user_role'];
                // Évite de garder le mot de passe en session
                return true;
            } else {
                return false;
            }

        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Fonction de déconnexion de l'utilisateur
    public function disconnect(): bool
    {
        // destruction des variables de session
        session_unset();
        // destruction du cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // succès de la déconnexion
        if (session_destroy()) {
            return true;
        } else {
            return false;
        }
    }

    // Fonction d'inscription d'un nouvel utilisateur'
    public function register(array $tab): UserMapping|bool
    {
        // On vérifie que le password et le password_confirm sont identiques
        if ($tab['user_pwd'] !== $tab['user_pwd_confirm']) {
            throw new Exception("Les mots de passe ne correspondent pas.");
        }

        // On vérifie si l'utilisateur existe
        if ($this->userExists($tab['user_name'], $tab['user_mail'])) {
            throw new Exception("Ce login ou cet email est déjà utilisé.");
        }

        // Création d'un UserMapping
        $user = new UserMapping($tab);

        // On hash le mot de passe
        $user->setUserPwd(password_hash($tab['user_pwd'], PASSWORD_DEFAULT));

        // On donne la valeur de rôle "user" par défaut
        $user->setUserRole("user");

        // On prépare la requête SQL
        $sql = "INSERT INTO `users` (`user_name`, `user_pwd`, `user_mail`, `user_role`) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect->prepare($sql);

        try {
            $stmt->execute([
                $user->getUserName(),
                $user->getUserPwd(),
                $user->getUserMail(),
                $user->getUserRole(),
            ]);
            return $user;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Fonction pour vérifier si l'utilisateur existe déjà
    public function userExists(string $login, string $email): bool
    {
        $sql = "SELECT `users_id` FROM `users` WHERE `user_name` = ? OR `user_mail` = ?";
        $stmt = $this->connect->prepare($sql);
        try {
            $stmt->execute([$login, $email]);
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM users ORDER BY users_id ASC";
        $stmt = $this->connect->prepare($sql);
        try {
            $stmt->execute();
            $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            $listUsers = [];
            foreach ($usersData as $data) {
                $listUsers[] = new UserMapping($data);
            }
            return $listUsers;
        } catch (Exception $e) {
            echo "Erreur lors de la récupération des utilisateurs : " . $e->getMessage();
            return [];
        }
    }
}