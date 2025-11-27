<?php

class Board extends DatabaseConnect
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
    //display board
    public function view_by_date($case_status = 3, $date = null): bool
    {
        $this->err_array = array();
        if (empty($date)) {
            $date = $this->today;
        }
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                if ($case_status == 3) {
                    $sql = "SELECT `c_number`,`ct_name`,`case_sn`,`case_name`,`case_regno`,`case_year`,`case_remarks`,`s_id`,`s_status` FROM `causelist` INNER JOIN `causetype` ON `ct_number` = `c_type` INNER JOIN `cases` ON `c_id` = `cl_id` INNER JOIN `casestatus` ON `case_status` = `s_id` WHERE `case_status` = 3 AND `c_date` = :today ORDER BY `c_number` ASC";
                    $stmt = $con->prepare($sql);
                    $stmt->bindParam(':today', $date, PDO::PARAM_STR);
                    if ($stmt->execute()) {
                        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return true;
                    }
                } else {
                    $sql = "SELECT `c_number`,`ct_name`,`case_sn`,`case_name`,`case_regno`,`case_year`,`s_id`,`s_status` FROM `causelist` INNER JOIN `causetype` ON `ct_number` = `c_type` INNER JOIN `cases` ON `c_id` = `cl_id` INNER JOIN `casestatus` ON `case_status` = `s_id` WHERE `c_date` = :today ORDER BY `c_number` ASC";
                    $stmt = $con->prepare($sql);
                    $stmt->bindParam(':today', $date, PDO::PARAM_STR);
                    if ($stmt->execute()) {
                        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return true;
                    }
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function allowed_ip(): bool
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $client = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            $client = $_SERVER['REMOTE_ADDR'];
        }
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT `ip_allow` FROM `iplist`;";
                $stmt = $con->prepare($sql);
                if ($stmt->execute()) {
                    $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($tmp as $i){
                        if(strcmp($i['ip_allow'], $client) == 0){
                            return true;
                        }
                    }
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
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
