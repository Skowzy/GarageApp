<?php

class UserController
{

    /**
     * @return void
     */
    public function showAll()
    {
        if ($_SESSION['user']['role'] === 1 || $_SESSION['user']['role'] === 4 || $_SESSION['user']['power'] >= 100) {
            try {
                $model = new UserModel();
                $datas = $model->listUsers();

                foreach ($datas as $data) {
                    $users[] = new User($data);
                }

//            dump($users);
                require_once "views/user/showAll.php";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            header("location: ?ctrl=home&action=index&error=403");
        }

    }


    /**
     * @return void
     */
    public function register()
    {
        try {

            require_once "views/user/register.php";
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

            if (!empty($request['firstname']) && !empty($request['lastname']) && !empty($request['login']) && !empty($request['password']) && !empty($request['passwordConfirm']) && $request['password'] == $request['passwordConfirm']) {
                $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                if (filter_var($request['login'], FILTER_VALIDATE_EMAIL)) {

                    $model = new UserModel();

                    $datas = $model->listUsers();
                    foreach ($datas as $data) {
                        if ($data['use_login'] == $request['login']) {
                            header('Location: ?ctrl=home&action=index&adduser=error');
                            exit();
                        }
                    }
                    $user = $model->createUser($request);
                    if ($user) {
                        header('Location: ?ctrl=home&action=index&adduser=success');
                        exit();
                    } else {
                        header('Location: ?ctrl=home&action=index&adduser=error');
                        exit();
                    }
                } else {
                    header('Location: ?ctrl=home&action=index&adduser=error');
                }
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
        require_once "views/user/login.php";
    }

    /**
     * @param $request
     * @return void
     */
    public function connexion($request): void
    {
        try {
            if (!empty($request['login']) && !empty($request['password'])) {
                $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                if (filter_var($request['login'], FILTER_VALIDATE_EMAIL)) {
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

                    if ($_SESSION['user']['power'] < 100) {
                        header('Location: ?ctrl=home&action=index&connexion=success');
                        exit();
                    } elseif ($_SESSION['user']['power'] >= 100) {
                        header('Location: ?ctrl=user&action=showAll&connexion=success');
                    }
                } else {
                    header('Location: ?ctrl=home&action=index&connexion=error');
                    exit();
                }
            }else{
                header('Location: ?ctrl=home&action=index&connexion=error');
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
            header('Location: ?ctrl=home&action=index&disconnected=success');
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
        if ($_SESSION['user']['power'] >= 100 || $_SESSION['user']['id'] == $id) {
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
        } else {
            header('Location: ?ctrl=home&action=index&error=403');
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function profile($id): void
    {
        if ($_SESSION['user']['power'] >= 100 || $_SESSION['user']['id'] == $id) {
            try {
                $userModel = new UserModel();
                $data = $userModel->readOne($id);

                if (!$data) {
                    header("location: ?ctrl=home&action=index&error=404");
                    exit();
                }

                $user = new User($data);

                $carModel = new CarModel();
                $infos = $carModel->viewCars($id);
                $maintenanceModel = new MaintenanceModel();
                $userCars = [];
                $lastMaintenances = [];

                if ($infos) {
                    foreach ($infos as $info) {
                        $userCars[] = new Car($info);
                    }

                    foreach ($userCars as $userCar) {
                        $maintenanceData = $maintenanceModel->getLastMaintenance($userCar->getId());
                        if ($maintenanceData) {
                            $lastMaintenances[$userCar->getId()] = new Maintenance($maintenanceData);
                        }
                    }
                }

                require "views/user/showOne.php";

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            header("location: ?ctrl=home&action=index&error=403");
        }
    }

    /**
     * @param $request
     * @return void
     */
    public function update($request): void
    {
        if ($_SESSION['user']['id'] == $request['id']) {

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
        } else {
            header("location: ?ctrl=home&action=index&error=403");
        }
    }

    public function updatePassword($request): void
    {
        if ($_SESSION['user']['id'] == $request['id']) {
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
        } else {
            header("location: ?ctrl=home&action=index&error=403");
        }
    }

}