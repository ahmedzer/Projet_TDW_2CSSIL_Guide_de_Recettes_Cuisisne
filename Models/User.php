<?php
require_once ('Model.php');
class User extends Model
{
    public function __construct()
    {
    }


    public function checkUser($email) {
        $pdo = $this->connect();
        $stm = $pdo->prepare("SELECT * FROM user where user_email = ?");
        $stm->execute(array($email));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return (count($r)>0);
    }

    public function checkUserById($u_id) {
        $pdo = $this->connect();
        $stm = $pdo->prepare("SELECT * FROM user where user_id = ?");
        $stm->execute(array($u_id));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return (count($r)>0);
    }

    public function insertUser($user_name,$user_email,$user_phone,$birth_date,$user_valid,$password) {

        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry="INSERT INTO `user` (`user_id`,`user_name`, `user_email`, `user_phone`, `birth_date`, `user_valid`,`password`)
        VALUES(NULL,:user_name,:user_email,:user_phone,:birth_date,:user_valid,:password)";
        $stm=$pdo->prepare($qry);
        $stm->bindValue(':user_name',$user_name);
        $stm->bindValue(':user_email',$user_email);
        $stm->bindValue(':user_phone',$user_phone);
        $stm->bindValue(':birth_date',$birth_date);
        $stm->bindValue(':user_valid',$user_valid);
        $stm->bindValue(':password',$password);

        try {
            $x = $stm->execute();

            $user = $this->getUser($user_email,$password);
            $_SESSION['user_name'] = $user[0][1];
            $_SESSION['user_email'] = $user[0][2];
            $_SESSION['user_phone']=$user[0][3];
            $_SESSION['user_id']=$user[0][0];
            return 200;
        }
        catch (PDOException $e){
            return 201;
        }
    }

    public function getUser($email,$password) {
        $pdo = $this->connect();
        $stm = $pdo->prepare("SELECT * FROM user where user_email = ? and password= ?");
        $stm->execute(array($email,$password));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);

        return $r;
    }

    public function getUserbyId($id_user) {
        $pdo = $this->connect();
        $stm = $pdo->prepare("SELECT * FROM user where user_id = ?");
        $stm->execute(array($id_user));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $r;
    }


    public function checkUserValid($id_user) {
        $pdo = $this->connect();
        $stm = $pdo->prepare("SELECT * FROM user where user_id = ?");
        $stm->execute(array($id_user));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $r[0][5];
    }

    public function login($email,$pass){
        session_start();
        $user = $this->getUser($email,$pass);
        if($user) {
            $_SESSION['user_name'] = $user[0][1];
            $_SESSION['user_email'] = $user[0][2];
            $_SESSION['user_phone']=$user[0][3];
            $_SESSION['user_id']=$user[0][0];
        }

    }

    public function getUsers() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from user");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }
    public function getUserValid() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from user where user_valid=1");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }

    public function getUserNonValid() {
        $pdo = $this->connect();
        $stm = $pdo->query("Select *from user where user_valid=0");
        $result = $stm->fetchAll(PDO::FETCH_NUM);
        $this->disconnect($pdo);
        return $result;
    }

    public function updateUser($user_id,$user_name,$user_email,$user_phone,$birth_date,$user_valid,$password) {
        $pdo = $this->connect();
        $data = [
            'u_id'=>$user_id,
            'u_name' => $user_name,
            'u_mail' => $user_email,
            'u_phone' => $user_phone,
            'u_date' => $birth_date,
            'u_valid'=>$user_valid,
            'u_pass'=>$password,
        ];
        $sql = "UPDATE user SET user_id=:u_id, user_name=:u_name, user_email=:u_mail,user_phone=:u_phone ,birth_date =:u_date ,user_valid=:u_valid ,password=:u_pass WHERE user_id=:u_id";
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


    public function deleteUser($u_id) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "DELETE FROM user WHERE user_id =:id" );
        $stmt->bindParam(':id', $u_id);
        $exist = $this->checkUserById($u_id);
        if($exist>0) {
            try {
                $stmt->execute();
                $this->disconnect($pdo);
                if($this->checkUserById($u_id)>0) {
                    return 201;
                }
                else {
                    return 200;
                }
            }
            catch (PDOException $e) {
                $this->disconnect($pdo);
                return $e->getMessage();
            }
        }
        else {
            return 203;
        }
    }

    public function checkFav($id_recette,$id_user) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "SELECT * FROM user_favorite WHERE id_recette =:id_r and id_user=:id_u" );
        $stmt->bindParam(':id_r', $id_recette);
        $stmt->bindParam(':id_u', $id_user);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function retirerFavorite($id_recette,$id_user) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "DELETE FROM user_favorite WHERE id_recette =:id_r and id_user=:id_u" );
        $stmt->bindParam(':id_r', $id_recette);
        $stmt->bindParam(':id_u', $id_user);
        $stmt->execute();
    }

    public function insertToFavorite($id_recette,$id_user) {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry="INSERT INTO `user_favorite` (`id_fav`,`id_recette`, `id_user`)
        VALUES(NULL,:id_recette,:id_user)";
        $stm=$pdo->prepare($qry);
        $stm->bindValue(':id_recette',$id_recette);
        $stm->bindValue(':id_user',$id_user);
        $stm->execute();
    }

    public function getFovoriteRecette($id_user) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "SELECT * FROM `user_favorite` ur JOIN recette r on r.id_Recette = ur.id_recette where id_user=:id" );
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getUserName($id_user) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare( "SELECT * FROM user where user_id=:id" );
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}