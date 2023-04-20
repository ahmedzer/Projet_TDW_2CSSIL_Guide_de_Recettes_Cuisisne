<?php
require_once ('../Models/Admin.php');
require_once ('../Models/Recette.php');
require_once ('../Models/Ingredient.php');
require_once ('../Models/Diapo.php');
require_once ('../Models/User.php');
require_once ('../Vues/Gestion_user_vue.php');
require_once ('../Vues/Gestion_recetteVue.php');


class AdminController
{
    private $admin;
    private $recette;
    private $ingred;
    private $param;
    private $user;
    public function __construct()
    {
        $this->admin = new Admin();
        $this->recette = new Recette();
        $this->ingred = new Ingredient();
        $this->param = new Diapo();
        $this->user = new User();
    }
    public function getRecettes() {
        return $this->admin->getRecettes();
    }
    public function getIngreds() {
        $this->ingred->getIngredients();
    }
    public function getUsers() {
        return $this->admin->getUsers();
    }
    public function getParams() {
        return $this->param->getDiaporama();
    }
    public function getRecetteValid() {
        return $this->recette->getValidRecette();
    }

    public function getRecetteInvalid() {
        return $this->recette->getRecetteNonValid();
    }

    public function getPageAdmin($email,$pass) {
        return $this->admin->getAdmin($email,$pass);
    }

    public function adminLogin($email,$pass) {
        return $this->admin->adminLogin($email,$pass);
    }

    public function getUsersValid() {
        return $this->user->getUserValid();
    }

    public function getUsersNonValid() {
        return $this->user->getUserNonValid();
    }

    public function getColumns($tableName) {
        return $this->admin->tableColumns($tableName);
    }

    public function getTable($tableName) {
        return $this->admin->getTable($tableName);
    }

    public function getValidUsers() {
        return $this->admin->getValidUsers();
    }

    public function getInvalidUsers() {
        return $this->admin->getInvalidUsers();
    }



    //********************************* afficher les pages de gesion ***************************/
    public function afficherGestion_user_page() {
        $v = new Gestion_user_vue();
        $v->afficherTop();
        $v->afficherTable();
        $v->afficherValidUsers();
        $v->afficherInvalidUsers();
        $v->afficherBas();
    }


    public function updateUser($user_id,$user_name,$user_email,$user_phone,$birth_date,$user_valid,$password) {
        return $this->user->updateUser($user_id,$user_name,$user_email,$user_phone,$birth_date,$user_valid,$password);
    }

    public function deleteUser($u_id) {
        return $this->user->deleteUser($u_id);
    }

    public function validerUser($u_id){
        return $this->admin->validerUser($u_id);
    }

    public function afficherPageGestion_recette() {
        $vue = new Gestion_recetteVue();
        $vue->afficherEntete();
        $vue->afficherListeRecette();
        $vue->afficherRecetteUser();
        $vue->afficherBasdePage();
    }

    public function deleteNews($id_news) {
        $this->admin->deleteNews($id_news);
    }

    public function getNews() {
        return $this->admin->getNews();
    }


    public function deleteRecette($recette_id){
        return $this->recette->deleteRecette($recette_id);
    }

    public function modifierRecette($r_id,$r_cat,$r_titre,$r_desc,$r_img,$r_valid,$r_portion,$r_temps) {
        $this->recette->modifierRecette($r_id,$r_cat,$r_titre,$r_desc,$r_img,$r_valid,$r_portion,$r_temps);
    }


    public function getRecetteUser() {
        return $this->recette->getRecettesUser();
    }


    public function bannirUser($user_id) {
        return $this->admin->bannirUser($user_id);
    }


    public function editNews($id_news,$titre_news,$contenu_news,$link_image,$link_post,$num,$extern_link) {
        return $this->admin->editNews($id_news,$titre_news,$contenu_news,$link_image,$link_post,$num,$extern_link);
    }

    public function insertNews($titre_news,$contenu_news,$link_image,$link_post,$num,$extern_link) {
        return $this->admin->insertNews($titre_news,$contenu_news,$link_image,$link_post,$num,$extern_link);
    }

    public function getNewsById($id_news){
        return $this->admin->getNewsById($id_news);
    }

    public function getIngredients() {
        return $this->admin->getIngreds();
    }

    public function deleteIngred($id_ingred) {//supprimer un ingrédient
        $this->admin->deleteIngred($id_ingred);
    }


    //mettre a jour un ingrédient
    public function updateIngred($id_ingred,
                                 $nom_ingred,
                                 $health_note_ingred,
                                 $cout_ingred,
                                 $saison_i,
                                 $calories,
                                 $proteines,
                                 $glucides,
                                 $lipides,
                                 $eau,
                                 $fibres,
                                 $vitamines,
                                 $description_ingred,
                                 $image_ingred,
                                 $type_ingred) {

        return $this->admin->editIngred($id_ingred,
            $nom_ingred,
            $health_note_ingred,
            $cout_ingred,
            $saison_i,
            $calories,
            $proteines,
            $glucides,
            $lipides,
            $eau,
            $fibres,
            $vitamines,
            $description_ingred,
            $image_ingred,
            $type_ingred);

    }


    public function insertIngred(
                                 $nom_ingred,
                                 $health_note_ingred,
                                 $cout_ingred,
                                 $saison_i,
                                 $calories,
                                 $proteines,
                                 $glucides,
                                 $lipides,
                                 $eau,
                                 $fibres,
                                 $vitamines,
                                 $description_ingred,
                                 $image_ingred,
                                 $type_ingred) {

        return $this->admin->insertIngred(
            $nom_ingred,
            $health_note_ingred,
            $cout_ingred,
            $saison_i,
            $calories,
            $proteines,
            $glucides,
            $lipides,
            $eau,
            $fibres,
            $vitamines,
            $description_ingred,
            $image_ingred,
            $type_ingred);
    }



    public function getDiapos() {
        return $this->admin->getDiapos();
    }
    public function deleteDiapo($id_diap) {
        $this->admin->deleteDiapo($id_diap);
    }

    public function editDiapo($id_diapo, $titre_diapo, $description_diapo, $image_diapo, $lien_diapo) {
        return $this->admin->editDiapo($id_diapo, $titre_diapo, $description_diapo, $image_diapo, $lien_diapo);
    }

    public function getParamsRecherche() {
        return $this->admin->getParamRecherche();
    }

    public function updateParam($id_param,$titre_param,$valeur){
        $this->admin->updateParam($id_param,$titre_param,$valeur);
    }

    public function getParamR($id_param) {
        return $this->admin->getParam($id_param);
    }


    public function insertDiapo( $titre_diapo, $description_diapo, $image_diapo, $lien_diapo){
        return $this->admin->insertDiapo( $titre_diapo, $description_diapo, $image_diapo, $lien_diapo);
    }
     /**
     * @return Admin
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param Admin $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    /**
     * @return Ingredient
     */
    public function getIngred()
    {
        return $this->ingred;
    }

    /**
     * @param Ingredient $ingred
     */
    public function setIngred($ingred)
    {
        $this->ingred = $ingred;
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
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @param Diapo $param
     */
    public function setParam($param)
    {
        $this->param = $param;
    }/**
 * @return User
 */public function getUser()
{
    return $this->user;
}/**
 * @param User $user
 */public function setUser($user)
{
    $this->user = $user;
}
}