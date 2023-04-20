<?php
require_once ('../Controllers/AdminController.php');
class Gestion_user_vue
{
    public function afficherTop() {
        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../CSS/Admin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Title</title>
</head>
<body>
<div style="width: 100%; height: 100%" class="container1">
    <ul class="leftMenu" id="menu">
        <!--starting ul tag to create unordered lists.-->
        <li>
            <!--The HTML li element is used to represent an item in a list. ... In menus and unordered lists-->
            <!--the a tag defines a hyperlink, which is used to link from one page to another-->
            <a href="http://localhost/project/Routers/Admin_Principal_PageRoute.php">
                <!-- this anchor text for link your home to another page -->
                <div class="icon">
                    <i class="fa fa-home" aria-hidden="true"></i><!-- this is home icon link get form fornt-awesome icon for home button -->
                    <i class="fa fa-home" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
                </div>
                <div class="name"><span data-text="Accueil">Accueil</span></div>
                <!-- we are create first menu item name home -->
            </a>
        </li>
        <li>
            <!--The HTML li element is used to represent an item in a list. ... In menus and unordered lists-->
            <!--the a tag defines a hyperlink, which is used to link from one page to another-->
            <a href="#">
                <!-- this anchor text for link your home to another page -->
                <div class="icon">
                    <i class="fa fa-cogs" aria-hidden="true"></i><!-- this is home icon link get form fornt-awesome icon for home button -->
                    <i class="fa fa-cogs" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
                </div>
                <div class="name"><span data-text="Paramètres">Paramètres</span></div>
                <!-- we are create first menu item name home -->
            </a>
        </li>
        <li>
            <!--The HTML li element is used to represent an item in a list. ... In menus and unordered lists-->
            <!--the a tag defines a hyperlink, which is used to link from one page to another-->
            <a href="#">
                <!-- this anchor text for link your home to another page -->
                <div class="icon">
                    <i class="fa fa-sign-out" aria-hidden="true"></i><!-- this is home icon link get form fornt-awesome icon for home button -->
                    <i class="fa fa-sign-out" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
                </div>
                <div class="name"><span data-text="Se déconnecter">Se déconnecter</span></div>
                <!-- we are create first menu item name home -->
            </a>
        </li>
    </ul> 
    <div class="tabContainer" style="width: 92%">
    <div class="input-group ps-5" style="padding-left: 20%;margin-bottom: 2%">
          <div id="navbar-search-autocomplete" class="form-outline">
            <input  type="search" id="searchBar" class="form-control" placeholder="Rechercher"/>
          </div>
          <button type="button" class="btn btn-outline-primary" onclick="search()">
            <i class="fas fa-search"></i>
          </button>
          <button type="button" class="btn btn-outline-primary" style="margin-left: 1%" id="filterBut" onclick="filter()">
            <i class="fas fa-filter"></i>
          </button>
        </div>
        <div class="filterSearch" id="filterSearch">
            <input type="search" id="filterName" class="form-control" placeholder="Nom dutilisateur"/>
            <input type="search" id="filteremail" class="form-control" placeholder="Email"/>
            <input type="date" id="filterBirthDate" class="form-control" placeholder="Date de naissance"/>
            <input type="search" id="filterPhone" class="form-control" placeholder="Numéro de téléphone"/>
        </div>
    <h2 style="margin-top: 20px">Liste des utilisateurs</h2>
    ';
    }

    public function afficherTableEntete() {
        $controller = new AdminController(); //controller
        $entete = $controller->getColumns("user");//recupere l'entete de la table user
        echo '<div class="ListContainer">
        <table id="dtHorizontalExample" class="table table-striped table-bordered " cellspacing="0"
               width="80%">
            <thead class="thead-dark">
            <tr>';
        echo '<th>Selectionner</th>';
        foreach ($entete as $item) {
            echo '<th>'.$item[0].'<i class="fa fa-fw fa-sort"></th>';
        }
        echo '<th></th>';
        echo '<th></th>';
        echo '<th>Profil utilisateur</th>';
        echo '</tr>
            </thead>';
    }

    public function afficherTableEntete2() {

        $controller = new AdminController(); //controller
        $entete = $controller->getColumns("user");//recupere l'entete de la table user
        echo '<div class="ListContainer">
        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
               width="80%">
            <thead class="thead-dark">
            <tr>';
        echo '<th>Selectionner</th>';
        foreach ($entete as $item) {
            echo '<th>'.$item[0].'</th>';
        }
        echo '<th></th>';
        echo '<th></th>';
        echo '<th></th>';
        echo '</tr>
            </thead>';
    }



    public function afficherTable() {

        //user list
        $controller = new AdminController(); //controller
        $users_list = $controller->getUsers();
        $entete = $controller->getColumns("user");

        //afficher l'entete de la table
        $this->afficherTableEntete();
        echo '<tbody>';
        foreach ($users_list as $user) {
            echo '<tr id="'.$user[$entete[0][0]].'">';
            echo '<td>
              <div class="custom-control custom-checkbox">
                  <input onclick="check()" type="checkbox" class="custom-control-input userCheck" id="userCheck'.$user[$entete[0][0]].'">
                  <label class="custom-control-label" for="userCheck'.$user[$entete[0][0]].'"></label>
              </div>
            </td>';
            foreach ($entete as $item) {
                echo '<td>'.$user[$item[0]].'</td>';
            }
            echo '<td>
              <button type="button" class="btn btn-danger userD">Supprimer</button>
            </td>';
            echo '<td>
              <button type="button" class="btn btn-primary userE">Modifier</button>
            </td>';
            echo '<td>
              <a type="button" href="http://localhost/project/Routers/UserProfileRoute.php?userId='.$user[$entete[0][0]].'">Profile</a>
            </td>';
            echo '</tr>';
        }
        $total = count($users_list);
        echo '</tbody>
        </table></div>
        <button type="button" class="btn btn-danger" id="deleteUserBut" style="display: none;margin-bottom: 20px;" onclick="deleteUserList()">Supprimer</button><p>Total : '.$total.' utilisateurs</p><h2>Liste des utilisateurs valides</h2>';
    }


    public function afficherValidUsers() {
        //user list
        $controller = new AdminController(); //controller
        $users_list = $controller->getValidUsers();
        $entete = $controller->getColumns("user");

        //afficher l'entete de la table
        $this->afficherTableEntete2();
        echo '<tbody>';
        foreach ($users_list as $user) {
            echo '<tr id="'.$user[$entete[0][0]].'">';
            echo '<td>
              <div class="custom-control custom-checkbox">
                  <input onclick="checkTab2()" type="checkbox" class="custom-control-input ValiduserCheck" id="ValiduserCheck'.$user[$entete[0][0]].'">
                  <label class="custom-control-label" for="ValiduserCheck'.$user[$entete[0][0]].'"></label>
              </div>
            </td>';
            foreach ($entete as $item) {
                echo '<td>'.$user[$item[0]].'</td>';
            }
            echo '<td>
              <button type="button" class="btn btn-danger userValidD">Supprimer</button>
            </td>';
            echo '<td>
              <button type="button" class="btn btn-primary userValidE">Modifier</button>
            </td>';
            echo '<td>
              <button type="button" class="btn btn-primary userBan" style="background-color: #dc6d03">Bannir</button>
            </td>';
            echo '</tr>';
        }
        $total = count($users_list);
        echo '</tbody>

        </table> </div> <button type="button" class="btn btn-danger" id="deleteValidUsersBut" style="display: none;margin-bottom: 20px;" onclick="deleteUserValidList()">Supprimer</button><p>Total : '.$total.' utilisateurs valides</p><h2>Liste des utilisateurs non valides</h2>';
    }

    public function afficherInvalidUsers() {
        $controller = new AdminController(); //controller
        $users_list = $controller->getInvalidUsers();
        $entete = $controller->getColumns("user"); //utilisateurs invalides

        if(count($users_list)>0) { ///si la liste n'est pas vide
            //afficher l'entete de la table
            $this->afficherTableEntete2();

            //afficher la table
            echo '<tbody>';
            foreach ($users_list as $user) {
                echo '<tr id="'.$user[$entete[0][0]].'">';
                echo '<td>
              <div class="custom-control custom-checkbox">
                  <input onclick="check3()" type="checkbox" class="custom-control-input IvaliduserCheck" id="IvaliduserCheck'.$user[$entete[0][0]].'">
                  <label class="custom-control-label" for="IvaliduserCheck'.$user[$entete[0][0]].'"></label>
              </div>
            </td>';
                foreach ($entete as $item) {
                    echo '<td>'.$user[$item[0]].'</td>';
                }
                echo '<td>
              <button type="button" class="btn btn-danger userInValidD">Supprimer</button>
            </td>';
                echo '<td>
              <button type="button" class="btn btn-primary userInValidE">Modifier</button>
            </td>';
                echo '<td>
              <button type="button" class="btn btn-primary userInValidV" style="background-color: #2bc461">Valider</button>
            </td>';

                echo '</tr>';
            }
            $total = count($users_list);
            echo '</tbody>
        </table></div> <button type="button" class="btn btn-danger" id="deleteInValidUsersBut" style="display: none;margin-bottom: 20px;" onclick="deleteUserInValidList()">Supprimer</button><p>Total : '.$total.' utilisateurs non valides</p>';
        }
        else {
            echo '<p>Tous les utilisateurs sont valides</p>';
        }

    }



    public function afficherBas() {
        echo '</div></div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../JS/Admin.js"></script>
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</body>
</html>';
    }







}