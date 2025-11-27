<?php

class Import extends DatabaseConnect
{
    private $err_array;
    public function __construct()
    {
        $this->err_array = array();
    }
    public function uploadJson($user, $file, $remarks): bool
    {
        $flag = 0;
        $this->err_array = array();
        $f_dir = 'uploads/';
        if (!file_exists($f_dir)) {
            mkdir($f_dir, 0777, true);
        }
        if (!($file["type"] == "application/json")) {
            $flag = 0;
            array_push($this->err_array, 'Json format only');
        } else {
            $flag++;
        }
        if ($file["size"] > 2097152) {
            array_push($this->err_array, 'File too large (max size 2 MB)');
            $flag = 0;
        } else {
            $flag++;
        }
        if ($flag < 2) {
            //error file was not uploaded
        } else {
            $parts = explode('_', $file['name']);
            $newaddfile = $f_dir . $file['name'];
            if ($this->check_causelist($parts[2], $parts[3], $parts[4])) {
                if (move_uploaded_file($file["tmp_name"], $newaddfile)) {
                    /*
                    0 - court
                    1 - 1
                    2 - 2025-05-26
                    3 - 1853
                    4 - 1001
                    */
                    if ($this->importJson($user, $parts[1], $parts[2], $parts[3], $parts[4], $remarks, $newaddfile)) {
                        return true;
                    }
                } else {
                    array_push($this->err_array, 'Failed to upload');
                }
            } else {
                return false;
            }
        }
        return false;
    }

    public function uploadJsonBench($file): bool
    {
        $flag = 0;
        $this->err_array = array();
        $f_dir = 'uploads/';
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            if (!file_exists($f_dir)) {
                mkdir($f_dir, 0777, true);
            }
            if (!($file["type"] == "application/json")) {
                $flag = 0;
                array_push($this->err_array, 'Json format only');
            } else {
                $flag++;
            }
            if ($file["size"] > 2097152) {
                array_push($this->err_array, 'File too large (max size 2 MB)');
                $flag = 0;
            } else {
                $flag++;
            }
            if ($flag < 2) {
                //error file was not uploaded
            } else {
                $newaddfile = $f_dir . $file['name'];
                if (move_uploaded_file($file["tmp_name"], $newaddfile)) {
                    if (file_exists($newaddfile)) {
                        $arr = json_decode(file_get_contents($newaddfile), true);
                        if (unlink($newaddfile)) {
                        }
                    }
                    foreach ($arr as $x) {
                        $court_no = $x['court_no'];
                        $bench_type_code = $x['bench_type_code'];
                        $bench_desc = $x['bench_desc'];
                        $cfrom_dt = $x['cfrom_dt'];
                        $roaster_desc = $x['roaster_desc'];
                        $sql = "INSERT INTO `bench`(`court_no`,`bench_type_code`,`bench_desc`,`cfrom_dt`,`roaster_desc`) VALUES($court_no,$bench_type_code,'$bench_desc','$cfrom_dt','$roaster_desc') ON DUPLICATE KEY UPDATE `bench_type_code` = VALUES(`bench_type_code`),`bench_desc` = VALUES(`bench_desc`), `cfrom_dt` = VALUES(`cfrom_dt`), `roaster_desc` = VALUES(`roaster_desc`)";
                        $stmt = $con->prepare($sql);
                        if ($stmt->execute()) {
                        } else {
                            return false;
                        }
                    }
                    return true;
                } else {
                    array_push($this->err_array, 'Failed to upload');
                }
            }
        } catch (Exception $e) {
            array_push($this->err_array, 'Error file operation');
            return false;
        }
        return false;
    }

    private function importJson($user, $court_no, $causelist_date, $for_bench, $type, $remarks, $file): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $arr = json_decode(file_get_contents($file), true);
            $total = count($arr);
        } catch (Exception $e) {
            array_push($this->err_array, 'Error file operation');
            return false;
        }
        try {
            $c_id = 0;
            $sql = "INSERT INTO `causelist`(`u_id`,`c_number`,`c_date`,`c_type`,`c_bench`,`c_cases`,`c_remarks`) VALUES(:u_id,:cnumber,:cdate,:ctype,:cbench,:c_total,:cremarks)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':u_id', $user, PDO::PARAM_INT);
            $stmt->bindParam(':cnumber', $court_no, PDO::PARAM_INT);
            $stmt->bindParam(':cdate', $causelist_date, PDO::PARAM_STR);
            $stmt->bindParam(':ctype', $type, PDO::PARAM_INT);
            $stmt->bindParam(':cbench', $for_bench, PDO::PARAM_INT);
            $stmt->bindParam(':c_total', $total, PDO::PARAM_INT);
            $stmt->bindParam(':cremarks', $remarks, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $c_id = $con->lastInsertId();
                if ($c_id != 0) {
                    $counter = 0;
                    foreach ($arr as $x) {
                        $c_sr = $x['sr_no'];
                        $c_tn = $x['type_name'];
                        $c_rn = $x['cause_reg_no'];
                        $c_ry = $x['cause_reg_year'];
                        $c_ci = $x['cino'];
                        $c_re = $x['case_remark'];
                        $sql = "INSERT INTO `cases`(`cl_id`,`case_sn`,`case_name`,`case_regno`,`case_year`,`case_cino`,`by_user`,`case_remarks`) VALUES('$c_id','$c_sr','$c_tn','$c_rn','$c_ry','$c_ci','$user','$c_re')";
                        $stmt = $con->prepare($sql);
                        if ($stmt->execute()) {
                        } else {
                            array_push($this->err_array, 'Error importing cases');
                        }
                        $counter++;
                    }
                    if (file_exists($file)) {
                        if (unlink($file)) {
                        } else {
                            array_push($this->err_array, 'failed to remove file');
                        }
                    } else {
                        array_push($this->err_array, 'file not found');
                    }
                    if ($counter == $total) {
                        return true;
                    } else {
                        array_push($this->err_array, ' Error : some case import failed');
                    }
                }
            }
        } catch (PDOException $e) {
            array_push($this->err_array, 'Error sql operation');
        }
        return 0;
    }
    private function check_causelist($causelist_date, $for_bench, $ctype): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        } else {
            return false;
        }
        try {
            $sql = "SELECT `c_date`,`c_type`,`c_bench` FROM `causelist` WHERE `c_date` = :cdate AND `c_bench`= :cbench AND`c_type` = :ctype";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':cdate', $causelist_date, PDO::PARAM_STR);
            $stmt->bindParam(':ctype', $ctype, PDO::PARAM_INT);
            $stmt->bindParam(':cbench', $for_bench, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $res = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($res) {
                    array_push($this->err_array, 'Duplicate Entry');
                    return false;
                } else {
                    return true;
                }
            }
        } catch (Exception $e) {
            array_push($this->err_array, 'Error db');
            return false;
        }
        return false;
    }
    public function get_err_array(): array
    {
        return $this->err_array;
    }
}
