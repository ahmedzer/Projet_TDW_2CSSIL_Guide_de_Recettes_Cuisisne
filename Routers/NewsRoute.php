<?php
require_once ('../Vues/NewsVue.php');

if (isset($_GET['newId'])) {
    $vue = new NewsVue();
    $vue->afficherTop();
    $vue->afficherNews($_GET['newId']);
    $vue->afficherBasDePage();
}
