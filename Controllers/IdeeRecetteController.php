<?php
require_once ('../Models/Recette.php');
require_once ('../Models/Ingredient.php');
require_once ('../Vues/IdeeRecetteVue.php');
require_once ('../Vues/AllRecettesVue.php');
require_once ('../Controllers/AdminController.php');
class IdeeRecetteController
{
    public function afficherPage() {
        $vue = new IdeeRecetteVue();
        $vue->afficherTopPage();
        $vue->afficherSelectMenu();
        $vue->afficherBasdePage();
    }

    public function recetteContainsIngred($id_recette,$id_ingred) {//verifier si une recette contient un ingredient
        $recette = new Recette();
        return $recette->checkIfRecetteContainsIngred($id_recette,$id_ingred);
    }

    public function calculerPourcentageIngredRecette($id_recette,$list_ingred) {//calculer le pourcentage des ingredients dans la recette
        $trouve = 0;
        $list_size = count($list_ingred);
        foreach ($list_ingred as $ingred) {
            if($this->recetteContainsIngred($id_recette,$ingred)==1) {
                $trouve++;
            }
        }
        if($trouve==0) {
            return 0;
        }
        else {
            return $trouve/$list_size;
        }
    }

    public function TrouverRecette($list_ingred) {
        $recette = new Recette();
        $trouv_list = array();
        $rsts= $recette->getRecettes();

        $controller = new AdminController();
        $param_calories = $controller->getParamR(2);
        $pourcentage_rechercher = $param_calories[0]['valeur'];//parametre pour des 700
        foreach ($rsts as $rst) {//pour chaque recette
            $pourcentage = $this->calculerPourcentageIngredRecette($rst[0],$list_ingred);
            if($pourcentage>=$pourcentage_rechercher) {//si le poucentage >70% ajouter la recette a la lists des resultats
                $trouv_list[] = $rst;
            }
        }
        return $trouv_list;
    }

    public function afficherResultatRecherche($recettes_trouve,$health) {
        $vue =new AllRecettesVue();
        $vue->afficherTop();
        $vue->afficherRecherche($recettes_trouve,$health);
        $vue->afficherBasDePage();
    }
}