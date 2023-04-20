<?php
require_once ('../Models/User.php');
require_once ('../Vues/Login_Vue.php');
require_once ('../Vues/SignInVue.php');
class UserController
{


    private $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function checkUser($email) {
        return $this->user->checkUser($email);
    }

    public  function insertUser($user_name,$user_email,$user_phone,$birth_date,$user_valid,$password) {

        $result = $this->user->insertUser($user_name,$user_email,$user_phone,$birth_date,1,$password);
        return $result;
    }

    public function userLogin($email,$pass) {
        return $this->user->Login($email,$pass);
    }

    public function log_user() {
        if(isset($_POST['email_log']) and isset($_POST['psw_log']) ){
            if($this->checkUser($_POST['email_log'])==1) {
                $user = $this->user->getUser($_POST['email_log'],$_POST['psw_log']);

                if($user){
                    $this->user->login($_POST['email_log'],$_POST['psw_log']);
                    return 200;
                }
                else {
                      return 201;
                }
            }
            else {
                return 202;
            }
        }
        return 201;
    }

    public function afficherLoginPage() {
        $loginVue = new Login_Vue();
        $loginVue->afficherPage();
    }



    public function afficherRegisterPage() {
        $sign_page = new SignInVue();
        $sign_page->afficherPage();
    }

    public function register() {
        if(isset($_POST['uname']) and isset($_POST['email']) and  isset($_POST['phone']) and isset($_POST['psw']) and isset($_POST['psw_confirm']) and isset($_POST['date'])){
            if($this->user->checkUser($_POST['email'])) {
                return 203;
            }
            else {
                    //inserer l'utilisateur dans la bdd avec user_valid=0
                    return  $this->user->insertUser($_POST['uname'],$_POST['email'],$_POST['phone'],$_POST['date'],1,$_POST['psw']);
            }
        }
        return 203;
    }

    public function checkFavorites($id_recette,$id_user) {
        return $this->user->checkFav($id_recette,$id_user);
    }


    public function ajouterFav($id_recette,$id_user) {
        $this->user->insertToFavorite($id_recette,$id_user);
    }

    public function retireFav($id_recette,$id_user) {
        $this->user->retirerFavorite($id_recette,$id_user);
    }

    public function checkUserValid($id_user){
        return $this->user->checkUserValid($id_user);
    }

    public function getRecetteFav($id_user) {
        return $this->user->getFovoriteRecette($id_user);
    }

    public function getUserName($id_user){
        return $this->user->getUserName($id_user);
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}
