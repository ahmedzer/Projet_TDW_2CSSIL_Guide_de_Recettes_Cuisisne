<?php
require_once ('Model.php');
class Admin extends Model
{

    public function __construct()
    {
    }

    public function getAdmin($email, $password) {
        $pdo = $this->connect();
        $stm = $pdo->prepare("SELECT * FROM admin where admin_email = ? and admin_password= ?");
        $stm->execute(array($email,$password));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        return $r;
    }

    public function adminLogin($email, $password) {
        $pdo = $this->connect();
        $stm = $pdo->prepare("SELECT * FROM admin where admin_email = ? and admin_password= ?");
        $stm->execute(array($email,$password));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        if(count($r)>0) {
            session_start();
            $_SESSION['admin_id'] = $r[0][3];
            $_SESSION['admin_email'] = $r[0][0];
            $_SESSION['admin_name'] = $r[0][2];
            return 1;
        }
        return 0;
    }

    public function getUsers() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from user order by user_id");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }

    public function getRecettes() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from recette order by id_Recette");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }

    public function getValidUsers() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from user where user_valid=1 order by user_id");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }

    public function getInvalidUsers() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from user where user_valid=0 order by user_id");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }
    public function tableColumns($tableName) {

        $pdo = $this->connect();
        $stm = $pdo->prepare("DESCRIBE $tableName");
        $stm->execute();
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        return $r;
    }

    public function getTable($tableName) {

        $pdo = $this->connect();
        $stm = $pdo->prepare("select *from $tableName");
        $stm->execute();
        $r =$stm->fetchAll(\PDO::FETCH_ASSOC);
        return $r;
    }

    public function validerUser($u_id) {
        $pdo = $this->connect();
        $data = [
            'u_id'=>$u_id,
            'u_valid'=>1,
        ];
        $sql = "UPDATE user SET user_valid=:u_valid  WHERE user_id=:u_id";
        $stmt= $pdo->prepare($sql);
        try {
            $stmt->execute($data);
            $this->disconnect($pdo);
            return 200;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return 201;
        }
    }

    public function bannirUser($u_id) {
        $pdo = $this->connect();
        $data = [
            'u_id'=>$u_id,
            'u_valid'=>0,
        ];
        $sql = "UPDATE user SET user_valid=:u_valid  WHERE user_id=:u_id";
        $stmt= $pdo->prepare($sql);
        try {
            $stmt->execute($data);
            $this->disconnect($pdo);
            return 200;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return 201;
        }
    }

    public function deleteNews($id_news) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "DELETE FROM news WHERE id_news =:id" );
        $stmt->bindParam(':id', $id_news);
        $stmt->execute();
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

    public function getIngreds() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from ingredient");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }

    public function editNews($id_news,$titre_news,$contenu_news,$link_image,$link_post,$num,$extern_link) {
        $pdo = $this->connect();
        $data = [
            'id_news'=>$id_news,
            'titre_news' => $titre_news,
            'contenu_news' => $contenu_news,
            'link_image' => $link_image,
            'link_post' => $link_post,
            'num'=>$num,
            'extern_link'=>$extern_link,
        ];
        $sql = "UPDATE news SET id_news=:id_news,titre_news=:titre_news, contenu_news=:contenu_news,link_image=:link_image,link_post =:link_post ,num=:num ,extern_link=:extern_link WHERE id_news=:id_news";
        $stmt= $pdo->prepare($sql);
        try {
            $stmt->execute($data);
            $this->disconnect($pdo);
            return 200;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return 201;
        }
    }

    public function insertNews($titre_news,$contenu_news,$link_image,$link_post,$num,$extern_link) {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry="INSERT INTO `news` (`id_news`,`titre_news`,
                       `contenu_news`, `link_image`, `link_post`,
                       `num`,`extern_link`)
        VALUES(NULL,:titre_news,:contenu_news,:link_image,:link_post,:num,:extern_link)";
        $stm=$pdo->prepare($qry);
        $stm->bindValue(':titre_news',$titre_news);
        $stm->bindValue(':contenu_news',$contenu_news);
        $stm->bindValue(':link_image',$link_image);
        $stm->bindValue(':link_post',$link_post);
        $stm->bindValue(':num',$num);
        $stm->bindValue(':extern_link',$extern_link);

        try {
            $stm->execute();
            return 1;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return -1;
        }
    }

    public function deleteIngred($id_ingred) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "DELETE FROM ingredient WHERE id_ingred =:id" );
        $stmt->bindParam(':id', $id_ingred);
        $stmt->execute();
    }


    public function editIngred( $id_ingred,
$nom_ingred,
$health_note_ingred,
$cout_ingred,
$saison_i,
$calories,
$proteines,
$glucides,
$lipides,
$eau,
$fibres,
$vitamines,
$description_ingred,
$image_ingred,
$type_ingred) {



        $pdo = $this->connect();
        $data = [
            'id_ingred'=>$id_ingred,
            'nom_ingred'=>$nom_ingred,
            'health_note_ingred'=>$health_note_ingred,
            'cout_ingred'=>$cout_ingred,
            'saison_i'=>$saison_i,
            'calories'=>$calories,
            'proteines'=>$proteines,
            'glucides'=>$glucides,
            'lipides'=>$lipides,
            'eau'=>$eau,
            'fibres'=>$fibres,
            'vitamines'=>$vitamines,
            'description_ingred'=>$description_ingred,
            'image_ingred'=>$image_ingred,
            'type_ingred'=>$type_ingred
        ];
        $sql = "UPDATE ingredient SET id_ingred=:id_ingred,nom_ingred=:nom_ingred, health_note_ingred=:health_note_ingred,
                      cout_ingred=:cout_ingred,saison_i =:saison_i ,calories=:calories ,
                      proteines=:proteines,glucides=:glucides,lipides=:lipides,eau=:eau,
                      fibres=:fibres,vitamines=:vitamines,description_ingred=:description_ingred,image_ingred=:image_ingred
                  ,type_ingred=:type_ingred WHERE id_ingred=:id_ingred";
        $stmt= $pdo->prepare($sql);
        try {
            $stmt->execute($data);
            $this->disconnect($pdo);
            return 200;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return 201;
        }
    }


    public function insertIngred(
                                 $nom_ingred,
                                 $health_note_ingred,
                                 $cout_ingred,
                                 $saison_i,
                                 $calories,
                                 $proteines,
                                 $glucides,
                                 $lipides,
                                 $eau,
                                 $fibres,
                                 $vitamines,
                                 $description_ingred,
                                 $image_ingred,
                                 $type_ingred)
    {

        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = [
            'nom_ingred'=>$nom_ingred,
            'health_note_ingred'=>$health_note_ingred,
            'cout_ingred'=>$cout_ingred,
            'saison_i'=>$saison_i,
            'calories'=>$calories,
            'proteines'=>$proteines,
            'glucides'=>$glucides,
            'lipides'=>$lipides,
            'eau'=>$eau,
            'fibres'=>$fibres,
            'vitamines'=>$vitamines,
            'description_ingred'=>$description_ingred,
            'image_ingred'=>$image_ingred,
            'type_ingred'=>$type_ingred
        ];
        $qry="INSERT INTO ingredient (id_ingred,nom_ingred, health_note_ingred,
                      cout_ingred,saison_i ,calories ,
                      proteines,glucides,lipides,eau,
                      fibres,vitamines,description_ingred,image_ingred
                  ,type_ingred)
        VALUES(NULL,:nom_ingred, :health_note_ingred,
                      :cout_ingred,:saison_i ,:calories ,
                      :proteines,:glucides,:lipides,:eau,
                      :fibres,:vitamines,:description_ingred,:image_ingred
                  ,:type_ingred)";

        $stm=$pdo->prepare($qry);

        $stmt= $pdo->prepare($qry);
        try {
            $stmt->execute($data);
            $this->disconnect($pdo);
            return 200;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return 201;
        }
    }

    public function getDiapos() {
        $pdo =  $this->connect();

        $stm = $pdo->query("SELECT * FROM diaporama");

        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $results;
    }

    public function deleteDiapo($id_diap) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "DELETE FROM diaporama WHERE id_diapo =:id" );
        $stmt->bindParam(':id', $id_diap);
        $stmt->execute();
    }

    public function editDiapo($id_diapo, $titre_diapo, $description_diapo, $image_diapo, $lien_diapo) {
        $pdo = $this->connect();
        $data = [
            'id_diapo'=>$id_diapo,
            'titre_diapo' => $titre_diapo,
            'description_diapo' => $description_diapo,
            'image_diapo' => $image_diapo,
            'lien_diapo' => $lien_diapo,
        ];
        $sql = "UPDATE diaporama SET id_diapo=:id_diapo,titre_diapo=:titre_diapo, description_diapo=:description_diapo,image_diapo=:image_diapo,lien_diapo =:lien_diapo  WHERE id_diapo=:id_diapo";
        $stmt= $pdo->prepare($sql);
        try {
            $stmt->execute($data);
            $this->disconnect($pdo);
            return 200;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return 201;
        }
    }


    public function getParamRecherche() {
        $pdo =  $this->connect();

        $stm = $pdo->query("SELECT * FROM param_recherche");

        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $results;
    }
    public function updateParam($id_param,$titre_param,$valeur) {
        $pdo = $this->connect();
        $data = [
            'id_param'=>$id_param,
            'titre_param' => $titre_param,
            'valeur' => $valeur,
        ];
        $sql = "UPDATE param_recherche SET id_param=:id_param,titre_param=:titre_param, valeur=:valeur  WHERE id_param=:id_param";
        $stmt= $pdo->prepare($sql);
        try {
            $stmt->execute($data);
            $this->disconnect($pdo);
            return 200;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return 201;
        }
    }

    public function getParam($id_param) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "select * FROM param_recherche WHERE id_param =:id" );
        $stmt->bindParam(':id', $id_param);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertDiapo( $titre_diapo, $description_diapo, $image_diapo, $lien_diapo) {
        $pdo = $this->connect();
        $data = [
            'titre_diapo' => $titre_diapo,
            'description_diapo' => $description_diapo,
            'image_diapo' => $image_diapo,
            'lien_diapo' => $lien_diapo,
        ];
        $qry="INSERT INTO diaporama (id_diapo,titre_diapo, description_diapo,
                      image_diapo,lien_diapo)
        VALUES(NULL,:titre_diapo, :description_diapo,
                      :image_diapo,:lien_diapo)";


        $stmt= $pdo->prepare($qry);
        try {
            $stmt->execute($data);
            $this->disconnect($pdo);
            return 200;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return -1;
        }
    }
}