<?php

class TypeModel extends CoreModel
{
private $_req;

    public function readAll()
    {
        $sql = "SELECT * FROM type";

        try{
            if($this->_req = $this->getDb()->prepare($sql)){
                if($this->_req->execute()){
                    $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                    return $datas;
                }
            }
            return false;
        }catch (Exception $e){
            die($e->getMessage());
        }

    }

}