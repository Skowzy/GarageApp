<?php

class HomeController
{

    public function index()
    {
        try{
            $brandModel = new BrandModel();
            $datas = $brandModel->readAll();
            foreach($datas as $data){
                $brands[] = new Brand($data);
            }

            $modelModel = new ModelModel();
            $datas = $modelModel->readAll();
            foreach($datas as $data){
                $models[] = new Model($data);
            }

        require "views/index.php";
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }


}