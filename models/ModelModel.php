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

    public function read($id)
    {
        $sql = "SELECT mod_id, mod_label
                FROM model 
                WHERE mod_brandId = :id";

        try{
            if($this->_req = $this->getDb()->prepare($sql)){
                if($this->_req->bindValue(':id', $id, PDO::PARAM_INT)){
                    if($this->_req->execute()){
                        $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                        return $datas;
                    }
                }
            }
            return false;
        }catch (Exception $e){
            die ($e->getMessage());
        }

    }

    public function create($request)
    {
        $sql = "INSERT INTO model (mod_label, mod_brandId) VALUES(:label, :id)";

        try{
            if($this->_req = $this->getDb()->prepare($sql)){
                if($this->_req->bindValue(':label', $request['label'], PDO::PARAM_STR) && $this->_req->bindValue(':id', $request['brandId'], PDO::PARAM_INT)){
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
        $sql = "DELETE FROM model WHERE mod_id = :id";

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