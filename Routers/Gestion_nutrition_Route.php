<?php
require_once ('../Vues/Gestion_nutrition_vue.php');
require_once ('../Controllers/AdminController.php');
$gestion_nut_vue = new Gestion_nutrition_vue();
$gestion_nut_vue->afficherTop();
$gestion_nut_vue->afficherIngredsTable();
$gestion_nut_vue->insertIngredForm();
$gestion_nut_vue->afficherBas();

$admin_controller = new AdminController();

if(isset($_POST['id_ingred_delete'])) {
    $admin_controller->deleteIngred($_POST['id_ingred_delete']);
}

if(isset($_POST['id_ingred'],
    $_POST['nom_ingred'],
    $_POST['health_note_ingred'],
    $_POST['cout_ingred'],
    $_POST['saison_i'],
    $_POST['calories'],
    $_POST['proteines'],
    $_POST['glucides'],
    $_POST['lipides'],
   $_POST['eau'],
    $_POST['fibres'],
    $_POST['vitamines'],
    $_POST['description_ingred'],
    $_POST['image_ingred'],
    $_POST['type_ingred'])) {

    $admin_controller->updateIngred($_POST['id_ingred'],
        $_POST['nom_ingred'],
        $_POST['health_note_ingred'],
        $_POST['cout_ingred'],
        $_POST['saison_i'],
        $_POST['calories'],
        $_POST['proteines'],
        $_POST['glucides'],
        $_POST['lipides'],
        $_POST['eau'],
        $_POST['fibres'],
        $_POST['vitamines'],
        $_POST['description_ingred'],
        $_POST['image_ingred'],
        $_POST['type_ingred']);
}