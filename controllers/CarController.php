<?php

class CarController
{

    /**
     * @param $request
     * @return void
     */
    public function store($request) : void
    {
        $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);


        try {

            $model = new CarModel();
            $car = $model->createCar($request);

            if ($car) {
                header('Location: ?addcar=success');
                exit();
            } else {
                header('Location: ?addcar=error');
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
    public function showAll($id) : void
    {
        try {
            $carModel = new carModel();
            $datas = $carModel->viewCars($id);

            foreach ($datas as $data) {
                $cars[] = new Car($data);
            }

            $userModel = new UserModel();
            $info = $userModel->readOne($id);
            $user = new User($info);

            require "views/car/showAll.php";

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function showOne($id) : void
    {
        try {
            $model = new carModel();
            $datas = $model->readOne($id);
            $car = new Car($datas);
            require "views/car/showOne.php";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function remove($id) : void
    {
        try {
            $model = new carModel();
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
    public function edit($id) : void
    {
        try {
            $model = new carModel();
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
    public function update($request) : void
    {
        $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        try {
            $model = new carModel();
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