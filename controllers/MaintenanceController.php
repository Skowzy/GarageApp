<?php

class MaintenanceController
{


    public function showAll($id)
    {
        try{
            $model = new MaintenanceModel();
            $datas = $model->readAll($id);

            foreach ($datas as $data) {
                $maintenances[] = new Maintenance($data);
            }

            if($maintenances){
                require_once "views/maintenance/showAll.php";
            }

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

}