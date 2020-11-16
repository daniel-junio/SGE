<?php

namespace App\Db;

class conexao{

private string $server = "localhost";
private string $user = "root";
private string $pass = "homolog";
private string $db = "escola";
private $con;

    public function __construct()
    {
        $this->connect();
    }
    private function connect()
    {
        $this->con = mysqli_connect($this->server,$this->user,$this->pass,$this->db);
    }
    public function getConnection()
    {
        return $this->con;
    }
}