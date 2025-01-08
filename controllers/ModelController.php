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
            if ($_SESSION['user']['power'] >= 100) {
                $modelModel = new ModelModel();
                $datas = $modelModel->read($id);
                foreach ($datas as $data) {
                    $models[] = new Model($data);
                }


                $brandModel = new BrandModel();
                $datas = $brandModel->readOne($id);
                $brand = new Brand($datas);

                require_once "views/brand/models/showAll.php";
            }else{
                header('Location: ?ctrl=home&action=index&error=403');
            }
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function remove($id) : void
    {
        try{
            if ($_SESSION['user']['power'] >= 100) {
                $model = new ModelModel();
                $remove = $model->delete($id);
                if ($remove) {
                    header('Location: ?ctrl=brand&action=showAll');
                }
            }else{
                header('Location: ?ctrl=home&action=index&error=403');
            }
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function store($request) : void
    {
        try{
            if ($_SESSION['user']['power'] >= 100) {
                $model = new ModelModel();
                $create = $model->create($request);
                if ($create) {
                    header('Location: ?ctrl=model&action=showAll&id='.$request['brandId']);
                }
            }else{
                header('Location: ?ctrl=home&action=index&error=403');
            }
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }

}