<?php
require_once ('../Controllers/AdminController.php');
class Gestion_recetteVue
{
    public function afficherEntete() {
        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../CSS/Admin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <div class="tabContainer2">
    <a href="http://localhost/project/Routers/InsertRecetteRoute.php"  id="AjouterRecette" type="button" class="btn btn-danger" style="background-color: #dc6d03">Ajouter une recette</a>
    <h2 style="margin-top: 20px">Liste des recettes</h2>';
    }

    public function afficherEnteteTableau() {
        $controller = new AdminController();
        $entete = $controller->getColumns('recette');
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
        echo '</tr>
            </thead>';
    }

    public function afficherEnteteTableau2() {
        $controller = new AdminController();
        $entete = $controller->getColumns('recette');
        echo '<h2 style="margin-top: 20px">Liste des recettes utilisateurs</h2> <div class="ListContainer">
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
        echo '<th>Ajoutée par</th>';
        echo '</tr>
            </thead>';
    }


    public function afficherListeRecette() {
        $controller = new AdminController(); //controller
        $recette_list = $controller->getRecettes();
        $entete = $controller->getColumns("recette");

        //afficher l'entete de la table
        $this->afficherEnteteTableau();
        echo '<tbody>';
        foreach ($recette_list as $recette) {
            echo '<tr id="'.$recette[$entete[0][0]].'">';
            echo '<td>
              <div class="custom-control custom-checkbox">
                  <input onclick="checkRecette()" type="checkbox" class="custom-control-input RecetteCheck" id="RecetteCheck'.$recette[$entete[0][0]].'">
                  <label class="custom-control-label" for="RecetteCheck'.$recette[$entete[0][0]].'"></label>
              </div>
            </td>';
            foreach ($entete as $item) {
                echo '<td style="max-width: 300px; max-height: 100px;  overflow-y: auto; overflow-x: auto;">'.$recette[$item[0]].'</td>';
            }
            //ajouter bouton de suppression et de modification
            echo '<td>
              <button type="button" class="btn btn-danger recetteD">Supprimer</button>
            </td>';
            echo '<td>
              <button type="button" class="btn btn-primary recetteE">Modifier</button>
            </td>';
            echo '</tr>';

        }
        echo '</tbody>
        </table></div><button id="DeleteListR" type="button" class="btn btn-danger" style="display: none;margin-top:10px;">Supprimer</button>';
    }


    public function afficherRecetteUser() {
        $controller = new AdminController(); //controller
        $recette_list = $controller->getRecetteUser();
        $entete = $controller->getColumns("recette");

        //afficher l'entete de la table
        $this->afficherEnteteTableau2();
        echo '<tbody>';
        foreach ($recette_list as $recette) {
            echo '<tr id="'.$recette['id_Recette'].'">';
            echo '<td>
              <div class="custom-control custom-checkbox">
                  <input onclick="checkRecette()" type="checkbox" class="custom-control-input RecetteCheck" id="RecetteCheck'.$recette[$entete[0][0]].'">
                  <label class="custom-control-label" for="userCheck'.$recette['id_Recette'].'"></label>
              </div>
            </td>';
            foreach ($entete as $item) {
                echo '<td style="max-width: 300px; max-height: 100px;  overflow-y: auto; overflow-x: auto;">'.$recette[$item[0]].'</td>';
            }
            //ajouter bouton de suppression et de modification
            echo '<td>
              <button type="button" class="btn btn-danger recetteD">Supprimer</button>
            </td>';
            echo '<td>
              <button type="button" class="btn btn-primary recetteE">Modifier</button>
            </td>';
            echo '<td>
              <button type="button" class="btn btn-primary recetteUV" style="background-color: #2bc461">Valider</button>
            </td>';
            echo '<td>
              <a id="user'.$recette['id_user'].'">'.$recette['id_user'].'</a>
            </td>';

            echo '</tr>';

        }
        echo '</tbody>
        </table></div>';
    }


    public function afficherBasdePage() {
        echo '</div>


<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="../JS/Admin.js"></script>
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

</body>
</html>';
    }
}