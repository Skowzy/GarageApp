<?php

class MaintenanceController
{

    /**
     * @param $id
     * @return void
     */
    public function showAll($id)
    {
        try {
            $maintenances = [];
            $model = new MaintenanceModel();
            $datas = $model->readAll($id);

            foreach ($datas as $data) {
                $maintenances[] = new Maintenance($data);
            }

            require_once "views/maintenance/showAll.php";

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function showOne($id)
    {

        try {

            $model = new MaintenanceModel();
            $datas = $model->readOne($id);

            $maintenance = new Maintenance($datas);
            if ($maintenance) {
                require_once "views/maintenance/showOne.php";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($request)
    {
        try {
            if ($request) {
                $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $model = new MaintenanceModel();
                $maintenance = $model->update($request);
                if ($maintenance) {
                    header("Location: ?ctrl=maintenance&action=showOne&id=" . $request["id"] . "&update=success");
                } else {
                    header("Location: ?ctrl=maintenance&action=showOne&id=" . $request["id"] . "&update=error");
                }
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $request
     * @return void
     */
    public function remove($request): void
    {
        try {
            $model = new MaintenanceModel();
            $delete = $model->deleteMaintenance($request);
            if ($delete) {
                header("Location: ?ctrl=maintenance&action=showAll&id=" . $_SESSION['user']['id'] . "&delete=success");
            } else {
                header("Location: ?ctrl=maintenance&action=showAll&id=" . $_SESSION['user']['id'] . "&delete=error");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function create($id)
    {
        try {
            $carModel = new CarModel();
            $datas = $carModel->readOne($id);
            $car = new Car($datas);

            $typeModel = new TypeModel();
            $datas = $typeModel->readAll();
            foreach ($datas as $data) {
                $types[] = new Type($data);
            }

            require_once "views/maintenance/addOne.php";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            $maintenanceModel = new MaintenanceModel();
            $create = $maintenanceModel->createMaintenance($request);
            if ($create) {
                header("Location: ?ctrl=maintenance&action=showAll&id=" . $_SESSION['user']['id'] . "&create=success");
            } else {
                header("Location: ?ctrl=maintenance&action=showAll&id=" . $_SESSION['user']['id'] . "&create=error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}