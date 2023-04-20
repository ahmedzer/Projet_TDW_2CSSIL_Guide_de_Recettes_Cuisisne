<?php
require_once ('../Controllers/UserController.php');
class Login_Vue
{
    public function afficherPage()
    {
        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../CSS/Login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Login</title>
</head>
<body>
<div class="LoginContainer">
    <div class="LoginScreen">
        <img src="../assets/Accueil/logoWhite.png" style="width: 7.5%">
        <br>
        <br>
        <form name="lognin"  method="post" id="loginForm"   >
        <img src="../assets/Accueil/logoBlack.png" style="width: 20%">
            <input type="text"  id="email_log" name="email_log" placeholder="Email" required>

            <input type="password"  id="psw_log" required placeholder="Mot de passe" name="psw_log">
            <input type="submit" value="Se conecter" >
            <a href="http://localhost/project/Routers/Register_route.php">Je n' . "'" . 'ai pas de compte</a>
            <h5 id="LogResult"></h5>
        </form>
    </div>
</div>

<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="../JS/Login.js"></script>
</body>
</html>';

        if (isset($_POST['email_log']) and isset($_POST['psw_log'])) {
            $userController = new UserController();
            $r = $userController->log_user();
            if ($r == 200) {
                header("Location: http://localhost/project/Routers/AccueilRoute.php?uname=" . $_SESSION['user_name'] . "&user_id=" . $_SESSION['user_id']);
            }
            if ($r == 202 or $r == 201 ) {
                echo '<script type="text/javascript">
                  document.getElementById("LogResult").innerHTML= "Email ou mot de passe incorrecte"
                  document.getElementById("LogResult").style.color = "#DC143C";
             </script>';
            }
        }
    }
}