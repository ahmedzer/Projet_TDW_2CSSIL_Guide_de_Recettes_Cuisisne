<?php
require_once ('../Vues/GestionParametreVue.php');

$gestion_param_vue = new GestionParametreVue();
$gestion_param_vue->afficherTop();
$gestion_param_vue->afficherDiapoTabel();
$gestion_param_vue->affichreParamSite();
$gestion_param_vue->insertDiapoForm();
$gestion_param_vue->afficherBas();

$admin_controller = new AdminController();
if(isset($_POST['id_diap_delete'])){
    $admin_controller->deleteDiapo($_POST['id_diap_delete']);
}

if(isset($_POST['id_diapo'],$_POST['titre_diapo'],$_POST['description_diapo'],$_POST['image_diapo'],$_POST['lien_diapo'])) {
    $admin_controller->editDiapo($_POST['id_diapo'],$_POST['titre_diapo'],$_POST['description_diapo'],$_POST['image_diapo'],$_POST['lien_diapo']);
}

if(isset($_POST['id_param'],$_POST['titre_param'],$_POST['valeur'])){
    $admin_controller->updateParam($_POST['id_param'],$_POST['titre_param'],$_POST['valeur']);
}