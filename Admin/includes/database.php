<?php

require_once("new_config.php");

class Database {

    public $connection;

    function __construct() {
        $this->open_db_connection();
    }

    public function open_db_connection(){
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($this->connection->connect_errno) {
            die("database failed" . $this->connection->connect_errno);
        }
    }

    public function query($sqli) {
        $result = $this->connection->query($sqli);
        $this->comfirm_query($sqli);
        return $result;
    }

    private function comfirm_query($result) {
        if(!$result) {
            die("Query Failed" . $this->connection->error);
        }
    }

    public function escape_string($string) {
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }

    public function the_insert_id() {
        return mysqli_insert_id($this->connection);
    }

}

$database = new Database();

?>