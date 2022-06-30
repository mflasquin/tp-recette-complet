<?php
session_start();
include_once('./include/variables.php');
include_once('./include/fonctions.php');
//Si je ne suis pas connecté je redirige vers la page de connexion
if(!isLogged()) {
    header('Location: /cours_php/tp-recette-decoupage/login.php');
}

$recipe = getRecipe($_GET['id']);
if(count($recipe) > 0) {
    if(canUpdateOrDeleteRecipe($recipe[0])) {
        deleteRecipe($_GET['id']);
        header('Location: /cours_php/tp-recette-decoupage/index.php');
    }
}

