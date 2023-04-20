<?php
require_once ('../Controllers/UserController.php');
class SignInVue
{
    public function __construct()
    {

    }


    public function afficherPage(){

        echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../CSS/Login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Title</title>
</head>
<body>
<div class="LoginContainer">
    <div class="welcomeScreen">
        <img src="../assets/Accueil/logoWhite.png">
        <h1>Créez votre compte My Recipes</h1>

        <img src="../assets/login/cooking.png" style="width: 128px">

        <h1>Et explorez le monde de la cuisine</h1>
    </div>

    <div class="registrationScreen">
        <img src="../assets/Accueil/logoPrincipal.png" style="width: 15%">
        <br>
        <br>
        <form name="signin"  method="post" id="signinForm" >

            <input type="text"  id="uname" name="uname"  placeholder="Nom et Prénom" required>

            <input type="text"  id="email" name="email" placeholder="Email" required>

            <input type="text" placeholder="Numero de téléphone"  id="phone" name="phone" required>


            <input type="password"  id="psw" required placeholder="Mot de passe" name="psw">

            <input type="password" placeholder="Confirmer le mot de passe" id="psw_confirm" name="psw_confirm" required>
            <label for="psw">Date de naissance</label>
            <input type="date"   id="date" name="date" required >
            <input type="submit" value="Inscrire">
            <a href="http://localhost/project/Routers/LoginRoute.php">J'."'".'ai un compte</a>
            <h5 id="SignInReslut"></h5>
        </form>
    </div>
</div>

<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="../JS/Login.js"></script>
</body>
</html>

        ';

        if(isset($_POST['uname']) and isset($_POST['email']) and  isset($_POST['phone']) and isset($_POST['psw']) and isset($_POST['psw_confirm']) and isset($_POST['date'])) {
            $controller = new UserController();

            if($_POST['psw']!=$_POST['psw_confirm']) {
                echo '<script type="text/javascript">
                  document.getElementById("SignInReslut").innerHTML= "Erreur dans la confirmation de mot de passe"
                  document.getElementById("SignInReslut").style.color = "#FF0000";
             </script>';
            }
            else {
                $result= $controller->register();
                if($result == 200) {
                    header("Location: http://localhost/project/Routers/AccueilRoute.php?uname=" . $_SESSION['user_name'] . "&user_id=" . $_SESSION['user_id']);
                }
                else {
                    if($result == 203) {
                        echo '<script type="text/javascript">
                  document.getElementById("SignInReslut").innerHTML= "Cet email est déja utilisé"
                  document.getElementById("SignInReslut").style.color = "#FF0000";
             </script>';
                    }
                    if($result==201) {
                        echo '<script type="text/javascript">
                  document.getElementById("SignInReslut").innerHTML= "Erreur dans la création du compte"
                  document.getElementById("SignInReslut").style.color = "#FF0000";
             </script>';
                    }
                }
            }

        }
    }


}