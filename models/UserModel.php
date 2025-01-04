<?php

class UserModel extends CoreModel
{

    private $_req;


    /**
     * @param $request
     * @return false|string|void
     */
    public function createUser($request)
    {
        $sql = "INSERT INTO user_ (use_firstname, use_lastname, use_login, use_password, rol_id ) VALUES (:firstname, :lastname, :login,:password,2)";
        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                $hashedPassword = password_hash($request['password'], PASSWORD_DEFAULT);
                if (($this->_req->bindValue(':firstname', $request['firstname']) && $this->_req->bindValue(':lastname', $request['lastname']) && $this->_req->bindValue(':login', $request['login']) && $this->_req->bindValue(':password', $hashedPassword))) {
                    if ($this->_req->execute()) {
                        $res = $this->getDb()->lastInsertId();
                        return $res;
                    }
                }
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return true|void
     */
    public function deleteUser($id)
    {
        $sql = "DELETE FROM user_ WHERE use_id = :id";
        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        return true;
                    }
                }
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    /**
     * @param $request
     * @return false|mixed|void
     */
    public function login($request)
    {
        $sql = "SELECT user_.*, rol_power
            FROM user_
            JOIN role
            ON user_.rol_id = role.rol_id
            WHERE use_login = :login";
        try {

            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':login', $request['login'], PDO::PARAM_STR)) {
                    if ($this->_req->execute()) {
                        $login = $this->_req->fetch(PDO::FETCH_ASSOC);
                        if ($login && password_verify($request['password'], $login['use_password'])) {
                            return $login;
                        }
                    }
                }
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @return array|false|void
     */
    public function listUsers()
    {
        $sql = "
                SELECT use_id, use_firstname,use_lastname, use_login, rol_label 
                FROM user_
                JOIN role ON user_.rol_id = role.rol_id
                ";
        try {

            if (($this->_req = $this->getDb()->query($sql)) !== false) {
                $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                return $datas;
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    /**
     * @param $id
     * @return mixed|void
     */
    public function readOne($id)
    {
        $sql = "SELECT use_id, use_firstname, use_lastname, use_login FROM user_ WHERE use_id = :id ";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        $data = $this->_req->fetch(PDO::FETCH_ASSOC);
                        return $data;
                    }
                }
            }
            return false;
        } catch (PDOException $e) {
            die ($e->getMessage());
        }
    }

    /**
     * @param $request
     * @return bool|void
     */
    public function updateUser($request)
    {
        $sql = "UPDATE user_
                SET use_firstname = :firstname, use_lastname = :lastname, use_login = :login
                WHERE use_id = :id";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                $this->_req->bindValue(':id', $request['id'], PDO::PARAM_INT);
                $this->_req->bindValue(':firstname', $request['firstname'], PDO::PARAM_STR);
                $this->_req->bindValue(':lastname', $request['lastname'], PDO::PARAM_STR);
                $this->_req->bindValue(':login', $request['login'], PDO::PARAM_STR);
                if ($this->_req->execute()) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}