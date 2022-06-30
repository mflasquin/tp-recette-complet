<?php
session_start() ;
include_once('./include/variables.php');
include_once('./include/fonctions.php');
//On se déconnecte
logout(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recettes de cuisine</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <script>
        setTimeout(
            function() {
                window.location.pathname = "cours_php/tp-recette-decoupage/index.php";
            }
            , 5000
        );
    </script>
</head>
<body>
<?php include_once('./include/header.php') ?>
<div class="container">
    Vous êtes bien déconnecté, vous serez redirigé automatiquement vers l'accueil dans 5 secondes <br/>
    <a href="index.php">Retour vers l'accueil</a>
</div>
<?php include_once('./include/footer.php') ?>
</body>
</html>
