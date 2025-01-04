<?php

class CarController
{

    /**
     * @param $request
     * @param $id
     * @return void
     */
    public function store($request)
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
     * @return void
     */
    public function showAll($id)
    {
        try {
            $model = new carModel();
            $datas = $model->viewCars($id);

            foreach ($datas as $data) {
                $cars[] = new Car($data);
            }

            require "views/car/showAll.php";

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function showOne($id)
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

    public function remove($id)
    {
        try {
            $model = new carModel();
            $delete = $model->deleteCar($id);

            if ($delete) {
                header("Location: ?ctrl=car&action=showAll&id=" . $_SESSION['user']['id'] . "&deleteCar=success");
            } else {
                header("Location: ?ctrl=car&action=showAll&id=" . $_SESSION['user']['id'] . "&deleteCar=error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            $model = new carModel();
            $datas = $model->readOne($id);
            $car = new Car($datas);

            if ($car) {
                require "views/car/edit.php";
            } else {
                header('Location: ?edit=error');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($request)
    {
        try {
            $model = new carModel();
            $update = $model->updateCar($request);
            if ($update) {
                header('Location: ?ctrl=car&action=showOne&id=' . $request['id'] . "&updateCar=success");
            } else {
                header('Location: ?ctrl=car&action=showAll&id=' . $request['id'] . "update=error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}