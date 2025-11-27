<?php

class Cases extends DatabaseConnect
{
    private $err_array;
    private $result;
    public function __construct()
    {
        $this->err_array = array();
        $this->result = array();
    }

    public function get_cases($cause_id): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT * FROM `cases` INNER JOIN `casestatus` ON `s_id` = `case_status` INNER JOIN `profiles` ON `user_id` = `by_user` WHERE `cl_id` = :cause_id ORDER BY `case_sn` ASC";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':cause_id', $cause_id, PDO::PARAM_INT);
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

    public function set_casestatus_bench($status, $cause_id, $uid): bool
    {
        $daily_bench = array();
        $causelist = new Causelist();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
        }
        if ($causelist->get_causelist_details($cause_id)) {
            $res = $causelist->get_result();
            $bench_id = $res['c_bench'];
            if ($causelist->view_causelist_bench(null, $bench_id)) {
                $daily_bench = $causelist->get_result();
                try {
                    foreach ($daily_bench as $cl) {
                        if ($status == 3) {
                            $causeid = $cl['c_id'];
                            $sql = "UPDATE `cases` SET `case_status` = 4, `by_user` = :userid WHERE `case_status` = 3 AND `cl_id` = $causeid";
                            $stmt = $con->prepare($sql);
                            $stmt->bindParam(':userid', $uid, PDO::PARAM_INT);
                            if ($stmt->execute()) {
                            } else {
                                return false;
                            }
                        }
                    }
                } catch (PDOException $e) {
                    //die($e->getMessage());
                    return false;
                }
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function set_casestatus($item, $status, $cause_id, $uid): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "UPDATE `cases` SET `case_status`= :status, `by_user` = :userid WHERE `case_sn` = :item AND `cl_id` = :causeid";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':userid', $uid, PDO::PARAM_INT);
                $stmt->bindParam(':status', $status, PDO::PARAM_INT);
                $stmt->bindParam(':item', $item, PDO::PARAM_INT);
                $stmt->bindParam(':causeid', $cause_id, PDO::PARAM_INT);
                if ($stmt->execute()) {
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function set_call_all_cases($causelist, $uid): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "UPDATE `cases` SET `case_status`= 2, `by_user` = :userid WHERE `cl_id` = :causeid";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':userid', $uid, PDO::PARAM_INT);
                $stmt->bindParam(':causeid', $causelist, PDO::PARAM_INT);
                if ($stmt->execute()) {
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function set_complete_all_cases($causelist, $uid): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "UPDATE `cases` SET `case_status`= 4, `by_user` = :userid WHERE `cl_id` = :causeid";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':userid', $uid, PDO::PARAM_INT);
                $stmt->bindParam(':causeid', $causelist, PDO::PARAM_INT);
                if ($stmt->execute()) {
                    return true;
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
