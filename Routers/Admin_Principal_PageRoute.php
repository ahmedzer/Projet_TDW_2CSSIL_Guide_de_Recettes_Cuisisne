<?php
require_once ('../Vues/Admin_Principal_Vue.php');

$principalPageVue = new Admin_Principal_Vue();
if(isset($_SESSION['admin_email'])) {
    $principalPageVue->afficherPage();
}
else {
    echo "Vous n'avez pas acces a cette page";
}

