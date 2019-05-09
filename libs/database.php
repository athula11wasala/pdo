<?php

class database {

    protected $connection;
    private $datatabae = "netstart";
    private $server = "localhost";
    private $username = "root";
    private $password = "";

    public function __construct() {

        try {
            $this->connection = new PDO("mysql:host={$this->server};dbname={$this->datatabae}", $this->username, $this->password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function __destruct() {

        if ($this->connection) {
            $this->connection = null;
        }
    }

}
