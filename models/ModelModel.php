<?php

class ModelModel extends CoreModel
{
    private $_req;

    /**
     * @return array|false|void
     */
    public function readAll()
    {
        $sql = "SELECT * FROM model";

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