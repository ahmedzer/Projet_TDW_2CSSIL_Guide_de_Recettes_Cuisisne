<?php
require_once ('../Controllers/AdminController.php');
class GestionParametreVue
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
    <div class="tabContainer" style="overflow: hidden">
   
    <div class="tabContainer2" >
    <h2 style="margin-top: 20px">Liste des diaporamas</h2>
    ';
    }


    public function afficherEnteteTableauDiapo() {
        $controller = new AdminController();
        $entete = $controller->getColumns('diaporama');
        echo '<div class="ListContainer">
        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
               width="80%">
            <thead class="thead-dark">
            <tr>';

        foreach ($entete as $item) {
            echo '<th>'.$item[0].'</th>';
        }
        echo '<th></th>';
        echo '<th></th>';
        echo '</tr>
            </thead>';
    }

    public function afficherEnteteTableauParam() {
        $controller = new AdminController();
        $entete = $controller->getColumns('param_recherche');
        echo '<div class="ListContainer">
        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
               width="80%">
            <thead class="thead-dark">
            <tr>';
        foreach ($entete as $item) {
            echo '<th>'.$item[0].'</th>';
        }
        echo '<th></th>';
        echo '</tr>
            </thead>';
    }


    public function afficherDiapoTabel() {
        $controller = new AdminController(); //controller
        $diapo_list = $controller->getDiapos();
        $entete = $controller->getColumns("diaporama");

        $this->afficherEnteteTableauDiapo();
        echo '<tbody>';
        foreach ($diapo_list as $diapo) {
            echo '<tr id="'.$diapo[$entete[0][0]].'">';
            foreach ($entete as $item) {
                echo '<td style="max-width: 300px; max-height: 100px;  overflow-y: auto; overflow-x: auto;">'.$diapo[$item[0]].'</td>';
            }
            //ajouter bouton de suppression et de modification
            echo '<td>
              <button type="button" class="btn btn-danger diapoD">Supprimer</button>
            </td>';
            echo '<td>
              <button type="button" class="btn btn-primary diapoE">Modifier</button>
            </td>';
            echo '</tr>';

        }
        echo '</tbody>
        </table></div><h2 style="margin: 50px">Paramètres de recherche</h2>';
    }


    public function affichreParamSite() {
        $controller = new AdminController(); //controller
        $params_list = $controller->getParamsRecherche();
        $entete = $controller->getColumns("param_recherche");

        $this->afficherEnteteTableauParam();
        echo '<tbody>';
        foreach ($params_list as $param) {
            echo '<tr id="'.$param[$entete[0][0]].'">';

            foreach ($entete as $item) {
                echo '<td style="max-width: 300px; max-height: 100px;  overflow-y: auto; overflow-x: auto;">'.$param[$item[0]].'</td>';
            }
            //ajouter bouton de suppression et de modification
            echo '<td>
              <button type="button" class="btn btn-primary paramE">Modifier</button>
            </td>';
            echo '</tr>';
        }
        echo '</tbody>
        </table></div>';
    }


    public function insertDiapoForm()
    {
        echo '<h4 style="margin-top: 50px">Insérer Diaporama</h4>';
        echo '<form  action="http://localhost/project/Routers/GestionParamRoute.php" id="InsertDiapoForm" method="post" enctype="multipart/form-data" >
        <input type="text" id="inputTitreDiapo" name="inputTitreDiapo" class="form-control" placeholder="Titre de diporama" required/>
       
        <input type="text" id="inputdescDiapo" name="inputdescDiapo" class="form-control" placeholder="Description de diaporama" required/>
        <input type="text" id="linkDiapo" name="linkDiapo" class="form-control" placeholder="Lien" required/>
                Image news : <input class="form-control" type="file" id="formImageUpload" name="formImageUpload" required/>

        <button name="submitD" class="btn btn-primary" type="submit" value="send" id="insertRBtn"  style="background-color:#FF8243;border: none" >Valider</button>
    </form>';

        if (isset($_POST['submitD'])) {
            define('SITE_ROOT', realpath(dirname(__FILE__)));
            $filename = $_FILES["formImageUpload"]["name"];
            $tempname = $_FILES["formImageUpload"]["tmp_name"];
            $folder = "assets\Recettes\\" . $filename;
            $targetFilePath = 'uploads/diapo/' . $filename;
            $allowTypes = array('jpg', 'png', 'jpeg', 'JPEG', 'PNG');
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                try {
                    move_uploaded_file($tempname, 'uploads/diapo/' . $filename);
                    $img_link = "http://localhost/project/Routers/uploads/diapo/" . $filename;
                    $controller = new AdminController();
                    $result = -1;
                    $result = $controller->insertDiapo($_POST['inputTitreDiapo'], $_POST['inputdescDiapo']
                        , $img_link, $_POST['linkDiapo']);
                    if ($result > 0) {
                        echo '<script>alert("Insertion avec succès"); </script><div  id="resultDiv" data-result ="200"></div>';
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                } catch (Exception  $e) {
                    echo '<script>alert("Erreur")</script><div  id="resultDiv" data-result ="201"></div>';
                }
            }
            else {
                echo '<script>alert("Image avec un format invalide")</script><div  id="resultDiv" data-result ="201"></div>';
            }
        }
    }



    public function afficherBas() {
        echo '</div></div>
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../JS/Gestion_Param.js"></script>
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</body>
</html>';
    }
}