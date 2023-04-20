<?php
require_once ('Model.php');
class Ingredient extends Model
{
    public function __construct()
    {
    }
    public function getIngredients() {
        $pdo =  $this->connect();
        $stm = $pdo->query("SELECT * FROM ingredient");

        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $results;
    }
    public function getIngredientById($id) {
        $pdo =  $this->connect();

        $stm = $pdo->query("SELECT * FROM ingredient WHERE id_ingred = $id");
        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $results;
    }

    public function getRecetteIngreds($id_recette) {
        $pdo =  $this->connect();

        $stm = $pdo->query("select * from ingredient i join (select * from ingredient_recette ir  where  ir.id_recette = $id_recette)as f on i.id_ingred =f.id_ingredient;");
        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $results;
    }


    public function insertIngred($id_ingred,$quantite_gramme,$quantite_text,$id_recette) {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry="INSERT INTO `ingredient_recette` (`id_recette`,`id_ingredient`, `quantité_gramme`, `quantité`, `id`)
        VALUES(:id_recette,:id_ingred,:quantite_gramme,:quantite_text,NULL)";
        $stm=$pdo->prepare($qry);
        $stm->bindValue(':id_recette',$id_recette);
        $stm->bindValue(':id_ingred',$id_ingred);
        $stm->bindValue(':quantite_gramme',$quantite_gramme);
        $stm->bindValue(':quantite_text',$quantite_text);

        $stm->execute();
        $this->disconnect($pdo);
    }


}