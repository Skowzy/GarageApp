<?php

class TypeController
{
    public function showAll() :void
    {
        try {
            if ($_SESSION['user']['power'] >= 100) {

                $model = new TypeModel();
                $datas = $model->readAll();
                foreach ($datas as $data) {
                    $types[] = new Type($data);
                }

                require_once "views/type/showAll.php";
            }else{
                header('Location: ?ctrl=home&action=index&error=403');
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function store($request) : void
    {
        try{
            if ($_SESSION['user']['power'] >= 100) {
                $model = new TypeModel();
                $create = $model->create($request);
                if ($create) {
                    header('Location: ?ctrl=type&action=showAll');
                }
            }else{
                header('Location: ?ctrl=home&action=index&error=403');
            }
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function remove($id) : void
    {
        try{
            if ($_SESSION['user']['power'] >= 100) {
                $model = new TypeModel();
                $remove = $model->delete($id);
                if ($remove) {
                    header('Location: ?ctrl=type&action=showAll');
                }
            }else{
                header('Location: ?ctrl=home&action=index&error=403');
            }
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}