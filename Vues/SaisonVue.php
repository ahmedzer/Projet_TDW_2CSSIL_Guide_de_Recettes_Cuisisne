<?php

class SaisonVue
{
    public function afficherPage() {
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
<body>
<ul class="Menu_1" id="menu" >
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
</ul>
<center>
    <div class="saison_container" style="margin-top: 30px">
        <a href="http://localhost/project/Routers/AllRecettesRoute.php?saison=1">
            <div class="saison" style="background-image: url('.'../assets/saisons/hiver.png'.')" >
            </div>
        </a>
        <a href="http://localhost/project/Routers/AllRecettesRoute.php?saison=2">
            <div class="saison" style="background-image: url('.'../assets/saisons/printp.png'.')" >
            </div>
        </a>

        <a href="http://localhost/project/Routers/AllRecettesRoute.php?saison=3">
            <div class="saison" style="background-image: url('.'../assets/saisons/ete.png'.')" >
            </div>
        </a>

        <a  href="http://localhost/project/Routers/AllRecettesRoute.php?saison=4">
            <div class="saison" style="background-image: url('.'../assets/saisons/automne.png'.')" >
            </div>
        </a>

    </div>
</center>

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
<script type="text/javascript" src="../JS/Insert.js"></script>
</body>
</html';
    }
}