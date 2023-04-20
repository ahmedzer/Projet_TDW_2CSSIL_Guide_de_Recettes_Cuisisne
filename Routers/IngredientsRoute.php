<?php
require_once ('../Vues/IngredientsVue.php');
require_once ('../Controllers/IngredientsController.php');
header('Content-type: text/html; charset=utf-8');


$choix = $_GET['choix'];
$ingred_vue = new IngredientsVue();
$ingred_vue->afficherMenu();
$ingred_vue->afficherIngredient($choix);
$ingred_vue->afficherFin();

