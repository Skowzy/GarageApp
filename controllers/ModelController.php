<?php

class ModelController
{
    /**
     * @param $id
     * @return void
     */
    public function showAll($id)
    {
        try {

            $modelModel = new ModelModel();
            $datas = $modelModel->read($id);
            foreach ($datas as $data) {
                $models[] = new Model($data);
            }


            $brandModel = new BrandModel();
            $datas = $brandModel->readOne($id);
            $brand = new Brand($datas);

            require_once "views/brand/models/showAll.php";
        }catch (Exception $e){
            echo $e->getMessage();
        }


    }

}