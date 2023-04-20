<?php
require_once ('Model.php');
class FeteModel extends Model
{
    public function __construct() {

    }

    public function getFetes() {
        $pdo =  $this->connect();

        $stm = $pdo->query("SELECT * FROM fete");

        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $results;
    }

    public function getRecetteFete() {
        $pdo =  $this->connect();

        $stm = $pdo->query("SELECT *from recette r join recette_fete rf on r.id_Recette = rf.id_recette");

        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $results;
    }
}