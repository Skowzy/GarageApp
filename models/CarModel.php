<?php


class CarModel extends CoreModel
{
    private $_req;

    /**
     * @param $request
     * @param $id
     * @return false|string
     */
    public function createCar($request)
    {
        $sql = "INSERT INTO car (car_brand, car_model, car_year, use_id) VALUES (:brand, :model, :year, :id)";

        try {
            $this->_req = $this->getDb()->prepare($sql);

            if ($this->_req) {
                $this->_req->bindValue(':brand', $request['brand'], PDO::PARAM_STR);
                $this->_req->bindValue(':model', $request['model'], PDO::PARAM_STR);
                $this->_req->bindValue(':year', $request['year'], PDO::PARAM_INT);
                $this->_req->bindValue(':id', $request['id'], PDO::PARAM_INT);

                if ($this->_req->execute()) {
                    return $this->getDb()->lastInsertId();
                }
            }
            return false; // Retour explicite en cas d'échec
        } catch (PDOException $e) {
            echo "Erreur SQL : " . $e->getMessage();
            return false;
        }
    }

    public function viewCars($id)
    {
        $sql = "SELECT * FROM car WHERE use_id = :id";
        try {
            if ($this->_req = $this->getDb()->prepare($sql)) {
                if (($this->_req->bindValue(':id', $id, PDO::PARAM_STR))) {
                    if (($this->_req->execute()) !== false) {
                        $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                        return $datas;
                    }
                }
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}