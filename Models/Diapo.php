<?php
require_once ('Model.php');
class Diapo extends Model
{
    public function __construct() {

    }
    public  function getDiaporama()
    {
        $pdo =  $this->connect();

        $stm = $pdo->query("SELECT * FROM diaporama");

        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $results;
    }

    public function getNewsById($id_news) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "select * FROM news WHERE id_news =:id" );
        $stmt->bindParam(':id', $id_news);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNews() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from news order by num");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }

    public function getArticles($id_news) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "select * FROM article WHERE id_news =:id" );
        $stmt->bindParam(':id', $id_news);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}