<?php

class UserModel extends CoreModel
{

    private $req;


    /**
     * @param $request
     * @return false|string|void
     */
    public function createUser($request)
    {
        try {
            $sql = "INSERT INTO user_ (use_firstname, use_lastname, use_login, use_password, rol_id ) VALUES (:firstname, :lastname, :login,:password,2)";
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                $hashedPassword = password_hash($request['password'], PASSWORD_DEFAULT);
                if (($this->_req->bindValue(':firstname', $request['firstname']) && $this->_req->bindValue(':lastname', $request['lastname']) && $this->_req->bindValue(':login', $request['login']) && $this->_req->bindValue(':password', $hashedPassword))) {
                    if ($this->_req->execute()) {
                        $res = $this->getDb()->lastInsertId();
                        return $res;
                    }
                }
            }
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
        try {
            $sql = "SELECT user_.*, rol_power
            FROM user_
            JOIN role
            ON user_.rol_id = role.rol_id
            WHERE use_login = :login";

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


}