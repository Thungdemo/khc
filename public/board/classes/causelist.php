<?php

class Causelist extends DatabaseConnect
{
    private $err_array;
    private $result;
    private $today;
    public function __construct()
    {
        $this->err_array = array();
        $this->result = array();
        date_default_timezone_set('Asia/Kolkata');
        $this->today = date('Y-m-d', time());
    }

    public function display_switch($cl_id, $status): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $sql = "UPDATE `causelist` SET `display` = :stat WHERE `c_id` = :cl_id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
            $stmt->bindParam(':stat', $status, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            array_push($this->err_array, 'Error sql operation');
        }
        return false;
    }

    public function get_causelist_details($cause_id): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT * FROM `causelist` INNER JOIN `causetype` ON `ct_number` = `c_type` INNER JOIN `bench` ON `court_no` = `c_bench` WHERE `c_id` = :c_id ORDER BY `c_date` DESC";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':c_id', $cause_id, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($this->result == false) {
                        $this->result = array();
                    }
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function view_causelist($date = null): bool
    {
        $this->err_array = array();
        if (empty($date)) {
            $date = $this->today;
        }
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT *, DATE_FORMAT(`c_date`,'%d-%m-%Y') as `c_date_formatted` FROM `causelist` INNER JOIN `causetype` ON `ct_number` = `c_type` INNER JOIN `bench` ON `court_no` = `c_bench` WHERE `c_date` = :today ORDER BY `c_number` ASC";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':today', $date, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function view_causelist_bench($date = null, $bench): bool
    {
        $this->err_array = array();
        if (empty($date)) {
            $date = $this->today;
        }
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT * FROM `causelist` INNER JOIN `causetype` ON `ct_number` = `c_type` INNER JOIN `bench` ON `court_no` = `c_bench` WHERE `c_date` = :today AND `c_bench` = :cbench ORDER BY `c_number` ASC";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':today', $date, PDO::PARAM_STR);
                $stmt->bindParam(':cbench', $bench, PDO::PARAM_INT);
                if ($stmt->execute()) {
                    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function view_causelist_future(): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT *, DATE_FORMAT(`c_date`,'%d-%m-%Y') as `c_date_formatted` FROM `causelist` INNER JOIN `causetype` ON `ct_number` = `c_type` INNER JOIN `bench` ON `court_no` = `c_bench` WHERE `c_date` >= CURDATE() ORDER BY `c_date` DESC";
                $stmt = $con->prepare($sql);
                if ($stmt->execute()) {
                    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function view_causelist_all(): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT *, DATE_FORMAT(`c_date`,'%d-%m-%Y') as `c_date_formatted` FROM `causelist` INNER JOIN `causetype` ON `ct_number` = `c_type` INNER JOIN `bench` ON `court_no` = `c_bench` ORDER BY `c_date` DESC";
                $stmt = $con->prepare($sql);
                if ($stmt->execute()) {
                    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function deleteData($cl_id): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $sql = "DELETE FROM `causelist` WHERE `c_id` = :cl_id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            array_push($this->err_array, 'Error sql operation');
        }
        return false;
    }

    public function delete_before($date): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $sql = "DELETE FROM `causelist` WHERE `c_date` <= :cdate";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':cdate', $date, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            array_push($this->err_array, 'Error sql operation');
        }
        return false;
    }

    public function deleteAllData(): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $sql = "DELETE FROM `causelist`";
            $stmt = $con->prepare($sql);
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            array_push($this->err_array, 'Error sql operation');
        }
        return false;
    }
    public function get_err_array(): array
    {
        return $this->err_array;
    }
    public function get_result(): array
    {
        return $this->result;
    }
}
