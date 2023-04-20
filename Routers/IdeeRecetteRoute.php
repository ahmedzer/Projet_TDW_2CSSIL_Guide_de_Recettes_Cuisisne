<?php
require_once ('../Controllers/IdeeRecetteController.php');
if(isset($_POST['ingredList'])) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        $_SESSION['ingredsList'] =$_POST['ingredList'];
        $url = "http://localhost/project/Routers/AllRecettesRoute.php?searchRecette=1";
        header("Location: ".$url);

    }
    else {
        $_SESSION['ingredsList'] =$_POST['ingredList'];
        $url = "http://localhost/project/Routers/AllRecettesRoute.php?searchRecette=1";
        header("Location: ".$url);
    }
}
$controller = new IdeeRecetteController();
$controller->afficherPage();


