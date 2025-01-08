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

    public function create($request)
    {
        $sql = "INSERT INTO type (typ_label) VALUES(:label)";

        try{
            if($this->_req = $this->getDb()->prepare($sql)){
                if($this->_req->bindValue(':label', $request['label'])){
                    if($this->_req->execute()){
                        return true;
                    }
                }
            }
            return false;
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM type WHERE typ_id = :id";

        try {
            if($this->_req = $this->getDb()->prepare($sql)){
                if($this->_req->bindValue(':id', $id, PDO::PARAM_INT)){
                    if($this->_req->execute()){
                        return true;
                    }
                }
            }
            return false;
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }
}