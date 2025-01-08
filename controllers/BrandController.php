<?php

class BrandController
{
    public function showAll()
    {
        try {
            if ($_SESSION['user']['power'] >= 100) {

                $model = new BrandModel();
                $datas = $model->readAll();
                foreach ($datas as $data) {
                    $brands[] = new Brand($data);
                }

                require_once "views/brand/showAll.php";
            } else {

                header("Location:index.php?ctrl=home&action=index&error=403");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function remove($id) : void
    {
        try{
            if ($_SESSION['user']['power'] >= 100) {
                $model = new BrandModel();
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
                $model = new BrandModel();
                $create = $model->create($request);
                if ($create) {
                    header('Location: ?ctrl=brand&action=showAll');
                }
            }else{
                header('Location: ?ctrl=home&action=index&error=403');
            }
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }

}