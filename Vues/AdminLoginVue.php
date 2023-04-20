<?php
require_once ('../Controllers/AdminController.php');
class AdminLoginVue
{
    public function afficherPage() {
        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../CSS/Login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Page</title>
</head>
<body>
<div class="LoginContainer">
    <div class="LoginScreen">
        <img src="../assets/Accueil/logoWhite.png" style="width: 7.5%">
        <br>
        <br>
        <form name="lognin"  method="post" id="loginForm">
             
            <p style="font-size: 18px; color: #6c6c6c">Se connecter a mon compte administrateur</p>
            <img src="../assets/Admin/icons/admin.png" style="width: 20%">
            <input type="text"  id="email_log" name="email_log" placeholder="Admin Email" required>
            <input type="password"  id="psw_log" required placeholder="Mot de passe Admin" name="psw_log">
            <input type="submit" value="Se connnecter" id="admin_log_but">
            <h5 id="LogResult"></h5>
        </form>
    </div>
</div>

<script type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="../JS/Login.js"></script>
</body>
</html>';


        if(isset($_POST['email_log']) and isset($_POST['psw_log']) ) {
            $adminController = new AdminController();
            $result = $adminController->adminLogin($_POST['email_log'],$_POST['psw_log']);
            if($result == 1 ){
                header("Location: http://localhost/project/Routers/Admin_Principal_PageRoute.php?AdminName=" . $_SESSION['admin_name'] . "&admin_id=" . $_SESSION['admin_id']."&admin_email=".$_SESSION['admin_name']);
            }
            else {
                echo '<script type="text/javascript">
                  document.getElementById("LogResult").innerHTML= "Email ou mot de passe incorrecte"
                  document.getElementById("LogResult").style.color = "#DC143C";
             </script>';
            }
        }
    }


}