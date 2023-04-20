<?php
require_once ('../Controllers/AccueilController.php');

$uname ="";//recuperer les infos d'utilisateur
$u_id="";


if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){//si l'utilisateur est authentifié
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
}
$accueilController =new AccueilController();
$accueilController->afficherAccueilPage($uname,$u_id);//envoyer les infos de l'utilisateur vers la vue pour choisir quoi afficher