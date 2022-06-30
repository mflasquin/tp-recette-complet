<?php session_start() ?>
<?php include_once('./include/variables.php') ?>
<?php include_once('./include/fonctions.php') ?>
<?php
if(!isLogged()) {
    header('Location: /cours_php/tp-recette-decoupage/login.php');
}

if (isset($_POST['title']) && isset($_POST['recipe'])) {
    if (empty($_POST['title']) || empty($_POST['recipe'])) {
        $messageErreur = 'Veuillez saisir un titre de recette et une recette';
    } else {
        if(createRecipe($_POST['title'],$_POST['recipe'], $_SESSION['loggedUser']['id']) === true) {
            header('Location: /cours_php/tp-recette-decoupage/index.php');
        } else {
            $messageErreur = 'Une erreur est survenue lors de la création de la recette';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Création d'une recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>
<?php include_once('./include/header.php') ?>
<div class="container">
    <h1>Créer une nouvelle recette</h1>
    <form action="createRecipe.php" method="POST">
        <?php if (isset($messageErreur)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $messageErreur ?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help">
        </div>
        <div class="mb-3">
            <label for="recipe" class="form-label">Recette</label>
            <textarea rows="10" class="form-control" id="recipe" name="recipe"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
<?php include_once('./include/footer.php') ?>
</body>
</html>
