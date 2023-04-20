<?php
require_once ('../Controllers/UserController.php');
$userController = new UserController();

$userController->afficherLoginPage();