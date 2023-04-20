<?php
require_once ('../Models/Recette.php');
require_once ('../Models/Ingredient.php');
require_once ('../Vues/AllRecettesVue.php');
require_once ('../Models/User.php');
require_once ('../Vues/InsertRecette.php');
require_once ('../Controllers/AdminController.php');
class RecetteController
{
    private $recette;
    public function __construct(){
        $this->recette = new Recette();
    }

    public function getRecetteByCategory($categorie) {

        $result = $this->recette->getRecetteByType($categorie);
        return $result;
    }

    public function getRecetteById($id_recette) {
        $result = $this->recette->getRecetteById($id_recette);
        return $result;
    }
    public function getRecetteEtapes($id_recette) {
        $result = $this->recette->getEtapes($id_recette);
        return $result;
    }


    public function estimerCalories($id_recette) {
        return $this->recette->estimerCalories($id_recette);
    }

    public function estimerHealth($id_recette) {
        return $this->recette->estimerHealth($id_recette);
    }

    public function getRecetteType($id_recette) {
        $result = $this->recette->getRecetteType($id_recette);
        switch ($result[0][0]){
            case 1: return "Entrée";
            case 2: return "Plats";
            case 3: return "Desserts";
            case 4: return "Boissons";
        }
        return "";
    }

    public function afficherAllRecettes($type) {
        $vue = new AllRecettesVue();
        $vue->afficherTop();
        $vue->afficherRecette($type);
        $vue->afficherBasDePage();
    }

    public function getNoteUtilisateurs($id_recette) {
        return $this->recette->getRecetteUserNote($id_recette);//note attribué par les utilisateurs /5
    }


    public function getRecettesHealthy() {
        $recettes = $this->recette->getRecettes();
        $controller = new AdminController();
        $param_calories = $controller->getParamR(1);
        $max_calories = $param_calories[0]['valeur'];//parametre pour des 700
        $trouv_list = array();
        $ingred = new Ingredient();
        foreach ($recettes as $recette) {
            $healthy = true;
            $listIngred = $ingred->getRecetteIngreds($recette[0]);
            $caloriesRecette = $this->estimerCalories($recette[0])/$recette[6];
            $health_note = $this->estimerHealth($recette[0]);
            foreach ($listIngred as $item) {
                if($item[2]<3  or $caloriesRecette>$max_calories  or $health_note<4) {//si ingredient a une note santé <4 et alors la recette n'est pas healthy
                    $healthy = false;

                }
            }
            if ($healthy) {
                $trouv_list[] = $recette;
            }
        }
        return $trouv_list;
    }

    public function insertRecette($r_cat,$r_titre,$r_desc,$r_img,$r_valid,$r_portion,$r_temps,$r_saison) {
        return $this->recette->insertRecette($r_cat,$r_titre,$r_desc,$r_img,$r_valid,$r_portion,$r_temps,$r_saison);
    }

    public function afficherInsertRecettePage() {
        $vue =  new InsertRecette();
        $vue->afficherTop();
        $vue->afficherFormRecette();
        $vue->afficherIngredInsertMenu();
        $vue->insertEtapesMenu();
        $vue->afficherBottom();
    }

    public function afficherInsertRecettePageAdmin(){
        $vue =  new InsertRecette();
        $vue->afficherTopAdmin();
        $vue->afficherFormRecette();
        $vue->afficherIngredInsertMenu();
        $vue->insertEtapesMenu();
        $vue->afficherBottom();
    }

    public function insertEtapes($num_etape,$decription_etape,$id_recette) {
        $this->recette->insertEtape($num_etape,$decription_etape,$id_recette);
    }
    public function authRequired() {
        $vue =  new InsertRecette();
        $vue->authRequired();
    }

    public function bannedUser() {
        $vue =  new InsertRecette();
        $vue->bannedUser();
    }

    public function insertUserRecette($user_id,$recette_id) {
        $user_model= new User();
        $user = $user_model->getUserbyId($user_id);
        $recette_ajoute = $this->recette->getRecetteById($recette_id);
        if(count($user)>0 and count($recette_ajoute)>0) {
            $this->recette->insertUserRecette($user_id,$recette_id);
        }
    }


    public function getRecetteDeSaison($saison) {//les recettes qui continnent que les ingrédient de saison
        return $this->recette->getRecetteSaison($saison);
    }

    public function afficherPageSaison($recettes,$saison) {
        $vue = new AllRecettesVue();
        $vue->afficherTop();
        $vue->afficherSaison($recettes,$saison);
        $vue->afficherBasDePage();
    }


    public function getMyRecette($id_user) {
        return $this->recette->getMyRecette($id_user);
    }
}