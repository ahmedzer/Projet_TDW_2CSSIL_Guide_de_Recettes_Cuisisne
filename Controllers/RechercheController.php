<?php
require_once ('../Models/Admin.php');
require_once ('../Vues/RechercheUserVue.php');

class RechercheController
{
    private $admin;
    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function filterByName($users,$str_name) {

        for ($x = 0; $x < count($users); $x++) {
            if(!strlen(strstr($users[$x]['user_name'],$str_name))>0) {
                $users[$x] = null;
            }
        }
        return $users;
    }

    public function filterByEmail($users,$str_email) {
        for ($x = 0; $x < count($users); $x++) {
            if(!strlen(strstr(strval($users[$x]['user_email']),$str_email))>0) {
                $users[$x] = null;
            }
        }
        return $users;
    }

    public function filterByDate($users,$str_date) {
        for ($x = 0; $x < count($users); $x++) {
            if(!strlen(strstr($users[$x]['birth_date'],$str_date))>0) {
                $users[$x] = null;
            }
        }
        return $users;
    }
    public function filterByPhone($users,$str_phone){
        for ($x = 0; $x < count($users); $x++) {
            if(!strlen(strstr($users[$x]['user_phone'],$str_phone))>0) {
                    $users[$x] = null;
            }
        }
        return $users;
    }

    public function filterByUserSearch($users,$search_str) {
        for ($x = 0; $x < count($users); $x++) {
            if(!(strlen(strstr($users[$x]['user_phone'],$search_str))>0)
                and !(strlen(strstr($users[$x]['birth_date'],$search_str))>0)
                and !(strlen(strstr($users[$x]['user_email'],$search_str))>0)
                and !(strlen(strstr($users[$x]['user_name'],$search_str))>0)) {
                $users[$x] = null;
            }
        }
        return $users;
    }

    public function afficherPageRecherche($data_result) {
        $vue = new RechercheUserVue();
        $vue->afficherTopPage();
        $vue->afficherPage($data_result);
        $vue->afficherBas();
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
}