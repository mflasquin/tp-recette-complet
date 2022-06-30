<?php

function connectDatabase() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=recette;charset=utf8', 'root', '');
        return $db;
    } catch (Exception $e) {
        die ('Erreur : ' . $e->getMessage());
    }
}

/**
 * @param string $authorEmail
 * @return string
 */
function displayAuthor(string $authorEmail): string
{
    //Pour chacun de mes utilisateurs ($users)
    foreach (USERS as $user) {
        //Si l'email de l'utilisateur correspond à l'email de l'auteur de la recette ($user['email'] === $authorEmail)
        if ($user['email'] === $authorEmail) {
            //Je retourne une chaine de caractères avec le nom, prénom et l'age de l'utilisateur
            return getFullName($user) . ' (' . $user['age'] . ' ans)';
        }
    }
    return "Aucun auteur pour cette recette";
}

/**
 * @param array $recipe
 * @return bool
 */
function isValideRecipe(array $recipe): bool
{
    if (array_key_exists('is_enabled', $recipe) && $recipe['is_enabled'] === true) {
        return true;
    }

    return false;
}

/**
 * @return bool
 */
function isAdmin()
{
    return ROLE_ADMIN === $_SESSION['loggedUser']['role'];
}

/**
 * Retourne les recettes valides
 *
 * @return array
 */
function getRecipes($email): array
{
    $db = connectDatabase();
//    $sqlQuery = 'SELECT recipe.*
//                    FROM recipe
//                    INNER JOIN user ON recipe.id_user = user.id
//                    WHERE user.email = :email
//                    AND enabled = 1';
//    $parameters = ['email' => $email];

//    if(isAdmin()) {
        $sqlQuery = 'SELECT recipe.*
                    FROM recipe
                    INNER JOIN user ON recipe.id_user = user.id';
        $parameters = [];
//    }

    $recipeStatement = $db->prepare($sqlQuery);
    $recipeStatement->execute($parameters);

    return $recipeStatement->fetchAll();
}

/**
 * Vérifie si l'utilisateur est connecté
 *
 * @return bool
 */
function isLogged(): bool
{
    if(isset($_SESSION['loggedUser'])) {
        return true;
    }

    if(isset($_COOKIE['loggedUser'])) {
        $user = searchUserByStayConnected($_COOKIE['loggedUser']);
        if($user !== false) {
            $_SESSION['loggedUser'] = $user;
            return true;
        }
    }

    return false;
}

/**
 * Retourne le nom complet d'un utilisateur
 *
 * @param array $user
 * @return string
 */
function getFullName(array $user): string
{
    return htmlentities($user['firstname'] . ' ' . $user['lastname']);
}

/**
 * Recherche un utilisateur en fonction de son email et son mot de passe
 *
 * @param $email
 * @param $password
 * @return false|mixed
 */
function searchUserByEmailAndPassword($email, $password)
{
    $db = connectDatabase();
    $sqlQuery = "SELECT * FROM user WHERE email = :userEmail AND password = :userPassword";
    $userStatement = $db->prepare($sqlQuery);
    $userStatement->execute([
        'userEmail' => $email,
        'userPassword' => md5($password)
    ]);
    $user = $userStatement->fetchAll();
    if(count($user) === 1) {
        $user = $user[0];
        unset($user['password']);
        return $user;
    }

    return false;
}

function searchUserByStayConnected($stayConnectedString)
{
    foreach (USERS as $user) {
        if ($user['stayConnected'] === $stayConnectedString) {
            unset($user['password']);
            return $user;
        }
    }

    return false;
}

/**
 * @param $length
 * @return string
 */
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Déconnecte l'utilisateur
 * @return void
 */
function logout()
{
    session_destroy();
    setcookie('loggedUser');
}

function createRecipe($title, $recipe, $userId) {
    $db = connectDatabase();
    $sqlQuery = "INSERT INTO recipe(title, recipe, enabled, id_user) VALUES (:title,:recipe,1,:userId)";
    $userStatement = $db->prepare($sqlQuery);

    return $userStatement->execute([
        'title' => $title,
        'recipe' => $recipe,
        'userId' => $userId
    ]);
}

function canUpdateOrDeleteRecipe($recipe)
{
    if(isAdmin() || $recipe['id_user'] === $_SESSION['loggedUser']['id']) {
        return true;
    }

    return false;
}

function getRecipe($recipeId)
{
    $db = connectDatabase();
    $sqlQuery = "SELECT * FROM recipe WHERE id = :id";
    $recipeStatement = $db->prepare($sqlQuery);
    $recipeStatement->execute([
        'id' => $recipeId
    ]);

    return $recipeStatement->fetchAll();
}


function deleteRecipe($recipeId)
{
    $db = connectDatabase();
    $sqlQuery = "DELETE FROM recipe WHERE id = :id";
    $recipeStatement = $db->prepare($sqlQuery);
    $recipeStatement->execute([
        'id' => $recipeId
    ]);
}