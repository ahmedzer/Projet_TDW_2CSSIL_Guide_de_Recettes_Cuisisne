<?php
require_once ('../Controllers/AdminController.php');
class Admin_Principal_Vue
{
    public function afficherPage() {
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
        <li style="position: fixed; bottom: 30px;">
            <!--The HTML li element is used to represent an item in a list. ... In menus and unordered lists-->
            <!--the a tag defines a hyperlink, which is used to link from one page to another-->
            <a href="#">
                <!-- this anchor text for link your home to another page -->
                <div class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i><!-- this is home icon link get form fornt-awesome icon for home button -->
                    <i class="fa fa-user" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
                </div>
                <div class="name"><span data-text="'.$_SESSION['admin_email'].'">'.$_SESSION['admin_name'].'</span></div>
                <!-- we are create first menu item name home -->
            </a>
        </li>
    </ul>
    <div class="tabContainer2">
       <div class="Gestion_Links">
           <a class="Gestion_Link" href="http://localhost/project/Routers/Gestion_user_route.php">
               <p style="font-size: 18px;margin-top: 2%;color: #6c6c6c">Gestion des utilisateurs</p>
               <img src="../assets/Admin/imgs/gestion_user.png">
           </a>
           <a class="Gestion_Link" href="http://localhost/project/Routers/Gestion_RecetteRoute.php">
               <p style="font-size: 18px;margin-top: 2%;color: #6c6c6c">Gestion des recettes</p>
               <img src="../assets/Admin/imgs/book.png">
           </a>
           <a class="Gestion_Link" href="http://localhost/project/Routers/Gestion_newsRoute.php">
               <p style="font-size: 18px;margin-top: 2%;color: #6c6c6c">Gestion des News</p>
               <img src="../assets/Admin/imgs/newspaper.png">
           </a>
           <a class="Gestion_Link" href="http://localhost/project/Routers/Gestion_nutrition_Route.php">
               <p style="font-size: 18px;margin-top: 2%;color: #6c6c6c">Gestion de la nutrition</p>
               <img src="../assets/Admin/imgs/schedule.png">
           </a>
           <a class="Gestion_Link" href="http://localhost/project/Routers/GestionParamRoute.php">
               <p style="font-size: 18px;margin-top: 2%;color: #6c6c6c">Paramètre de site</p>
               <img src="../assets/Admin/imgs/admin-panel.png">
           </a>

       </div>
    </div>
</div>


<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="../JS/Admin.js"></script>
</body>
</html>';
    }
}