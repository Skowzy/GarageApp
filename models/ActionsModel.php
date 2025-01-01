<?php

class ActionsModel extends CoreModel
{

    private $_req;

    /**
     * @param $request
     * @param $id
     * @return false|string|void
     */
    public function createAction($request, $id){
        $sql = "INSERT INTO actions (act_name, act_description, act_price, act_date, car_id ) VALUES (:name, :description, :price,:date, :id)";
        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if (($this->_req->bindValue(':name', $request['name']) && $this->_req->bindValue(':description', $request['description']) && $this->_req->bindValue(':price', $request['price']) && $this->_req->bindValue(':date', $request['date'])) && $this->_req->bindValue(':id', $id)) {
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

}