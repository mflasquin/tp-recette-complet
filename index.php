<?php session_start();
include_once('./include/variables.php');
include_once('./include/fonctions.php');
//Si je ne suis pas connecté je redirige vers la page de connexion
if(!isLogged()) {
    header('Location: /cours_php/tp-recette-decoupage/login.php');
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
    <div class="alert alert-success" role="alert">
        <?= 'Bonjour ' . getFullName($_SESSION['loggedUser']) ?>
    </div>
    <h1>Liste des recettes de cuisine</h1>
    <?php foreach (getRecipes($_SESSION['loggedUser']['email']) as $recipe) : ?>
        <article>
            <h3><?php echo htmlentities($recipe['title']); ?></h3>
            <?php if(canUpdateOrDeleteRecipe($recipe)): ?>
                <a href="deleteRecipe.php?id=<?= $recipe['id'] ?>" onclick="return confirm('Voulez-vous supprimer la recette <?= $recipe['title'] ?>')">Supprimer</a>
                <a href="">Modifier</a>
            <?php endif; ?>
            <div><?php echo htmlentities($recipe['recipe']); ?></div>
            <i><?php //echo displayAuthor($recipe['author']); ?></i>
        </article>
    <?php endforeach ?>
</div>
<?php include_once('./include/footer.php') ?>
</body>
</html>
