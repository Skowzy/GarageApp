<?php


class CarModel extends CoreModel
{
    private $_req;

    /**
     * @param $request
     * @return false|string
     */
    public function createCar($request) : false | string
    {
        $sql = "INSERT INTO car (car_brand, car_model, car_year,car_kilometers,car_fuelType,car_licensePlate, use_id) 
                VALUES (:brand, :model, :year, :kilometers, :fuelType, :licensePlate, :id )";

        try {
            $this->_req = $this->getDb()->prepare($sql);

            if ($this->_req) {
                $this->_req->bindValue(':brand', $request['brand'], PDO::PARAM_STR);
                $this->_req->bindValue(':model', $request['model'], PDO::PARAM_STR);
                $this->_req->bindValue(':year', $request['year'], PDO::PARAM_INT);
                $this->_req->bindValue(':kilometers', $request['kilometers'], PDO::PARAM_INT);
                $this->_req->bindValue(':fuelType', $request['fuelType'], PDO::PARAM_STR);
                $this->_req->bindValue(':licensePlate', $request['licensePlate'], PDO::PARAM_STR);
                $this->_req->bindValue(':id', $request['id'], PDO::PARAM_INT);

                if ($this->_req->execute()) {
                    return $this->getDb()->lastInsertId();
                }
            }
            return false;
        } catch (PDOException $e) {
            echo "Erreur SQL : " . $e->getMessage();
            return false;
        }
    }

    /**
     * @param $id
     * @return array|false|void
     */
    public function viewCars($id)
    {
        $sql = "SELECT car_id, bra_label, mod_label, car_year,car_kilometers, CONCAT(use_firstname, ' ', use_lastname) AS use_fullname
                FROM car
                JOIN user_ ON car.use_id = user_.use_id
                JOIN brand ON car_brandId = bra_id
                JOIN model ON car_modelId = mod_id
                WHERE car.use_id = :id";

        try {
            if ($this->_req = $this->getDb()->prepare($sql)) {
                if (($this->_req->bindValue(':id', $id, PDO::PARAM_STR))) {
                    if (($this->_req->execute()) !== false) {
                        $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                        return $datas;
                    }

                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @return array|false
     */
    public function listCars() : array | false
    {
        $sql = "
                SELECT car_id, bra_label, mod_label, car_year, CONCAT(use_firstname, ' ', use_lastname) AS use_fullname
                FROM car
                JOIN user_ ON car_useId = user_.use_id
                JOIN model ON car_modelId = mod_id
                JOIN brand ON car_brandId = brand.bra_id
                ";
        try {

            if (($this->_req = $this->getDb()->query($sql)) !== false) {
                $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                return $datas;
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());

        }
    }

    /**
     * @param $id
     * @return bool|void
     */
    public function deleteCar($id)
    {
        $sql = "DELETE FROM car WHERE car_id = :id";
        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        return true;
                    }
                    return false;
                }
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return false|mixed|void
     */
    public function readOne($id)
    {
        $sql = "SELECT car_id, mod_label, bra_label, car_year, car_kilometers, car_fuelType, car_licensePlate, car_notes 
                FROM car 
                JOIN model ON car_modelId = mod_id
                JOIN brand ON car_brandId = brand.bra_id
                WHERE car_id = :id ";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        $data = $this->_req->fetch(PDO::FETCH_ASSOC);
                        return $data;
                    } else {
                        return false;
                    }
                }
            }
        } catch (PDOException $e) {
            die ($e->getMessage());

        }
    }

    /**
     * @param $request
     * @return bool|void
     */
    public function updateCar($request)
    {
        $sql = "UPDATE car
                SET car_brand = :brand, car_model = :model, car_year = :year, car_kilometers = :kilometers, car_fuelType = :fuelType,car_licensePlate = :licensePlate, car_notes = :notes
                WHERE car_id = :id";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                $this->_req->bindValue(':brand', $request['brand'], PDO::PARAM_STR);
                $this->_req->bindValue(':model', $request['model'], PDO::PARAM_STR);
                $this->_req->bindValue(':year', $request['year'], PDO::PARAM_INT);
                $this->_req->bindValue(':kilometers', $request['kilometers'], PDO::PARAM_INT);
                $this->_req->bindValue(':fuelType', $request['fuelType'], PDO::PARAM_STR);
                $this->_req->bindValue(':licensePlate', $request['licensePlate'], PDO::PARAM_STR);
                $this->_req->bindValue(':notes', $request['notes'], PDO::PARAM_STR);
                $this->_req->bindValue(':id', $request['id'], PDO::PARAM_INT);
                if ($this->_req->execute()) {
                    return true;
                }
                return false;
            }
        } catch (PDOException $e) {
            die ($e->getMessage());
        }
    }

}