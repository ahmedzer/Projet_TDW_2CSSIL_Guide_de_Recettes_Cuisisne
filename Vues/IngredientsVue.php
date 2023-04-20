<?php

require_once ('../Controllers/IngredientsController.php');
class IngredientsVue
{
    public function afficherMenu() {

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
        echo ('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link href="../CSS/Ingredient.css" rel="stylesheet" type="text/css">
            <link href="../CSS/ProgressBar.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
            <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Title</title>
        </head>
        <body>
        <ul class="Menu" id="menu">
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
        </ul>') ;
    }
    public function afficherIngredient($id_ingred) {

        $x= "Plus d'informations sur cet ingrédient";
        $controller = new IngredientsController();
        $row = $controller->getIngredientById($id_ingred);
        $x="";
        if(strpos($row[0][4],"1")!==false) {
            $x = $x." Hiver";
        }
        if(strpos($row[0][4],"2")!==false) {
            $x = $x." Printemps";
        }
        if(strpos($row[0][4],"3")!==false) {
            $x = $x." Eté";
        }
        if(strpos($row[0][4],"4")!==false) {
            $x = $x." Automne";
        }
        $cout = "";
        if($row[0][3]==1) {
            $cout = "Abordable";
        }
        if($row[0][3]==2) {
            $cout = "Moyen";
        }
        if($row[0][3]==3) {
            $cout = "Cher";
        }
        echo '<center>
  <div class="ingred_container">
    <div class="ingred_discription">
      <div class="description_ingred">
        <h1 >'.$row[0][1].'</h1>
        <p class="description_text">
          <img style="float: left" src="'.$row[0][13].'">
          '.$row[0][12].'
        </p>
      </div>

    </div>

    <h1>'."Plus d'infomations sur cet ingrédient".'</h1>
    <div class="information_generale">
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/calory.png">
        </div>
        <div class="info_text">
          <h3>Calories</h3>
          <p>
        '.$row[0][5].' kcal/100g
        </p>
        </div>
      </div>
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/fiber.png">
        </div>
        <div class="info_text">
          <h3>Fibres</h3>
          <p>
        '.$row[0][10].' g/100g
        </p>
        </div>
      </div>
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/lipid.png">
        </div>
        <div class="info_text">
          <h3>Lipides</h3>
          <p>
        '.$row[0][8].' g/100g
        </p>
        </div>
      </div>
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/glucide.png">
        </div>
        <div class="info_text">
          <h3>Glucides</h3>
          <p>
        '.$row[0][7].' g/100g
        </p>
        </div>
      </div>
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/protein.png">
        </div>
        <div class="info_text">
          <h3>Protéine</h3>
          <p>
        '.$row[0][6].' g/100g
        </p>
        </div>
      </div>
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/eau.png">
        </div>
        <div class="info_text">
          <h3>Eau</h3>
          <p>
        '.$row[0][9].' g/100g
        </p>
        </div>
      </div>
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/cout.png">
        </div>
        <div class="info_text">
          <h3>Coût</h3>
          <p>
        '.$cout.'
          </p>
        </div>
      </div>
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/health.png">
        </div>
        <div class="info_text">
          <h3>Santé</h3>
          <p>
        '.$row[0][2].'
          </p>
        </div>
      </div>
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/viramin.png">
        </div>
        <div class="info_text">
          <h3>Vitamines</h3>
          <p>
        '.$row[0][11].'
          </p>
        </div>
      </div>
      <div class="info">
        <div>
          <img src="../assets/Ingred/icons/season.png">
        </div>
        <div class="info_text">
          <h3>Saison naturelle</h3>
          <p>
        '.$x.'
          </p>
        </div>
      </div>
    </div>
  </div>

</center>';


    }

    public function afficherFin() {
        echo '</body>
</html>';
    }
}