<?php
require_once ('Model.php');
class Recette extends Model
{
    public function __construct() {
    }
    public function getRecettes() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from recette");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }

    public function getRecettes2() {//associative fetch
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from recette");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }

    public function getRecetteById($recette_id) {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from recette where id_Recette=$recette_id");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }

    public function getRecetteIds() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select  id_Recette from recette");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }

    public function checkRecetteExists($recette_id) {
        $pdo = $this->connect();
        $stm = $pdo->prepare("SELECT * FROM recette where id_Recette = ?");
        $stm->execute(array($recette_id));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return (count($r)>0);
    }
    public function getRecetteByType($type) {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from recette where categorie_recette=$type");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }

    public function getEtapes($id_recett) {
        $pdo = $this->connect();
        $stm = $pdo->query("SELECT * FROM `etape` where id_recette=$id_recett order by num_etape asc;");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }

    public function estimerCalories($id_recette) {

        $calories = 0;
        $pdo =  $this->connect();
        $stm = $pdo->query("select * from ingredient i join (select * from ingredient_recette ir  where  ir.id_recette = $id_recette)as f on i.id_ingred =f.id_ingredient;");
        $results = $stm->fetchAll(PDO::FETCH_NUM);
        foreach ($results as $res) {
            if($res[17]!=null) {
                $quantity = $res[17];
                $calori_of_quantity = ($quantity/100)*$res[5];//les calories d'un ingredient pour la quantité utilisée dans cette recette
                $calories =$calories+$calori_of_quantity;
            }
        }
        return $calories;
    }

    public function estimerHealth($id_recette) {
        $pdo =  $this->connect();
        $stm = $pdo->query("select * from ingredient i join (select * from ingredient_recette ir  where  ir.id_recette = $id_recette)as f on i.id_ingred =f.id_ingredient;");
        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $healthSom = 0;
        $healthNote = 0;
        foreach ($results as $ingred) {
            $healthSom = $healthSom+$ingred[2];
        }
        $this->disconnect($pdo);
        if(count($results)!=0) {
            $healthNote = $healthSom/count($results);
        }
        return $healthNote;
    }

    public function getRecetteType($id_recette) {
        $pdo = $this->connect();
        $stm = $pdo->query("Select categorie_recette from recette where id_Recette=$id_recette");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }

    public function getValidRecette() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select categorie_recette from recette where recette_valide=1");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }
    public function getRecetteNonValid() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select categorie_recette from recette where recette_valide=0");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }

    public function deleteRecette($id_recette) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "DELETE FROM recette WHERE id_Recette =:id" );
        $stmt->bindParam(':id', $id_recette);
        $exist = $this->checkRecetteExists($id_recette);
        if($exist>0) {
            try {
                $stmt->execute();
                $this->deleteEtapesRecette($id_recette);
                $this->deleteIngredsRecette($id_recette);
                $this->deletetUserRecette($id_recette);
                $this->disconnect($pdo);
                if($this->checkRecetteExists($id_recette)>0) {//verifier si la recette est supprimée
                    return 201;//erreur de suppression
                }
                else {
                    return 200;//suppression avec succes
                }
            }
            catch (PDOException $e) {
                $this->disconnect($pdo);
                return $e->getMessage();
            }
        }
        else {
            return 203;//recette existe pas
        }
    }

    public function deleteEtapesRecette($id_recette) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "DELETE FROM etape WHERE id_recette =:id" );
        $stmt->bindParam(':id', $id_recette);
        $stmt->execute();
    }

    public function deleteIngredsRecette($id_recette) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "DELETE FROM ingredient_recette WHERE id_recette=:id" );
        $stmt->bindParam(':id', $id_recette);
        $stmt->execute();
    }

    public function deletetUserRecette($id_recette) {//supprimer si la recette indroduite par un user
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "DELETE FROM recette_user WHERE id_recette=:id" );
        $stmt->bindParam(':id', $id_recette);
        $stmt->execute();
    }

    public function modifierRecette($r_id,$r_cat,$r_titre,$r_desc,$r_img,$r_valid,$r_portion,$r_temps) {
        $pdo = $this->connect();
        $data = [
            'r_id'=>$r_id,
            'r_cat' => $r_cat,
            'r_titre' => $r_titre,
            'r_desc' => $r_desc,
            'r_img' => $r_img,
            'r_valid'=>$r_valid,
            'r_portion'=>$r_portion,
            'r_temps'=>$r_temps,
        ];
        $sql = "UPDATE recette SET id_Recette=:r_id, categorie_recette=:r_cat, titre_recette=:r_titre,
                   description_recette=:r_desc ,image_recette =:r_img ,recette_valide=:r_valid
                   ,portion=:r_portion ,temps_preparation=:r_temps  WHERE id_Recette=:r_id";
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

    public function checkIfRecetteContainsIngred($id_recette,$id_ingred) {

        $pdo = $this->connect();
        $stmt = $pdo->prepare( "Select * from ingredient_recette where (id_recette=:id_r and id_ingredient=:id_i)" );
        $stmt->bindParam(':id_r', $id_recette);
        $stmt->bindParam(':id_i', $id_ingred);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);

        if(count($result)>0) {
            return 1;
        }
        else {
            return  0;
        }
    }

    public function getRecetteUserNote($id_recette) {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from note_user where id_recette=$id_recette");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        if(count($result)>0) {
            $note = 0;
            foreach ($result as $item) {
                $note = $note+$item[3];
            }
            return $note/count($result);
        }
        return 0;
    }



    public function getRecetteByimg($r_img) {
        $pdo = $this->connect();
        $stm = $pdo->prepare("SELECT * FROM recette where image_recette = ?");
        $stm->execute(array($r_img));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $r;
    }
    public function insertRecette($r_cat,$r_titre,$r_desc,$r_img,$r_valid,$r_portion,$r_temps,$r_saison) {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry="INSERT INTO `recette` (`id_Recette`,`categorie_recette`,
                       `titre_recette`, `description_recette`, `image_recette`,
                       `recette_valide`,`portion`,`temps_preparation`,`saison`)
        VALUES(NULL,:r_cat,:r_titre,:r_desc,:r_img,:r_valid,:r_portion,:r_temps,:r_saison)";
        $stm=$pdo->prepare($qry);
        $stm->bindValue(':r_cat',$r_cat);
        $stm->bindValue(':r_titre',$r_titre);
        $stm->bindValue(':r_desc',$r_desc);
        $stm->bindValue(':r_img',$r_img);
        $stm->bindValue(':r_valid',$r_valid);
        $stm->bindValue(':r_portion',$r_portion);
        $stm->bindValue(':r_temps',$r_temps);
        $stm->bindValue(':r_saison',$r_saison);
        try {
            $stm->execute();
            $recette = $this->getRecetteByimg($r_img);
            if(count($recette)>0) {
                $this->disconnect($pdo);
                return $recette[0][0];
            }
            else {
                return -1;
            }
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return -1;
        }
    }

    public function insertEtape($num_etape,$decription_etape,$id_recette) {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry="INSERT INTO `etape` (`id_etape`,`num_etape`,
                       `description_etape`, `type`, `id_recette`)
        VALUES(NULL,:num_etape,:decription_etape,NULL,:id_recette)";
        $stm=$pdo->prepare($qry);
        $stm->bindValue(':num_etape',$num_etape);
        $stm->bindValue(':decription_etape',$decription_etape);
        $stm->bindValue(':id_recette',$id_recette);
        try {
            $stm->execute();
            $this->disconnect($pdo);
            return 1;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return $e->getMessage();
        }
    }

    public function insertUserRecette($user_id,$recette_id) {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry="INSERT INTO `recette_user` (`id_recette_user`,`id_recette`,
                       `id_user`)
        VALUES(NULL,:recette_id,:user_id)";
        $stm=$pdo->prepare($qry);
        $stm->bindValue(':user_id',$user_id);
        $stm->bindValue(':recette_id',$recette_id);
        try {
            $stm->execute();
            $this->disconnect($pdo);
            return 1;
        }
        catch (PDOException $e) {
            $this->disconnect($pdo);
            return $e->getMessage();
        }
    }

    public function getRecetteIngreds() {
        $pdo = $this->connect();
        $stm = $pdo->query("SELECT *from recette r join (select * from ingredient_recette j JOIN ingredient i on i.id_ingred= j.id_ingredient)as f on f.id_recette = r.id_Recette");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }

    public function recetteSaison($id_recette) {//retourne la saison de cette recette (si tout ses ingred appartient a la meme saison)
        $hiver = 0;
        $printemp = 0;
        $automn = 0;
        $ete = 0;
        $recettes = $this->getRecetteIngreds();
        foreach ($recettes as $recette) {
            if($recette['id_Recette']==$id_recette) {
                if(strpos($recette['saison_i'],"1")!==false) {
                    $hiver++;
                }
                if(strpos($recette['saison_i'],"2")!==false) {
                    $printemp++;
                }
                if(strpos($recette['saison_i'],"3")!==false) {
                    $ete++;
                }
                if(strpos($recette['saison_i'],"4")!==false) {
                    $automn++;
                }
            }
        }
        if(max($hiver,$automn,$ete,$printemp) == $hiver) {
            return 1;
        }
        if(max($hiver,$automn,$ete,$printemp) == $printemp) {
            return 2;
        }
        if(max($hiver,$automn,$ete,$printemp) == $ete) {
            return 3;
        }
        if(max($hiver,$automn,$ete,$printemp) == $automn) {
            return 4;
        }
        return -1;
    }

    public function getRecetteSaison($saison) {//retourne les recette de la saison x
        $recettes =$this->getRecettes2();
        $result = array();
        foreach ($recettes as $recette) {
            if($this->recetteSaison($recette['id_Recette']) == $saison) {
                $result[] = $recette;
            }
        }

        return $result;
    }

    //select * from recette_user ru join recette r on r.id_Recette=ru.id_recette
    public function getRecettesUser() {
        $pdo = $this->connect();
        $stm = $pdo->query("select * from recette r join recette_user ru on r.id_Recette=ru.id_recette");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }

    public function getMyRecette($user_id) {
        $pdo = $this->connect();
        $stm = $pdo->query("SELECT * FROM `recette_user` ur JOIN recette r on r.id_Recette = ur.id_recette where id_user=$user_id");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($pdo);
        return $result;
    }
}



















