<?php
class Validator
{
    private $err_array;
    public function __construct()
    {
        $this->err_array = array();
    }

    public function valid($x)
    {
        return trim(htmlspecialchars(stripslashes($x)));
    }

    public function valid_user($text): bool
    {
        $flag = 0;
        $this->err_array = array();
        if (empty($text)) {
            $flag = 0;
            array_push($this->err_array, 'Username cannot be empty');
        } else {
            $flag++; //1
        }
        if (strlen($text) < 3 || strlen($text) > 100) {
            $flag = 0;
            array_push($this->err_array, 'Username must be between 3 to 100 characters long');
        } else {
            $flag++; //2
        }
        if (preg_match('/^[a-zA-Z0-9]+$/', $text)) {
            $flag++; //3
        } else {
            $flag = 0;
            array_push($this->err_array, 'Username must contain only alphanumeric characters and spaces');
        }
        if ($flag >= 3) {
            return true;
        }
        return false;
    }

    public function valid_password($pass): bool
    {
        $flag = 0;
        $this->err_array = array();
        if (strlen($pass) < 7 || strlen($pass) > 20) {
            $flag = 0;
            array_push($this->err_array, 'Password must be between 7 to 20 characters long');
        } else {
            $flag++;
        }
        if (!preg_match('/[0-9]/', $pass)) {
            $flag = 0;
            array_push($this->err_array, 'Password must contain at least one digit');
        } else {
            $flag++;
        }
        if ($flag >= 2) {
            return true;
        }
        return false;
    }

    public function get_err_array(): array
    {
        return $this->err_array;
    }
}
