<?php

class CarController
{

    /**
     * @return void
     */
    public function create()
    {
        try {
            require_once 'views/car/addOne.php';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $request
     * @return void
     */
    public function store($request): void
    {
        $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);


        try {

            $model = new Model();

            if (!empty($request['brand']) && !empty($request['model']) && !empty($request['year'])) {
                $car = $model->createCar($request);
            }

            if ($car) {
                header('Location: ?ctrl=car&action=showAll&id=' . $_SESSION['user']['id'] . '&addcar=success');
                exit();
            } else {
                header('Location: ?ctrl=car&action=showAll&id=' . $_SESSION['user']['id'] . '&addcar=error');
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
    public function showAll($id): void
    {
        try {
            $carModel = new Model();
            $datas = $carModel->viewCars($id);
            $cars = [];
            $lastMaintenances = [];

            foreach ($datas as $data) {
                $cars[] = new Car($data);
            }
            
            $userModel = new UserModel();
            $info = $userModel->readOne($id);
            $user = new User($info);

            $maintenanceModel = new MaintenanceModel();
            foreach ($cars as $car) {
                $maintenanceData = $maintenanceModel->getLastMaintenance($car->getId());
                if ($maintenanceData) {
                    $lastMaintenances[$car->getId()] = new Maintenance($maintenanceData);
                }
            }
//dump($lastMaintenances);
            require_once "views/car/showAll.php";

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function showOne($id): void
    {
        try {
            $carModel = new Model();
            $datas = $carModel->readOne($id);
            $car = new Car($datas);

            $maintenanceModel = new MaintenanceModel();
            $infos = $maintenanceModel->readAll($car->getId());
            foreach ($infos as $info) {
                $maintenances[] = new Maintenance($info);
            }

            require_once "views/car/showOne.php";
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
            $model = new Model();
            $delete = $model->deleteCar($id);

            if ($delete) {
                header("Location: ?ctrl=car&action=showAll&id=" . $_SESSION['user']['id'] . "&deleteCar=success");
                exit();
            } else {
                header("Location: ?ctrl=car&action=showAll&id=" . $_SESSION['user']['id'] . "&deleteCar=error");
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
    public function edit($id): void
    {
        try {
            $model = new Model();
            $datas = $model->readOne($id);
            $car = new Car($datas);

            if ($car) {
                require "views/car/edit.php";
            } else {
                header('Location: ?edit=error');
                exit();
            }
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
        $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        try {
            $model = new Model();
            $update = $model->updateCar($request);
            if ($update) {
                header('Location: ?ctrl=car&action=showOne&id=' . $request['id'] . "&updateCar=success");
                exit();
            } else {
                header('Location: ?ctrl=car&action=showAll&id=' . $request['id'] . "update=error");
                exit();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}