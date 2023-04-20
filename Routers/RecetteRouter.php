<?php
require_once ('../Vues/RecetteVue.php');
require_once ('../Controllers/UserController.php');




$recette_id = $_GET['r_id'];
$recette_vue = new RecetteVue();
$recette_vue->afficherTete();
$recette_vue->afficherMenu('#fffff');
$recette_vue->afficherRecetteEntete($recette_id);
$recette_vue->afficherIngredient($recette_id);
$recette_vue->afficherEtapes($recette_id);
$recette_vue->afficherFin();



