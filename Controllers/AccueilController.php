<?php
require_once ('../Models/Recette.php');
require_once ('../Models/Diapo.php');
require_once ('../Vues/AccueilVue.php');
class AccueilController
{

    private $recette;
    private $diapo;
    public function __construct()
    {
        $this->recette = new Recette();
        $this->diapo = new Diapo();
    }

    public function getRecetteByCategory($category) {//Entrées, plats , desserts, boissons
        $result = $this->recette->getRecetteByType($category);
        return $result;
    }

    public function getDiaporama(){ //recuperer les diapo de la bdd
        $result = $this->diapo->getDiaporama();
        return $result;
    }


    public function afficherAccueilPage($uname,$uid) {
        $accueilVue = new AccueilVue();
        $accueilVue->afficherEntete();
        $accueilVue->afficherNavBar();
        $accueilVue->afficherDiapo();
        $accueilVue->afficherMenu($uname,$uid);
        $accueilVue->afficherEntrees();
        $accueilVue->afficherPlats();
        $accueilVue->afficherDessert();
        $accueilVue->afficherBoissons();
        $accueilVue->afficherNews();
        $accueilVue->afficherFin();
    }

    public function getNews() {
        return $this->diapo->getNews();
    }

    public function getNewsById($id_news) {
        return $this->diapo->getNewsById($id_news);
    }

    public function getArticles($id_news) {
        return $this->diapo->getArticles($id_news);
    }


    /**
     * @return Recette
     */
    public function getRecette()
    {
        return $this->recette;
    }

    /**
     * @param Recette $recette
     */
    public function setRecette($recette)
    {
        $this->recette = $recette;
    }

    /**
     * @return Diapo
     */
    public function getDiapo()
    {
        return $this->diapo;
    }

    /**
     * @param Diapo $diapo
     */
    public function setDiapo($diapo)
    {
        $this->diapo = $diapo;
    }
}