<?php
require_once ('../Controllers/IngredientsController.php');

$ingred_controller = new IngredientsController();
$ingred_controller->afficherNutrition();
