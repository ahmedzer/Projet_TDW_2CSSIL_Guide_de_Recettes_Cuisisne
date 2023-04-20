<?php
require_once ('../Controllers/RecetteController.php');
require_once ('../Controllers/IdeeRecetteController.php');


//cette page affiche toute les recette et les resultat de rechrche dans idée recette
$controller = new RecetteController();

if(isset($_GET['searchRecette'])) {
    $controller2 = new IdeeRecetteController();
    $resultatTrouve = $controller2->TrouverRecette($_SESSION['ingredsList']);
    $controller2->afficherResultatRecherche($resultatTrouve,0);
}
else {
    if(isset($_GET['healthy'])) {//afficher la page avec des recettes healthy
        $recette_controller =new RecetteController();
        $controller2 = new IdeeRecetteController();
        $recette_healthy = $recette_controller->getRecettesHealthy();
        $controller2->afficherResultatRecherche($recette_healthy,1);
    }
    else {

        if(isset($_GET['saison'])) {
            $recettes = $controller->getRecetteDeSaison($_GET['saison']);
            $controller->afficherPageSaison($recettes,$_GET['saison']);
        }
        else {
            if(isset($_GET['catR'])) {//afficher les recettes
                $controller->afficherAllRecettes($_GET['catR']);
            }
        }
    }

}

