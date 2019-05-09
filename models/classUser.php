<?php

require_once 'libs/database.php';

class classUser extends database {

    public function checkLogin($username, $password) {

        $flag = false;
        try {

            $password = md5($password);
            $sql = $this->connection->prepare("select * from tblusers where "
                    . "email=:email and password=:password");
            $sql->bindParam(":email", $username);
            $sql->bindParam(":password", $password);
            $sql->execute();
            if ($sql->rowCount() == 1) {

                $this->data = $sql->fetch(PDO::FETCH_OBJ);
                $_SESSION['id'] = $this->data->id;
                $_SESSION['usertype'] = $this->data->usertype;
                $_SESSION['email'] = $this->data->email;
                $_SESSION['login'] = true;
                $flag = true;
            }
        } catch (PDOException $ex) {
            
        }
        return $flag;
    }

    public function deleteUser($id) {

        $flag = false;

        try {

            $sql = $this->connection->prepare("delete from tblusers where id=:id");
            $sql->bindParam(":id", $id);
            if ($sql->execute()) {

                return true;
            }
        } catch (PDOException $ex) {

            echo "<pre>" . print_r($ex, 1) . "</pre>";
        }
        return $flag;
    }

    public function registerUser($email, $username, $password) {

        $flag = false;
        $password = md5($password);
        try {

            $sql = $this->connection->prepare("select * from tblusers where uname=:uname"
                    . " and email =:umail");
            $sql->bindParam(':uname', $username);
            $sql->bindParam(':umail', $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $flag;
            } else {


                $sql = $this->connection->prepare("insert into tblusers(uname,email,password) "
                        . "values(:uname,:uemail,:password)");

                $sql->bindParam(':uname', $username);
                $sql->bindParam(':uemail', $email);
                $sql->bindParam(':password', $password);
                $sql->execute();

                return true;
            }
        } catch (PDOException $ex) {
            echo "<pre>" . print_r($ex, 1) . "</pre>";
        }
    }

    public function updateUser($id, $email, $uname) {

        $flag = false;
        try {
            $query = $this->connection->prepare("update tblusers set email="
                    . ":email,uname=:username where id=:id");

            $query->bindParam(':email', $email);
            $query->bindParam(':username', $uname);
            $query->bindParam(':id', $id);

            if ($query->execute()) {

                return true;
            }
        } catch (PDOException $ex) {

            echo "<pre>" . print_r($ex, 1) . "</pre>";
        }
        return $flag;
    }

    public function getUserDetails($id = null) {

        $flag = false;
        try {

            $query = "select * from tblusers ";
            if ($id) {

                $query .= " where id =" . $id;
            }
            $sql = $this->connection->query($query);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                return $sql->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (PDOException $ex) {

            echo $ex->getMessage();
        }

        return $flag;
    }

}
