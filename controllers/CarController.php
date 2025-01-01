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


    public function showAll($id)
    {
        $model = new CarModel();

    }
}