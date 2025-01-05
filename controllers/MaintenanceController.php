<?php

class MaintenanceController
{

    /**
     * @param $id
     * @return void
     */
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
        if($maintenance){
            require_once "views/maintenance/showOne.php";
        }
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function update($request)
    {
        try{
            $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            if($request){
                $model = new MaintenanceModel();
                $maintenance = $model->update($request);
                if($maintenance){
                    header("Location: ?ctrl=maintenance&action=showOne&id=".$request["id"]."&update=success");
                }else{
                    header("Location: ?ctrl=maintenance&action=showOne&id=".$request["id"]."&update=error");
                }
            }

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function remove($request)
    {
        try{
            $model = new MaintenanceModel();
            $delete = $model->deleteMaintenance($request);
            if($delete){
                header("Location: ?ctrl=maintenance&action=showAll&id=".$_SESSION['user']['id']."&delete=success");
            }else{
                header("Location: ?ctrl=maintenance&action=showAll&id=".$_SESSION['user']['id']."&delete=error");
            }

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }


}