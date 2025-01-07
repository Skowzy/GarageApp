<?php

class MaintenanceModel extends CoreModel
{

    private $_req;

    /**
     * @param $request
     * @return false|string|void
     */
    public function createMaintenance($request)
    {
        $sql = "INSERT INTO maintenance (mai_description, mai_price, mai_date,mai_typeId, mai_carId ) VALUES (:description, :price,:date, :type,:id)";
        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if (($this->_req->bindValue(':type', $request['type']) && $this->_req->bindValue(':description', $request['description']) && $this->_req->bindValue(':price', $request['price']) && $this->_req->bindValue(':date', $request['date'])) && $this->_req->bindValue(':id', $request['id'])) {
                    if ($this->_req->execute()) {
                        $res = $this->getDb()->lastInsertId();
                        return $res;
                    }
                }
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteMaintenance($request)
    {
        $sql = "DELETE FROM maintenance WHERE mai_id = :id";
        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $request['id'], PDO::PARAM_INT)) {
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
        $sql = "SELECT mai_id,typ_label as mai_name, mai_description, mai_photo, mai_price, mai_date, mai_carId, bra_label AS car_brand, mod_label AS car_model, car_kilometers 
                FROM maintenance 
                JOIN car  ON mai_carId = car_id 
                JOIN brand ON car_brandId = bra_id
                JOIN model ON car_modelId = mod_id
                JOIN type ON mai_typeId = typ_id
                WHERE mai_id = :id ";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        $data = $this->_req->fetch(PDO::FETCH_ASSOC);
                        return $data;
                    }
                }
            }
        } catch (PDOException $e) {
            die ($e->getMessage());
        }
    }

    public function readAll($id)
    {
        $sql = "SELECT mai_id,typ_label AS mai_name, mai_description, mai_photo, mai_price, mai_date,  mai_carId,bra_label AS car_brand,mod_label AS car_model , car_kilometers
                FROM `maintenance` 
                JOIN car  ON mai_carId = car_id
                JOIN brand ON car_brandId = bra_id
                JOIN model ON car_modelId = mod_id
                JOIN user_ ON car_useId = use_id
                JOIN type ON mai_typeId = typ_id
                WHERE use_id = :id OR mai_carId = :id";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        $data = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                        return $data;
                    }
                }
            }
            return false;

        } catch (PDOException $e) {
            die ($e->getMessage());
        }

    }

    public function update($request)
    {
        $sql = "UPDATE maintenance
        SET mai_name = :name, mai_description = :description, mai_photo = :photo, mai_price = :price, mai_date = :date
        WHERE mai_id = :id";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                $this->_req->bindValue(':id', $request['id'], PDO::PARAM_INT);
                $this->_req->bindValue(':name', $request['name'], PDO::PARAM_STR);
                $this->_req->bindValue(':description', $request['description'], PDO::PARAM_STR);
                $this->_req->bindValue(':photo', $request['photo'], PDO::PARAM_STR);
                $this->_req->bindValue(':price', $request['price'], PDO::PARAM_INT);
                $this->_req->bindValue(':date', $request['date'], PDO::PARAM_STR);
                if ($this->_req->execute()) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            die ($e->getMessage());
        }
    }

    public function getLastMaintenance($id)
    {
        $sql = "SELECT mai_id,typ_label AS mai_name, mai_description, mai_photo, mai_price, mai_date, mai_carId, car_brandId, car_modelId, car_kilometers
            FROM maintenance 
            JOIN car 
            ON mai_carId = car_id 
            JOIN type ON mai_typeId = typ_id
            WHERE car_id = :id 
            ORDER BY mai_date 
            DESC LIMIT 1";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        $data = $this->_req->fetch(PDO::FETCH_ASSOC);
                        return $data;
                    }
                }
            }
        } catch (PDOException $e) {
            die ($e->getMessage());
        }
    }

}