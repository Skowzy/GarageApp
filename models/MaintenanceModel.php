<?php

class MaintenanceModel extends CoreModel
{

    private $_req;

    /**
     * @param $request
     * @param $id
     * @return false|string|void
     */
    public function createAction($request){
        $sql = "INSERT INTO actions (act_name, act_description, act_price, act_date, car_id ) VALUES (:name, :description, :price,:date, :id)";
        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if (($this->_req->bindValue(':name', $request['name']) && $this->_req->bindValue(':description', $request['description']) && $this->_req->bindValue(':price', $request['price']) && $this->_req->bindValue(':date', $request['date'])) && $this->_req->bindValue(':id', $request['id'])) {
                    if ($this->_req->execute()) {
                        $res = $this->getDb()->lastInsertId();
                        return $res;
                    }
                }
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteAction($id)
    {
        $sql = "DELETE FROM actions WHERE act_id = :id";
        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        return true;
                    }
                }
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function readOne($id)
    {
        $sql = "SELECT * FROM actions WHERE act_id = :id ";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        $data = $this->_req->fetch(PDO::FETCH_ASSOC);
                        return $data;
                    }
                }
            }
        }catch (PDOException $e) {
            die ($e->getMessage());
        }
    }

}