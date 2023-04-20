<?php
require_once ('../Models/Ingredient.php');
require_once ('../Vues/NutritionVue.php');
class IngredientsController
{

    private $ingredient;
    public function __construct()
    {
        $this->ingredient = new Ingredient();
    }

    public function getIngredients() {

        $result = $this->ingredient->getIngredients();
        return $result;
    }

    public function getIngredientById($id) {
        $result = $this->ingredient->getIngredientById($id);
        return $result;
    }

    public function getRecetteIngreds($id_recette) {
        $result = $this->ingredient->getRecetteIngreds($id_recette);
        return $result;
    }

    public function insertIngred($id_ingred,$quantite_gramme,$quantite_text,$id_recette) {
        $this->ingredient->insertIngred($id_ingred,$quantite_gramme,$quantite_text,$id_recette);
    }

    public function afficherNutrition() {
        $vue = new NutritionVue();
        $vue->afficherTop();
        $vue->afficherIngredient();
        $vue->afficherFin();
    }

    /**
     * @return Ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * @param Ingredient $ingredient
     */
    public function setIngredient($ingredient)
    {
        $this->ingredient = $ingredient;
    }
}