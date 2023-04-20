<?php
require_once ('../Controllers/RecetteController.php');
require_once ('../Controllers/IngredientsController.php');

/**
 * @property int $id_recette_insert
 */
class InsertRecette
{

    public function afficherTopAdmin() {
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
    }
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
                    $result =-1;
                    if(isset($_SESSION['admin_id'])) {//recette ajouté par un admin
                        $result = $controller->insertRecette($_POST['selectCatR'],$_POST['inputTitreR'],$_POST['inputDescriptionR'],
                            $img_link,1,$_POST['inputPortionR'],$_POST['inputTempsR'],$_POST['selectSaisonR']);

                        if($result != -1) {
                            echo '<div id="resultDiv" data-result ="200" data-recette-id="'.$result.'"></div>';
                        }
                        else {
                            echo '<script>alert("Erreur")</script>
<div id="resultDiv" data-result ="201"></div>';
                        }
                        $_POST['submitR'] =null;
                    }
                    else {//par un simple utilisateur
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

    public function afficherIngredInsertMenu() {


        echo '<form id="InsertRecetteIngred" method="post">
        <h4 style="color: #6c6c6c">Insérer les ingrédients de votre recette</h4>
        <select id="selectIngred2" class="selectIngred2 form-select form-select-lg " aria-label="Default select example" style="width: 30%;font-size: 18px;display: flex;margin-top: 10px" disabled="true">
            <option value="0" selected>Selectionner des ingrédients</option>';

        $ingred_controller = new IngredientsController();
        $ingredients = $ingred_controller->getIngredients();

        foreach ($ingredients as $ingredient){
            echo '<option value="'.$ingredient[0].'">'.$ingredient[1].'</option>';
        }
        echo '</select>';
        echo '<ul class="list-group selectedIngred2" id="selectedIngred2" style="width:60% "></ul>
        <button id="insertIngredBtn" type="button" class="btn btn-primary">Insérer</button>
    </form>';


        if(isset($_POST['ingred_id_list'],$_POST['ingred_quantity_gramme'],$_POST['ingred_quantity'])) {

            for ($i = 0;$i<count($_POST['ingred_id_list']);$i++) {
                $ingred_controller->insertIngred($_POST['ingred_id_list'][$i],$_POST['ingred_quantity_gramme'][$i],$_POST['ingred_quantity'][$i],$_POST['recette_id']);

            }
            echo '<div id="insertIngred_result" data-ingred-insert="200"></div>';
        }
    }

    public function insertEtapesMenu() {
        echo '<form id="InsertEtape" method="post" class="InsertEtape">
        <button id="insertEtapeBtn" type="button" class="btn btn-outline-danger" >Ajouter etape</button>
        <ul class="etapesSelect" id="etapesSelect">
</ul>
        <button id="EndButton" type="button" class="btn btn-primary">Terminer</button>
</form>';

        if(isset($_POST['num_etapes'],$_POST['description_etapes'],$_POST['recette_id'])) {
            for ($i=0;$i<count($_POST['num_etapes']);$i++) {
                $recette_controller = new RecetteController();
                $recette_controller->insertEtapes($_POST['num_etapes'][$i],$_POST['description_etapes'][$i],$_POST['recette_id']);
            }
            echo '<p>Votre recette est ajoutée avec succès en attendant la validation</p>';
        }
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
<script type="text/javascript" src="../JS/Insert.js"></script>
</body>
</html>';
    }

    /**
     * @return int
     */


    public function authRequired() {
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
            $connectionCheck = '<li id="Login">
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
        <a href="#">
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
        <a href="#">
            <!-- this anchor text for link your team page to another page -->
            <div class="icon">
                <i class="fa fa-snowflake-o" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-snowflake-o" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Saisons">Saisons</span></div>
        </a>
    </li>
    <li>
        <a href="#">
            <!-- this anchor text for link your team page to another page -->
            <div class="icon">
                <i class="fa fa-smile-o" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-smile-o" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Fêtes">Fêtes</span></div>
        </a>
    </li>
    <li>
        <a href="http://localhost/project/Routers/IngredientsRoute.php?choix=3">
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
<center><h2 style="margin-top: 30px; color: #FF8243">Connectez a votre compte MyRecipes pour ajouter votre recetter</h2>
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
</html>
    ';
    }



    public function bannedUser() {
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
            $connectionCheck = '<li id="Login">
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
        <a href="#">
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
        <a href="#">
            <!-- this anchor text for link your team page to another page -->
            <div class="icon">
                <i class="fa fa-snowflake-o" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-snowflake-o" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Saisons">Saisons</span></div>
        </a>
    </li>
    <li>
        <a href="#">
            <!-- this anchor text for link your team page to another page -->
            <div class="icon">
                <i class="fa fa-smile-o" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio -->
                <i class="fa fa-smile-o" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->
            </div>
            <div class="name"><span data-text="Fêtes">Fêtes</span></div>
        </a>
    </li>
    <li>
        <a href="http://localhost/project/Routers/IngredientsRoute.php?choix=3">
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
<center><h2 style="margin-top: 30px; color: #FF8243">Votre compte MyRecipes a été banni</h2>
<h2 style="margin-top: 30px; color: #FF8243">Vous ne pouvez pas utiliser cette fonctionnalité</h2>
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
</html>
    ';
    }

}