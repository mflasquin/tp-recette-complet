<?php session_start() ?>
<?php include_once('./include/variables.php') ?>
<?php include_once('./include/fonctions.php') ?>
<?php
if(isLogged()) {
    header('Location: /cours_php/tp-recette-decoupage/index.php');
}
?>
<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $messageErreur = 'Veuillez saisir un email et un mot de passe';
    } else {
        if($user = searchUserByEmailAndPassword($_POST['email'], $_POST['password'])) {
            $_SESSION['loggedUser'] = $user;

            if(isset($_POST['stayConnected'])) {
                //Générer une chaine aléatoire pour l'utilisateur
                //Enregistrer cette chaine au niveau de l'utilisateur dans la base de données
                setcookie('loggedUser', $user['stayConnected'], ['expires' => time()+3600*24*7, 'secure' => true, 'httponly' => true]);
            }

            //Redirect vers l'accueil
            header('Location: /cours_php/tp-recette-decoupage/index.php');
        }
        //Pas d'utilisateur trouvé, les identifiants sont invalides
        $messageErreur = 'Email ou mot de passe invalide';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recettes de cuisine</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>
<?php include_once('./include/header.php') ?>
<div class="container">
    <form action="login.php" method="POST">
        <?php if (isset($messageErreur)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $messageErreur ?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="email-help"
                   placeholder="you@exemple.com" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
            <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <input type="checkbox" class="form-check-input" id="stayConnected" name="stayConnected">
            <label for="stayConnected" class="form-label">Rester connecté</label>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
<?php include_once('./include/footer.php') ?>
</body>
</html>
