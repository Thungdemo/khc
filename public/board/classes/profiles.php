<?php

class Profiles extends DatabaseConnect
{
    private $result;
    private $err_array;
    public function __construct()
    {
        $this->result = array();
    }
    public function authenticate($user, $pass)
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $pass = sha1($pass);
                $sql = "SELECT * FROM `profiles` WHERE `user_name` = :uname AND `user_pass` = :upass";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':uname', $user, PDO::PARAM_STR);
                $stmt->bindParam(':upass', $pass, PDO::PARAM_STR);
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($res) {
                    $_SESSION['user_data'] = array();
                    $_SESSION['user_data']['username'] = $res['user_fullname'];
                    $_SESSION['user_data']['userid'] = $res['user_id'];
                    $_SESSION['user_data']['userrole'] = $res['user_role'];
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function add_user($u_name, $u_fullname, $u_pass, $u_role, $u_details): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "INSERT INTO `profiles`(`user_fullname`, `user_name`,`user_pass`, `user_role`, `user_details`) VALUES(:ufullname,:uname,:upass,:urole,:udetails)";
                $u_pass = sha1($u_pass);
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':ufullname', $u_fullname, PDO::PARAM_STR);
                $stmt->bindParam(':uname', $u_name, PDO::PARAM_STR);
                $stmt->bindParam(':upass', $u_pass, PDO::PARAM_STR);
                $stmt->bindParam(':urole', $u_role, PDO::PARAM_INT);
                $stmt->bindParam(':udetails', $u_details, PDO::PARAM_STR);
                if($stmt->execute()){
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function update_user($uid, $u_fullname, $u_name, $u_pass, $u_role, $u_details): bool
    {
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                if (empty($u_pass)) {
                    $sql = "UPDATE `profiles` SET `user_fullname` = :ufullname, `user_name` = :uname, `user_role` = :urole, `user_details` = :udetails WHERE `user_id` = :userid";
                    $stmt = $con->prepare($sql);
                } else {
                    $u_pass = sha1($u_pass);
                    $sql = "UPDATE `profiles` SET `user_fullname` = :ufullname, `user_name` = :uname, `user_pass` = :upass, `user_role` = :urole, `user_details` = :udetails WHERE `user_id` = :userid";
                    $stmt = $con->prepare($sql);
                    $stmt->bindParam(':upass', $u_pass, PDO::PARAM_STR);
                }
                $stmt->bindParam(':userid', $uid, PDO::PARAM_INT);
                $stmt->bindParam(':ufullname', $u_fullname, PDO::PARAM_STR);
                $stmt->bindParam(':uname', $u_name, PDO::PARAM_STR);
                $stmt->bindParam(':urole', $u_role, PDO::PARAM_INT);
                $stmt->bindParam(':udetails', $u_details, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    return true;
                }
            } catch (PDOException $e) {
                //die($e->getMessage());
            }
        }
        return false;
    }

    public function get_users(): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT * FROM `profiles`";
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

    public function get_user_details($id): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "SELECT * FROM `profiles` WHERE `user_id` = :userid";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':userid', $id, PDO::PARAM_INT);
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

    public function delete_user($id): bool
    {
        $this->err_array = array();
        $db = new DatabaseConnect();
        if ($db->connect()) {
            $con = $db->get_connection();
            try {
                $sql = "DELETE FROM `profiles` WHERE `user_id` = :userid";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':userid', $id, PDO::PARAM_INT);
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
}
