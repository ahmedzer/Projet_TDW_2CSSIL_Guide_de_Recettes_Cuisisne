<?php
require_once ('../Controllers/RecetteController.php');
require_once ('../Controllers/IngredientsController.php');
require_once ('../Controllers/UserController.php');

class RecetteVue
{


    /*afficher la tete du fichier */
    public function afficherTete() {
        echo ('<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../CSS/Recette.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Title</title>
</head>
<body>');
    }


    public function afficherMenu($couleur) {

        if(isset($_SESSION['user_id'])){ //si l'utilisateur est authentifier enlever se connecter du menu est la remplacer avec mon compte
            $connectionCheck = '<li id="AjouterRecette">
        <a href="http://localhost/project/Routers/InsertRecetteRoute.php">
            <div class="icon">
                <i class="fa fa-edit" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-edit" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Ajouter une recette">Ajouter une recette</span></div>
        </a>
    </li><li id="Login">
        <a href="#">
            <div class="icon">
                <i class="fa fa-user" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-user" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Mon compte">Mon compte</span></div>
        </a>
    </li>';
        }
        else {//si l'utilisateur n'est pas authetifié afficher dans le menu se connecter
            $connectionCheck = '<li id="Login">
        <a href="http://localhost/project/Routers/Register_route.php">
            <div class="icon">
                <i class="fa fa-sign-in" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-sign-in" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Se connecter">Se connecter</span></div>
        </a>
    </li>' ;
        }
        echo ('<ul class="MenuR" id="menu" style="height: 100px">
    <!--starting ul tag to create unordered lists.-->
    <li>
        <!--The HTML li element is used to represent an item in a list. ... In menus and unordered lists-->
        <!--the a tag defines a hyperlink, which is used to link from one page to another-->
        <a href="http://localhost/project/Routers/AccueilRoute.php">
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
        <a href="#">
            <!-- this anchor text for link your About page to another page -->
            <div class="icon">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i><!-- this is file icon link get form fornt-awesome icon for about -->
                <i class="fa fa-newspaper-o" aria-hidden="true"></i><!-- copy and paste the file icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="News">News</span></div>
            <!-- we are create second menu item name About -->
        </a>
    </li>
    <li>
        <a href="http://localhost/project/Routers/IdeeRecetteRoute.php">
            <!-- this anchor text for link your service page to another page -->
            <div class="icon">
                <i class="fa fa-pencil-square" aria-hidden="true"></i><!-- this is cogs icon link get form fornt-awesome iocn for service menu -->
                <i class="fa fa-pencil-square" aria-hidden="true"></i><!-- copy and paste the cogs icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Idées de recette">Idées de recette</span></div>
            <!--- we are create third menu item name services -->
        </a>
    </li>
    <li>
        <a href="http://localhost/project/Routers/AllRecettesRoute.php?healthy=1">
            <!-- this anchor text for link your portfolio page to another page -->
            <div class="icon">
                <i class="fa fa-heartbeat" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-heartbeat" aria-hidden="true"></i><!-- copy and paste the picture icon link here for hover effect -->
            </div>
            <div class="name" ><span data-text="Healthy">Healthy</span></div>
            <!-- we are create fourth menu item name portfolio -->
        </a>
    </li>
    <li>
        <a href="http://localhost/project/Routers/SaisonRoute.php">
            <!-- this anchor text for link your team page to another page -->
            <div class="icon">
                <i class="fa fa-snowflake-o" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-snowflake-o" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Saisons">Saisons</span></div>
        </a>
    </li>
    <li>
        <a href="http://localhost/project/Routers/FeteRoute.php">
            <!-- this anchor text for link your team page to another page -->
            <div class="icon">
                <i class="fa fa-smile-o" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-smile-o" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Fêtes">Fêtes</span></div>
        </a>
    </li>
    <li>
        <a href="http://localhost/project/Routers/NutritionRoute.php">
            <!-- this anchor text for link your team page to another page -->
            <div class="icon">
                <i class="fa fa-spoon" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-spoon" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Nutrition">Nutrition</span></div>
        </a>
    </li>
    <li>
        <a href="#">
            <!-- this anchor text for link your home to another page -->
            <div class="icon">
                <i class="fa fa-envelope" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-envelope" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Contact">Contact</span></div>
            <!-- we create first menu item name home -->
        </a>
    </li>
    '.$connectionCheck.'
</ul>');
    }


    public function afficherRecetteEntete($id_recette) {

        $recette_controller = new RecetteController();
        $recette = $recette_controller->getRecetteById($id_recette);
        $type = $recette_controller->getRecetteType($id_recette);
        $color ="#FF8243";
        if($type == "Entrée") {
            $color="#6da06f";
        }
        if($type=="Desserts") {
            $color = "#0da8bd";
        }
        if($type=="Boissons") {
            $color = "#0c5179";
        }
        echo '<center>
    <div class="RecetteContainer">
        <div class="RecetteImage">
            <img src="'.$recette[0][4].'"> <!--Image de la recette -->
        </div>
        <div class="RecetteText">
            <h2 style="color:'.$color.' " class="titreRecette">'.$recette[0][2].'</h2><!--Titre de la recette -->
            <p class="descriptionRecette"><!--Description de la recette -->
                '.$recette[0][3].'
            </p>
            <div class="infoRecette"><!--inofs de la recette temps, portion ,... -->
                <div class="info">
                    <div class="infoNom">Temps préparation</div>
                    <div class="infoIcone">
                        <img src="../assets/Recettes/Icones/clock.png">
                    </div>
                    <div class="infoValue"> '.$recette[0][7].' minutes</div>
                </div>
                <div class="divider"></div>
                <div class="info">
                    <div class="infoNom">Portion</div>
                    <div class="infoIcone">
                        <img src="../assets/Recettes/Icones/pie-chart.png">
                    </div>
                    <div class="infoValue">'.$recette[0][6].' personnes</div>
                </div>
                <div class="divider"></div>
                <div class="info">
                    <div class="infoNom">Cout de la recette</div>
                    <div class="infoIcone">
                        <img src="../assets/Recettes/Icones/label.png">
                    </div>
                    <div class="infoValue"> 5/5</div>
                </div>
                <div class="divider"></div>
                <div class="info">
                    <div class="infoNom">Note santé</div>
                    <div class="infoIcone">
                        <img src="../assets/Recettes/Icones/sante.png">
                    </div>
                    <div class="infoValue"> 3/5</div>
                </div>
            </div>
        </div>
    </div>
</center>
<br>
<br>
<br>
';
    }



    public function afficherIngredient($id_recette) {

        if(isset($_SESSION['user_id'])) {
            $user_controller= new UserController();

            $fav_state = $user_controller->checkFavorites($id_recette,$_SESSION['user_id']);
            if(count($fav_state)>0) {
                echo '<center
    <br><button value="'.$id_recette.'" class="btn btn-outline-danger" id="AddToFav" style="margin: 20px" onclick="">Retirer de mes favoris</button><br>';
            }
            else {
                echo '<center
    <br><button  value="'.$id_recette.'" class="btn btn-outline-danger" id="AddToFav" style="margin: 20px" onclick="">Ajouter a mes favoris</button><br>';
            }

        }

        if(isset($_POST['add_fav'],$_SESSION['user_id'])) {
            $user_controller = new UserController();
            if($_POST['add_fav']==1) {
                echo "yesssss";
                $user_controller->ajouterFav($id_recette,$_SESSION['user_id']);
            }
            else {
                $user_controller->retireFav($id_recette,$_SESSION['user_id']);
            }
        }

    echo '<div class="containerI" style="width: 100%">
        <div class="decor">
            <img src="../assets/Recettes/Icones/ingreds.png" >
            <h3 style="color: white; font-size: 2.5vw;">Ingédients</h3>
        </div>
        <div class="IngredContainer">';


        $ingred_controller = new IngredientsController();
        $list_ingred = $ingred_controller->getRecetteIngreds($id_recette);
        foreach ($list_ingred as $ingred) {
            if($ingred[18]!=null) {
                echo '<div class="ingredient">
                <div class="ingred_tete">
                    <img src="../assets/Ingred/type/'.$ingred[14].'.png">
                    <a href="http://localhost/project/Routers/IngredientsRoute.php?choix='.$ingred[0].'">'.$ingred[1].'</a>
                </div>
                <div class="ingred_quantite">
                    '.$ingred[18].'
                </div>
            </div>';
            }
        }

        foreach ($list_ingred as $ingred) {

            if($ingred[18]==null) {
                echo '<div class="ingredient" style="height: 30%;">
                <div class="ingred_tete" style="height: 99%;border-bottom: #FF8243">
                    <img src="../assets/Ingred/type/'.$ingred[14].'.png">
                    <a href="http://localhost/project/Routers/IngredientsRoute.php?choix='.$ingred[0].'">'.$ingred[1].'</a>
                </div>
                
                </div>';
            }
        }


        echo '</div>
    </div>
</center>';
    }



    public function afficherEtapes($id_recette) {
        echo '<!--Preparation --> <!-- **************************************************************-->
<div class="container2" style="background-color: white; margin-top: 50px">

    <div class="decor">
        <img src="../assets/Recettes/Icones/prepare.png" >
        <h3 style="color: #6c6c6c; font-size: 2.5vw;">Préparations</h3>
    </div>
    <div class="PrepContainer" style="background-color: white">';

        $recette_controller = new RecetteController();
        $etapes = $recette_controller->getRecetteEtapes($id_recette);
        foreach ($etapes as $e) {
            echo '<div class="Etape" >
            <div class="ingred_tete">
                <h1 style="margin: 2%; color: white">  '.$e[1].'</h1>
            </div>
            <div class="ingred_quantite" style="color: white">'.$e[2].'</div>
        </div>';
        }

        echo '</div>
</div>';

    }




    public function afficherFin() {
        echo '
<footer class=" text-center text-white" style="background-color:#2e2e2e;margin-top: 100px">
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="https://web.facebook.com/AhmedZrk.00" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="https://www.linkedin.com/in/ahmed-zerrouk/" role="button"><i class="fab fa-linkedin-in"></i></a>
      <!-- Github -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="https://github.com/ahmedzer" role="button"><i class="fab fa-github"></i></a>
    </section>
    <!-- Section: Social media -->



    <!-- Section: Text -->
    <section class="mb-4">
      <p>
        Notre site web MyRecipes est un catalogue pour les passionnés de la cuisine.
      </p>
    </section>
    <!-- Section: Text -->


    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Recettes</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="http://localhost/project/Routers/AllRecettesRoute.php?catR=1" class="text-white">Entrées</a>
            </li>
            <li>
              <a href="http://localhost/project/Routers/AllRecettesRoute.php?catR=2" class="text-white">Plats</a>
            </li>
            <li>
              <a href="http://localhost/project/Routers/AllRecettesRoute.php?catR=3" class="text-white">Desserts</a>
            </li>
            <li>
              <a href="http://localhost/project/Routers/AllRecettesRoute.php?catR=4" class="text-white">Boissons</a>
            </li>
            <li>
              <a href="http://localhost/project/Routers/SaisonRoute.php" class="text-white">Saisons</a>
            </li>
            <li>
              <a href="http://localhost/project/Routers/FeteRoute.php" class="text-white">Fetes</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Ingrédients et nutrtion</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="http://localhost/project/Routers/IdeeRecetteRoute.php" class="text-white">Idées recettes</a>
            </li>
            <li>
              <a href="http://localhost/project/Routers/NutritionRoute.php" class="text-white">Nutrition</a>
            </li>
            <li>
              <a href="http://localhost/project/Routers/AllRecettesRoute.php?healthy=1" class="text-white">Healthy</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">News et événements</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">News</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
         
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->

  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2023 Copyright:
    <a class="text-white" href="">MyRecipes</a>
  </div>
  <!-- Copyright -->

</footer>
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="../JS/Recette.js"></script>
</body>
</html>';
    }
}