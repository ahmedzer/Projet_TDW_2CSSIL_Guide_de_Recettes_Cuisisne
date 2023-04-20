<?php
require_once('../Controllers/UserController.php');
require_once ('../Models/User.php');
require_once('../Controllers/IngredientsController.php');
require_once ('../Models/Recette.php');
require_once ('../Controllers/RecetteController.php');
require_once ('../Vues/SignInVue.php');
require_once ('../Controllers/AdminController.php');
require_once ('../Models/Admin.php');
require_once ('../Controllers/RechercheController.php');
require_once ('../Models/Recette.php');
require_once ('../Models/Ingredient.php');
require_once ('../Controllers/IdeeRecetteController.php');
require_once ('../Controllers/FeteController.php');

$controller = new User();
$user = $controller->getUserName(49);
echo $user[0]['user_name'];