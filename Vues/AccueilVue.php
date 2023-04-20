<?php
require_once ('../Controllers/AccueilController.php');
require_once ('../Controllers/RecetteController.php');
class AccueilVue
{
    public function afficherEntete() {
        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../CSS/Accueil2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Title</title>
</head>
<body>';
    }


    public function afficherNavBar() {
        echo '<div class="navbar" id="navbar">
    <img class="logo" src="../assets/Accueil/logoWhite.png" alt="">
    <h3 style="font-family: sans-serif">Bienvenu dans notre site web</h3>
    <ul class="nav-links">

        <!-- USING CHECKBOX HACK -->

        <!-- NAVIGATION MENUS -->
        <li>
            <a href="/">
                <div class="icon">
                    <i class="fa fa-facebook" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                    <i class="fa fa-facebook" aria-hidden="true"></i><!-- copy and paste the picture icon link here for hover effect -->
                </div>
            </a>
        </li>
        <li>
            <a href="/">
                <div class="icon">
                    <i class="fa fa-instagram" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                    <i class="fa fa-instagram" aria-hidden="true"></i><!-- copy and paste the picture icon link here for hover effect -->
                </div>
            </a>
        </li>
        <li>
            <a href="/">
                <div class="icon">
                    <i class="fa fa-phone" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                    <i class="fa fa-phone" aria-hidden="true"></i><!-- copy and paste the picture icon link here for hover effect -->
                </div>
            </a>
        </li>
    </ul>
</div><center>
    <h1 style="margin-top: 100px; font-family: sans-serif;color: #6c6c6c">'."L'art".' de cuisiner avec My Recipes</h1>
    <img style="height: 80px;width: 80px;" src="../assets/Accueil/logoPrincipal.png">
</center>';
    }




    public function afficherDiapo() {
        $accueilControler = new AccueilController();
        $diapos = $accueilControler->getDiaporama();
        echo '<div class="ContainerDiaporama">';

        foreach ($diapos as $diapo) {
            echo '<div class="diap fade">
        <div class="diapText">
            <h3 class="diapTitle">'.$diapo[1].'</h3>
            <p class="diapoDescription">
                '.$diapo[2].'
            </p>
            <br>
            <br>
            <br>
            <div class="diaplink" style="height: 20%">
                <a href="'.$diapo[4].'" >
                Voir la suite
                </a>
            </div >
        </div>
        <div class="diapImage">
            <img src="'.$diapo[3].'">
        </div>
    </div>';
        }

        echo '</div>
<br>
<br>';

    }



    public function afficherMenu($uname,$u_id) {

        if(isset($_SESSION['user_id'])){ //si l'utilisateur est authentifier enlever se connecter du menu est la remplacer avec mon compte
            $connectionCheck = '<li id="AjouterRecette">
        <a href="http://localhost/project/Routers/InsertRecetteRoute.php">
            <div class="icon">
                <i class="fa fa-edit" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-edit" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Ajouter une recette">Ajouter une recette</span></div>
        </a>
    </li>
<li id="Login">
        <a href="http://localhost/project/Routers/UserProfileRoute.php">
            <div class="icon">
                <i class="fa fa-user" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-user" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Mon compte">Mon compte</span></div>
        </a>
    </li>
    ';
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

        echo '<ul class="Menu" id="menu">
 
    <li>
      
        <a href="http://localhost/project/Routers/AccueilRoute.php">
           
            <div class="icon">
                <i class="fa fa-home" aria-hidden="true"></i>
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <div class="name"><span data-text="Accueil">Accueil</span></div>
           
        </a>
    </li>
    <li>
        <a href="#">
            
            <div class="icon">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            </div>
            <div class="name"><span data-text="News">News</span></div>
          
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
            <div class="icon">
                <i class="fa fa-snowflake-o" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-snowflake-o" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Saisons">Saisons</span></div>
        </a>
    </li>
    <li>
        <a href="http://localhost/project/Routers/FeteRoute.php">
            <div class="icon">
                <i class="fa fa-smile-o" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-smile-o" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Fêtes">Fêtes</span></div>
        </a>
    </li>
    <li>
        <a href="http://localhost/project/Routers/NutritionRoute.php">
           
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
    </li>'.$connectionCheck.'
</ul>';
    }





    public function afficherEntrees() {
        echo '<div class="SectionEnrtree">
    <div class="decor">
        <img src="../assets/Accueil/icones/entree.png" style="margin-left: 60px;" >
        <h3 style="color: #6c6c6c; font-size: 2.5vw;">Nos entrées</h3>
    </div>
    <div class="CardContainer" id="EntreeContainer">';



        /* recuperer les entrées de la base de données*/
        $recetteController = new RecetteController();

        $entrees = $recetteController->getRecetteByCategory(1); //1 pour les entrées
        $cpt = 0;
        foreach ($entrees as $entree){
            if($cpt<6) {//afficher que 6 recettes
                echo '<div class="Card">
            <div class="CardTitle">
                '.$entree[2].'
            </div>
            <div class="CardImage">
                <img src="'.$entree[4].'">
            </div>
            <p>
            '.$entree[3].'
            </p>
            <div class="CardLink">
                <a href="http://localhost/project/Routers/RecetteRouter.php?r_id='.$entree[0].'">Voir la suite</a>
            </div>
        </div>';
            }
            $cpt++;
        }
        echo '<div><a href="http://localhost/project/Routers/AllRecettesRoute.php?catR=1">
            <!-- this anchor text for link your home to another page -->
            <div class="icon" style="width: 70px">
                <i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 30px;color: #6c6c6c"></i><!-- this is home icon link get form fornt-awesome icon for home button -->
                <!-- copy and paste the home icon link here for hover effect -->
            </div>
            <!-- we are create first menu item name home -->
        </a>' .
            '</div>';

        echo '</div>
</div><br>
<br><br>
';
    }





    public function afficherPlats() {
        echo '<div class="SectionEnrtree" id="PlatsSection" >
    <div class="decor">
        <img src="../assets/Accueil/icones/plats.png" style="margin-left: 60px;" >
        <h3 style="color: #ffffff; font-size: 2.5vw;">Nos Plats</h3>
    </div>
    <div class="CardContainer" id="PlatsContainer">';

        $recetteController = new RecetteController();
        $plats =$recetteController->getRecetteByCategory(2);//2 pour selection les plats
        $cpt = 0;
        foreach ($plats as $plat) {

            if($cpt<6) {
                echo '<div class="Card" id="Entree">
            <div class="CardTitle">
                '.$plat[2].'
            </div>
            <div class="CardImage">
                <img src="'.$plat[4].'">
            </div>
            <p>
            '.$plat[3].'
            </p>
            <div class="CardLink">
                <a href="http://localhost/project/Routers/RecetteRouter.php?r_id='.$plat[0].'">Voir la suite</a>
            </div>
        </div>';
            }
            $cpt++;
        }

        echo '<div><a href="http://localhost/project/Routers/AllRecettesRoute.php?catR=2">
            <!-- this anchor text for link your home to another page -->
            <div class="icon" style="width: 70px">
                <i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 30px;color: #6c6c6c"></i><!-- this is home icon link get form fornt-awesome icon for home button -->
                <!-- copy and paste the home icon link here for hover effect -->
            </div>
            <!-- we are create first menu item name home -->
        </a>' .
            '</div>';

        echo '</div>
</div>';
    }


    public function afficherDessert() {
        echo '<div class="SectionEnrtree" id="DessertSection" style="margin-top: 60px">
    <div class="decor"> 
        <img src="../assets/Accueil/icones/dessert.png" style="margin-left: 60px;" >
        <h3 style="color: #757575; font-size: 2.5vw;">Nos Desserts</h3>
    </div>
    <div class="CardContainer " id="DessertContainer">';

        $recetteController = new RecetteController();
        $plats =$recetteController->getRecetteByCategory(3);//2 pour selection les plats
        $cpt = 0;
        foreach ($plats as $plat) {
            if($cpt<6) {
                echo '<div class="Card cardDessert" id="Dessert">
            <div class="CardTitle">
                '.$plat[2].'
            </div>
            <div class="CardImage">
                <img src="'.$plat[4].'">
            </div>
            <p>
            '.$plat[3].'
            </p>
            <div class="CardLink">
                <a href="http://localhost/project/Routers/RecetteRouter.php?r_id='.$plat[0].'">Voir la suite</a>
            </div>
        </div>';
            }
            $cpt++;
        }
        echo '<div><a href="http://localhost/project/Routers/AllRecettesRoute.php?catR=3">
            <!-- this anchor text for link your home to another page -->
            <div class="icon" style="width: 70px">
                <i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 30px;color: #6c6c6c"></i><!-- this is home icon link get form fornt-awesome icon for home button -->
                <!-- copy and paste the home icon link here for hover effect -->
            </div>
            <!-- we are create first menu item name home -->
        </a>' .
            '</div>';

        echo '</div>
</div>';
    }



    public function afficherBoissons() {
        echo '<div class="SectionEnrtree" id="BoissonsSection" style="margin-top: 60px" >
    <div class="decor">
        <img src="../assets/Accueil/icones/plats.png" style="margin-left: 60px;" >
        <h3 style="color: #ffffff; font-size: 2.5vw;">Nos Plats</h3>
    </div>
    <div class="CardContainer" id="BoissonsContainer">';

        $recetteController = new RecetteController();
        $plats =$recetteController->getRecetteByCategory(4);//2 pour selection les plats
        $cpt=0;
        foreach ($plats as $plat) {
            if($cpt<6) {
                echo '<div class="Card" id="Entree">
            <div class="CardTitle">
                '.$plat[2].'
            </div>
            <div class="CardImage">
                <img src="'.$plat[4].'">
            </div>
            <p>
            '.$plat[3].'
            </p>
            <div class="CardLink">
                <a href="http://localhost/project/Routers/RecetteRouter.php?r_id='.$plat[0].'">Voir la suite</a>
            </div>
        </div>';
            }
           $cpt++;
        }

        echo '<div><a href="http://localhost/project/Routers/AllRecettesRoute.php?catR=4">
            <!-- this anchor text for link your home to another page -->
            <div class="icon" style="width: 70px">
                <i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 30px;color: #6c6c6c"></i><!-- this is home icon link get form fornt-awesome icon for home button -->
                <!-- copy and paste the home icon link here for hover effect -->
            </div>
            <!-- we are create first menu item name home -->
        </a>' .
            '</div>';
        echo '</div>
</div>';
    }

    public function afficherNews() {

        echo '<div class="decor" style="margin: 80px">
        <img src="../assets/Accueil/icones/daily.png" style="margin-left: 60px;width: 67px;" >
        <h3 style="color: #6c6c6c; font-size: 2.5vw;">News et événements</h3>
    </div>';
        $controller = new AccueilController();
        $news = $controller->getNews();
        echo '<div class="ContainerDiaporama" style="width: 80%;margin: auto;">';
        foreach ($news as $item) {
            echo '<div class="news fade">
        <div class="diapText">
            <h5 class="diapTitle">'.$item['titre_news'].'</h5>
            <p class="diapoDescription" style="font-size: 16px;max-height: 70%;overflow: hidden">
                '.$item['contenu_news'].'
            </p>
            <br>
            <br>
            <br>
            <div class="diaplink" style="height: 20%">
                <a href="http://localhost/project/Routers/NewsRoute.php?newId='.$item['id_news'].'" >
                Voir la suite
                </a>
            </div >
        </div>
        <div class="diapImage">
            <img src="'.$item['link_image'].'">
        </div>
    </div>';
        }

        echo '</div>
<br>
<br>';
    }



    public function afficherFin() {

        echo '


<footer class=" text-center text-white" style="background-color:#2e2e2e;">
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script type="text/javascript" src="../JS/Accueil2.js"></script>
</body>
</html>
';
    }

}