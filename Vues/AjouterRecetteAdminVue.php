<?php

class AjouterRecetteAdminVue
{
    public function afficherTop() {
        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../CSS/Admin.css" rel="stylesheet" type="text/css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
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
            <a href="#">
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
    <div class="tabContainer2">';
    }

    public function afficherFormRecette() {
        $recette_id = -1;
        $afficher= false;
        echo '<form  action="http://localhost/project/Routers/InsertRecetteRoute.php" id="InsertRecetteForm" method="post" enctype="multipart/form-data" >
        <input type="text" id="inputTitreR" name="inputTitreR" class="form-control" placeholder="Titre de la recette" required/>
        <select class="form-select-lg" id="selectCatR" name="selectCatR" style="font-size: 16px" required>
            <option value="1">Entrée</option>
            <option value="2">Plat</option>
            <option value="3">Dessert</option>
            <option value="4">Boisson</option>
        </select>
        <input type="text" id="inputDescriptionR" name="inputDescriptionR" class="form-control" placeholder="Description de la recette" required/>
        <input type="number" id="inputPortionR" name="inputPortionR"  class="form-control" placeholder="Portion">
        <input type="number" id="inputTempsR" name="inputTempsR" class="form-control" placeholder="Temps de préparation" required/>
        <select class="form-select-lg" id="selectSaisonR" name="selectSaisonR" style="font-size: 16px" required>
            <option value="1">Hiver</option>
            <option value="2">Printemps</option>
            <option value="3">Eté</option>
            <option value="4">Automne</option>
        </select>
        Image de recette : <input class="form-control" type="file" id="formImageUpload" name="formImageUpload" required/>
        <button name="submitR" class="btn btn-primary" type="submit" value="send" id="insertRBtn"  style="background-color:#FF8243;border: none" >Valider</button>
    </form>
    <p id="resultText"></p>';

        if(isset($_POST['selectCatR'])) {


            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            $filename = $_FILES["formImageUpload"]["name"];
            $tempname = $_FILES["formImageUpload"]["tmp_name"];
            $folder = "assets\Recettes\\".$filename;
            $targetFilePath = 'uploads/'.$filename;
            $allowTypes = array('jpg','png','jpeg');
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)) {
                try {
                    move_uploaded_file($tempname,'uploads/'.$filename);
                    $img_link = "http://localhost/project/Routers/uploads/".$filename;
                    $controller = new RecetteController();
                    $result = $controller->insertRecette($_POST['selectCatR'],$_POST['inputTitreR'],$_POST['inputDescriptionR'],
                        $img_link,0,$_POST['inputPortionR'],$_POST['inputTempsR'],$_POST['selectSaisonR']);
                    if($result != -1) {
                        $controller->insertUserRecette($_SESSION['user_id'],$result);
                        echo '<div id="resultDiv" data-result ="200" data-recette-id="'.$result.'"></div>';
                    }
                    else {
                        echo '<script>alert("Erreur")</script>
<div id="resultDiv" data-result ="201"></div>';
                    }
                    $_POST['submitR'] =null;
                }
                catch (Exception  $e) {
                    echo '<script>alert("Erreur")</script><div  id="resultDiv" data-result ="201"></div>';
                }
            }
            else {
                echo '</script><div id="resultDiv" data-result ="202"></div>';
            }
        }
    }
}