<?php
require_once ('../Controllers/AdminController.php');



$controller = new AdminController();

if(isset($_SESSION['admin_id'])) {
    $controller->afficherGestion_user_page();
}
else {
    echo "Vous n'avez pas acces a cette page";
}


if(isset($_POST['u_id'],$_POST['u_name'],$_POST['u_mail'],$_POST['u_phone'],$_POST['u_date'],$_POST['u_valid'],$_POST['u_pass'])){
    $response = $controller->updateUser($_POST['u_id'],$_POST['u_name'],$_POST['u_mail'],$_POST['u_phone'],$_POST['u_date'],$_POST['u_valid'],$_POST['u_pass']);
}
if(isset($_POST['u_id_to_delete'])) {
    $response = $controller->deleteUser($_POST['u_id_to_delete']);
}
if(isset($_POST['u_id_to_valid'])) {
    $response = $controller->validerUser($_POST['u_id_to_valid']);
}
if(isset($_POST['u_id_to_ban'])) {
    $response = $controller->bannirUser($_POST['u_id_to_ban']);
}







