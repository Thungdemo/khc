<?php

class DatabaseConnect
{
    private $logs;
    private $connection;
    public function connect(): bool
    {
        $this->logs = array();
        $dbhost = "localhost";
        $db = 'display';
        $dbuser = 'root';
        $dbpass = '';
        /* $dbhost = "localhost";
        $db = 'u421469512_rtihcnl';
        $dbuser = 'u421469512_admin';
        $dbpass = '#Nimda#23'; */
        try {
            $this->connection = new PDO("mysql:host=$dbhost;dbname=$db", "$dbuser", "$dbpass");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $error) {
            $this->logs = " OPPS : :D " . $error;
            return false;
        }
        return false;
    }
    public function get_connection()
    {
        return $this->connection;
    }
    public function get_logs_databaseconnect(): string
    {
        return $this->logs;
    }
}
