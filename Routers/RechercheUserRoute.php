<?php
require_once ('../Controllers/RechercheController.php');
require_once ('../Controllers/AdminController.php');

$controller= new RechercheController();
$admin_controller = new AdminController();
$users = $admin_controller->getUsers();//liste complete des users

//Effectuer les filtre selon les parametres envoyés  *************************************/
if(isset($_GET['search']) and !empty($_GET['search']) and $_GET['search']!="unset") {
    $users = $controller->filterByUserSearch($users,$_GET['search']);
}
if(isset($_GET['filterName']) and !empty($_GET['filterName'])) {
    $users = $controller->filterByName($users,$_GET['filterName']);
}
if(isset($_GET['filterEmail']) and !empty($_GET['filterEmail'])) {
    $users = $controller->filterByEmail($users,$_GET['filterEmail']);
}
if(isset($_GET['filterPhone']) and !empty($_GET['filterPhone'])) {
    $users = $controller->filterByPhone($users,$_GET['filterPhone']);
}
if(isset($_GET['filterBirthDate']) and !empty($_GET['filterBirthDate']) ) {
    $users = $controller->filterByDate($users,$_GET['filterBirthDate']);
}

$controller->afficherPageRecherche($users);//afficher la page avec le resultat des filtres (users)

