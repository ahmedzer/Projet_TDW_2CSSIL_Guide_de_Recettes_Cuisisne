<?php
require_once ('../Controllers/FeteController.php');
require_once ('../Controllers/RecetteController.php');
class feteVue
{
    public function afficherTop() {
        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../CSS/Recette.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Recette</title>
</head>
<body>';
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
        echo '<ul class="Menu_1" id="menu" >
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
    </li>'.$connectionCheck.'
</ul>
<center>
    ';

    }



    public function afficherRecettes() {
        echo '<h2 id="titre_page" class="t3" style="margin-top: 20px">Meilleures recettes pour vos Fêtes</h2>';
        echo '<img src="../assets/Recettes/Icones/party-ornament.png" style="width: 7%">';
        echo '<div class="FilterView">
<h4>Trier les resultats : </h4>

<button id="noteFilter" type="button" class="btn btn-secondary">Note utilisateurs</button>
<button id="healthFilter" type="button" class="btn btn-secondary">Health</button>
<button id="CaloriesFilter" type="button" class="btn btn-secondary">Calories</button>
<button id="timeFilter" type="button" class="btn btn-secondary">Temps</button>
<button id="portionFilter" type="button" class="btn btn-secondary">Portion</button>

';


        $fete_controller = new FeteController();
        $list_fete = $fete_controller->getFetes();
        echo '<select id="SelectFete" class="SelectFete form-select form-select-lg" style="width: 140px;font-size: 16px">';
        foreach ($list_fete as $item) {
            echo '<option value="'.$item['id_fete'].'">'.$item['titre_fete'].'</option>';
        }
        echo '</select>';
        echo '</div><div id="recetteListe" class="recettteContainer" style="margin-top: 20px;">';

        /*********************************** afficher les recette ***************************************/
        $recette_fete = $fete_controller->getRecetteFete();
        $conroller = new RecetteController();

        foreach ($recette_fete as $recette) {
            $healthNote = $conroller->estimerHealth($recette['id_Recette'] );//la note de santé
            $calories = $conroller->estimerCalories($recette['id_Recette'] );//les calories de la recette
            $userRating = $conroller->getNoteUtilisateurs($recette['id_Recette'] );//note attribuée par les utilisatuers

            echo '<div data-health="'.intval($healthNote).'" 
            data-timeprep = "'.$recette['temps_preparation'].'" data-calories="'.intval($calories/$recette['portion']).'" 
            data-rating ="'.intval($userRating).'" 
            data-portion ="'.$recette['portion'].'" 
            data-saison = "'.$recette['saison'].'"
            data-fete-id = "'.$recette['fete'].'"
            class="Card" id="recette' . $recette['id_Recette'] . '">
            <div class="CardTitle">
                ' . $recette['titre_recette'] . '
            </div>
            <div class="CardImage">
                <img src="' . $recette['image_recette'] . '">
            </div>
            <p>
            ' . $recette['description_recette'] . '
            </p>
            <div class="cardInfo">
                <img src="../assets/Recettes/Icones/clock%20(1).png" style="width: 10%;margin-left: 4%;margin-right: 4%">
                ' . $recette['temps_preparation'] . ' min
                <img src="../assets/Recettes/Icones/portion.png" style="width: 10%;margin-left: 4%;margin-right: 4%">
                 ' . $recette['portion'] . ' personnes
            </div>
            <div class="cardNote">
                Health : ' . intval($healthNote) . '/5 <br>Calories: '.intval($calories/$recette['portion']).' kcal par personne
            </div>';
            echo '<div class="userRating">';
            $i=0;
            while ($i<intval($userRating)) {
                echo '<span class="fa fa-star checked"></span>';
                $i++;
            }
            while ($i<5) {
                echo '<span class="fa fa-star"></span>';
                $i++;
            }
            echo '</div>';
            echo '<div class="CardLink">
                <a href="http://localhost/project/Routers/RecetteRouter.php?r_id=' . $recette['id_Recette'] . '">Afficher la suite</a>
            </div>';
            echo '</div>';
        }
        echo '</div>';
    }


    public function afficherBottom() {
        echo '</center>

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