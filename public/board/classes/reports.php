<?php

class Reports extends DatabaseConnect
{
    private $today;
    private $err_array;
    private $result;
    public function __construct()
    {
        $this->err_array = array();
        $this->result = array();
        date_default_timezone_set('Asia/Kolkata');
        $this->today = date('Y-m-d', time());
    }
    public function last_benches($lim = 200): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $sql = "SELECT * FROM `bench` ORDER BY court_no DESC LIMIT :lim";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':lim', $lim, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return true;
            }
        } catch (PDOException $e) {
            array_push($this->err_array, 'Error sql operation');
        }
        return false;
    }

    public function total_cases($date = null): bool
    {
        $this->err_array = array();
        if (empty($date)) {
            $date = $this->today;
        }
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT SUM(`c_cases`) AS `total` FROM `causelist` WHERE `c_date` = :today";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':today', $date, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function causelist_total($date = null): bool
    {
        $this->err_array = array();
        if (empty($date)) {
            $date = $this->today;
        }
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $sql = "SELECT COUNT(`c_id`) AS `total` FROM `causelist` WHERE `c_date` = :date";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
                return true;
            }
        } catch (PDOException $e) {
            array_push($this->err_array, 'Error sql operation');
        }
        return false;
    }

    public function proceeding_details($stat, $cl_id): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $sql = "SELECT COUNT(`case_status`) AS `total` FROM `cases` WHERE `case_status` = :stat AND `cl_id` = :cl_id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
            $stmt->bindParam(':stat', $stat, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
                return true;
            }
        } catch (PDOException $e) {
            array_push($this->err_array, 'Error sql operation');
        }
        return false;
    }

    public function proceeding_details_all($stat, $date = null): bool
    {
        $this->err_array = array();
        if (empty($date)) {
            $date = $this->today;
        }
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $sql = "SELECT COUNT(`case_status`) AS `total` FROM `causelist` INNER JOIN `cases` ON `cl_id` = `c_id` WHERE `case_status` = :stat AND `c_date` = :date";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':stat', $stat, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
                return true;
            }
        } catch (PDOException $e) {
            array_push($this->err_array, 'Error sql operation');
        }
        return false;
    }

    public function get_result(): array
    {
        return $this->result;
    }
    public function get_err_array(): array
    {
        return $this->err_array;
    }
}
