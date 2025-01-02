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

//            dump($cars);
            require "views/car/showAll.php";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}