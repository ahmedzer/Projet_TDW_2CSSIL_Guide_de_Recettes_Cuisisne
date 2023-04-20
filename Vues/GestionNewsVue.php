<?php
require_once ('../Controllers/AdminController.php');
class GestionNewsVue
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
    <h2 style="margin-top: 20px">Liste des news</h2>
    ';
    }


    public function afficherEnteteTableau() {
        $controller = new AdminController();
        $entete = $controller->getColumns('news');
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


    public function afficherNewsTable() {
        $controller = new AdminController(); //controller
        $news_list = $controller->getNews();
        $entete = $controller->getColumns("news");

        $this->afficherEnteteTableau();
        echo '<tbody>';
        foreach ($news_list as $news) {
            echo '<tr id="'.$news[$entete[0][0]].'">';
            echo '<td>
              <div class="custom-control custom-checkbox">
                  <input onclick="" type="checkbox" class="custom-control-input RecetteCheck" id="NewsCheck'.$news[$entete[0][0]].'">
                  <label class="custom-control-label" for="NewsCheck'.$news[$entete[0][0]].'"></label>
              </div>
            </td>';
            foreach ($entete as $item) {
                echo '<td style="max-width: 300px; max-height: 100px;  overflow-y: auto; overflow-x: auto;">'.$news[$item[0]].'</td>';
            }
            //ajouter bouton de suppression et de modification
            echo '<td>
              <button type="button" class="btn btn-danger NewsD">Supprimer</button>
            </td>';
            echo '<td>
              <button type="button" class="btn btn-primary NewsE">Modifier</button>
            </td>';
            echo '</tr>';

        }
        echo '</tbody>
        </table></div><button id="DeleteListNews" type="button" class="btn btn-danger" style="display: none;margin-top:10px;">Supprimer</button>';

    }


    public function insertNewsForm() {
        echo '<h4 style="margin-top: 50px">Insérer un nouvel article</h4>';
        echo '<form  action="http://localhost/project/Routers/Gestion_newsRoute.php" id="InsertNewsForm" method="post" enctype="multipart/form-data" >
        <input type="text" id="inputTitreNews" name="inputTitreNews" class="form-control" placeholder="Titre de news" required/>
       
        <input type="text" id="inputContenuNews" name="inputContenuNews" class="form-control" placeholder="Description de news" required/>
        <input type="text" id="linkNews" name="linkNews" class="form-control" placeholder="Lien du post" required/>
        <input type="number" id="numeroNews" name="numeroNews" class="form-control" placeholder="numéro de news" required/>
        <input type="text" id="linkExtern" name="linkExtern" class="form-control" placeholder="Lien externe" required/>
                Image news : <input class="form-control" type="file" id="formImageUpload" name="formImageUpload" required/>

        <button name="submitR" class="btn btn-primary" type="submit" value="send" id="insertRBtn"  style="background-color:#FF8243;border: none" >Valider</button>
    </form>';

        if(isset($_POST['submitR'])){
            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            $filename = $_FILES["formImageUpload"]["name"];
            $tempname = $_FILES["formImageUpload"]["tmp_name"];
            $folder = "assets\Recettes\\".$filename;
            $targetFilePath = 'uploads/newsImg/'.$filename;
            $allowTypes = array('jpg','png','jpeg','JPEG','PNG');
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)) {
                try {
                    move_uploaded_file($tempname,'uploads/newsImg/'.$filename);
                    $img_link = "http://localhost/project/Routers/uploads/newsImg/".$filename;
                    $controller = new AdminController();
                    $result =-1;
                    $result = $controller->insertNews($_POST['inputTitreNews'],$_POST['inputContenuNews']
                        ,$img_link,$_POST['linkNews'],$_POST['numeroNews'],$_POST['linkExtern']);
                    if($result>0) {
                        echo '<script>alert("Insertion avec succès"); </script><div  id="resultDiv" data-result ="200"></div>';
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                }
                catch (Exception  $e) {
                    echo '<script>alert("Erreur")</script><div  id="resultDiv" data-result ="201"></div>';
                }
            }
        }
    }


    public function afficherBas() {
        echo '</div></div>
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../JS/Gestion_news.js"></script>
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</body>
</html>';
    }
}