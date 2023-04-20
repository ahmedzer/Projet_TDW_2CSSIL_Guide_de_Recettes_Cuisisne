<?php
require_once ('../Controllers/RecetteController.php');
require_once ('../Controllers/UserController.php');
$r_controller = new RecetteController();

if(isset($_SESSION['user_id']) ) {
    $use_controller = new UserController();
    if($use_controller->checkUserValid($_SESSION['user_id'])==1) {
        $r_controller->afficherInsertRecettePage();
    }
    else {
        $r_controller->bannedUser();
    }
}
else {
    if(isset($_SESSION['admin_id'])) {
        $r_controller->afficherInsertRecettePageAdmin();
    }
    else {
        $r_controller->authRequired();
    }
}


