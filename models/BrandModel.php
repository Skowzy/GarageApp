<?php

class BrandModel extends CoreModel
{
    private $_req;

    /**
     * @return array|false|void
     */
    public function readAll()
    {
        $sql = "SELECT * FROM brand";

        try {
            if ($this->_req = $this->getDb()->prepare($sql)) {
                if ($this->_req->execute()) {
                    $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                    return $datas;
                }
            }
            return false;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function readOne($id)
    {
        $sql = "SELECT * FROM brand WHERE bra_id = :id";

        try {
            if ($this->_req = $this->getDb()->prepare($sql)) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        $datas = $this->_req->fetch(PDO::FETCH_ASSOC);
                        return $datas;
                    }
                }
            }
            return false;
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function create($request)
    {
        $sql = "INSERT INTO brand (bra_label) VALUES(:label)";

        try {
            if ($this->_req = $this->getDb()->prepare($sql)) {
                if ($this->_req->bindValue(':label', $request['label'])) {
                    if ($this->_req->execute()) {
                        return true;
                    }
                }
            }
            return false;
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM brand WHERE bra_id = :id";

        try {
            if ($this->_req = $this->getDb()->prepare($sql)) {
                if ($this->_req->bindValue(':id', $id, PDO::PARAM_INT)) {
                    if ($this->_req->execute()) {
                        return true;
                    }
                }
            }
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

}