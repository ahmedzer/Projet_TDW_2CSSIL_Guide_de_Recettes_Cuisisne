<?php
require_once ('../Vues/GestionNewsVue.php');

$admin_controller= new AdminController();
if(isset($_POST['id_news_delete'])) {
    $admin_controller->deleteNews($_POST['id_news_delete']);
}
if(isset($_POST['news_id'],$_POST['news_titre'],$_POST['contenu_news'],
    $_POST['link_img'],$_POST['link_post'],$_POST['num'],$_POST['externLink']))
{
    $admin_controller->editNews($_POST['news_id'],$_POST['news_titre'],$_POST['contenu_news'],
        $_POST['link_img'],$_POST['link_post'],$_POST['num'],$_POST['externLink']);
}


$gestion_news_vue = new GestionNewsVue();
$gestion_news_vue->afficherTop();
$gestion_news_vue->afficherNewsTable();
$gestion_news_vue->insertNewsForm();
$gestion_news_vue->afficherBas();
