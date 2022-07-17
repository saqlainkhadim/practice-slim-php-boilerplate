<?php


class db
{
    private $host='localhost';
    private $user='root';
    private $pasword='';
    private $dbname='slim_first_project';


    public function connect(): string
    {
        $conn_str="mysql:host=$this->host;dbname=$this->dbname";
        $conn= new PDO($conn_str,$this->user,$this->pasword);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return  $conn;
    }

}