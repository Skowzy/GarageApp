<?php

class UserController
{

    /**
     * @return void
     */
    public function showAll()
    {
        if($_SESSION['user']['role'] === 1 || $_SESSION['user']['role'] === 4 || $_SESSION['user']['power'] >= 100){
            try {
                $model = new UserModel();
                $datas = $model->listUsers();

                foreach ($datas as $data) {
                    $users[] = new User($data);
                }

//            dump($users);
                require "views/user/showAll.php";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }else{
            header("location: ?ctrl=home&action=index&message=403");
        }

    }


    /**
     * @return void
     */
    public function register()
    {
        try {

            require "views/user/register.php";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $request
     * @return void
     */
    public function store($request)
    {
        try {

            $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            if (!empty($request['firstname']) && !empty($request['lastname']) && !empty($request['login']) && !empty($request['password']) && !empty($request['passwordConfirm']) && $request['password'] == $request['passwordConfirm']) {
                $model = new UserModel();

                $datas = $model->listUsers();
                foreach ($datas as $data) {
                    if ($data['use_login'] == $request['login']) {
                        header('Location: ?adduser=error');
                        exit();
                    }

                }
                $user = $model->createUser($request);
            }
            if ($user) {
                header('Location: ?adduser=success');
                exit();
            } else {
                header('Location: ?adduser=error');
                exit();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return void
     */
    public function login()
    {
        require "views/user/login.php";
    }

    /**
     * @param $request
     * @return void
     */
    public function connexion($request): void
    {
        try {

            $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            if (!empty($request['login']) && !empty($request['password'])) {
                $model = new UserModel();
                $login = $model->login($request);
            }
            if ($login) {
                $lastLogin = $model->lastLogin($request);
                $_SESSION['user'] = [
                    'id' => $login['use_id'],
                    'firstname' => $login['use_firstname'],
                    'lastname' => $login['use_lastname'],
                    'login' => $login['use_login'],
                    'power' => $login['rol_power'],
                    'role' => $login['rol_id'],
                ];
                header('Location: ?connexion=success');
                exit();
            } else {
                header('Location: ?connexion=error');
                exit();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        try {
            session_unset();
            session_destroy();
            header('Location: ?disconnected=success');
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function remove($id): void
    {
        try {
            $model = new UserModel();
            $delete = $model->deleteUser($id);
            if ($delete) {
                header('Location: ?ctrl=user&action=showall&deleted=success');
                exit();

            } else {
                header('Location: ?ctrl=user&action=showall&deleted=error');
                exit();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function profile($id): void
    {
        try {
            $userModel = new UserModel();
            $data = $userModel->readOne($id);
            $user = new User($data);

            $carModel = new CarModel();
            $infos = $carModel->viewCars($id);

            foreach ($infos as $info) {
                $userCars[] = new Car($info);
            }


            require "views/user/showOne.php";


        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $request
     * @return void
     */
    public function update($request): void
    {
        try {
            $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            
            if (!empty($request['firstname']) && !empty($request['lastname']) && !empty($request['login'])) {
                $userModel = new UserModel();
                $update = $userModel->updateUser($request);
                
                if ($update) {
                    $_SESSION['user']['firstname'] = $request['firstname'];
                    $_SESSION['user']['lastname'] = $request['lastname'];
                    $_SESSION['user']['login'] = $request['login'];
                    
                    header('Location: ?ctrl=user&action=profile&id=' . $request['id'] . '&updated=success');
                    exit();
                }
            }
            header('Location: ?ctrl=user&action=profile&id=' . $request['id'] . '&updated=error');
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function updatePassword($request): void
    {
        try {
            $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            if (!empty($request['oldPassword']) && !empty($request['password']) && !empty($request['passwordConfirm']) && $request['password'] == $request['passwordConfirm']) {
                $userModel = new UserModel();
                $update = $userModel->updatePassword($request);

                if ($update) {
                    header('Location: ?ctrl=user&action=profile&id=' . $request['id'] . '&updated=success');
                    exit();
                }
            }
            header('Location: ?ctrl=user&action=profile&id=' . $request['id'] . '&updated=error');
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}