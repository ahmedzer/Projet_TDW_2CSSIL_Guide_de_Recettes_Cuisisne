<?php
require_once ('../Controllers/AdminController.php');
$controller = new AdminController();
$controller->afficherPageGestion_recette();

//id de la recette a supprimer
if(isset($_POST['recetteDeleteId'])) {
    $controller->deleteRecette($_POST['recetteDeleteId']);
}

//modification recupere les data de la recette modifié
if (isset($_POST['id_Recette'],$_POST['categorie_recette'],$_POST['titre_recette'],
    $_POST['description_recette'],$_POST['image_recette'],
    $_POST['recette_valide'],$_POST['portion'],$_POST['temps_preparation']))
{
    $controller->modifierRecette($_POST['id_Recette'],$_POST['categorie_recette'],$_POST['titre_recette'],
        $_POST['description_recette'],$_POST['image_recette'],
        $_POST['recette_valide'],$_POST['portion'],$_POST['temps_preparation']);
}
