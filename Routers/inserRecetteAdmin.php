<?php
require_once ('../Vues/AjouterRecetteAdminVue.php');

$vue = new AjouterRecetteAdminVue();
$vue->afficherTop();
$vue->afficherFormRecette();
