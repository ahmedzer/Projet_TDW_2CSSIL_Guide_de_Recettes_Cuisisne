<?php


require_once ('../Vues/UserProfileVue.php');
require_once ('../Controllers/UserController.php');
$vue = new UserProfileVue();
if(isset($_SESSION['user_name'])) {
    $vue->afficherTop();
    $vue->afficherCover($_SESSION['user_id']);
    $vue->afficherFavRecettes($_SESSION['user_id']);
    $vue->afficherMesRecettes($_SESSION['user_id']);
    $vue->afficherBas();
}
if(isset($_POST['recette_id'],$_POST['user_id'])) {
    $user_controller = new UserController();
    $user_controller->retireFav($_POST['recette_id'],$_POST['user_id']);
}

if(isset($_POST['disconnect'])) {
    session_destroy();

    exit;
}
if(isset($_SESSION['admin_id'])) {

    if(isset($_GET['userId'])) {
        $vue->afficherTop();
        $vue->afficherCover($_GET['userId']);
        $vue->afficherFavRecettes($_GET['userId']);
        $vue->afficherMesRecettes($_GET['userId']);
        $vue->afficherBas();
    }
}
?>

