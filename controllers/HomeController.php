<?php

class HomeController
{

    public function index()
    {
        try{
            $carModel = new CarModel();
            $datas = $carModel->listCars();
            foreach ($datas as $data) {
                $cars[] = new Car($data);
            }
            dump($cars);


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