<?php

class TypeController
{
    public function showAll(): void
    {
        if ($_SESSION['user']['power'] >= 100) {
            try {

                $model = new TypeModel();
                $datas = $model->readAll();
                foreach ($datas as $data) {
                    $types[] = new Type($data);
                }

                require_once "views/type/showAll.php";

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            header('Location: ?ctrl=home&action=index&error=403');
        }
    }

    public function store($request): void
    {
        if ($_SESSION['user']['power'] >= 100) {
            try {
                $model = new TypeModel();
                $create = $model->create($request);
                if ($create) {
                    header('Location: ?ctrl=type&action=showAll');
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            header('Location: ?ctrl=home&action=index&error=403');
        }
    }

    public function remove($id): void
    {
        if ($_SESSION['user']['power'] >= 100) {
            try {
                $model = new TypeModel();
                $remove = $model->delete($id);
                if ($remove) {
                    header('Location: ?ctrl=type&action=showAll');
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            header('Location: ?ctrl=home&action=index&error=403');
        }
    }
}