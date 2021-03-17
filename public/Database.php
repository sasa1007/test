<?php


class Database
{
    private $host = 'mysql';
    private $port = '3306';
    private $user = 'root';
    private $pass = 'rootpassword';


    public function connectToDataBase($db)
    {
        $conn = new mysqli($this->host, $this->user, $this->pass, $db) or die("Connect failed: %s\n". $conn -> error);

        return $conn;

    }


    public function connect()
    {
        $conn = new mysqli($this->host, $this->user, $this->pass) or die("Connect failed: %s\n". $conn -> error);

        return $conn;

    }


    public function newDatabase($db)
    {
        $conn = $this->connect();


        if ('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME != $db') {
            $sqlDb = "CREATE DATABASE $db";
            if ($conn->query($sqlDb)) {
                echo 'database created ' . $db . "<br>";
//                $this->connectToDataBase($db);
            } else {
                echo $db . ' source is not created';
            }
        } else {
            echo $db . ' source is already created';
        }
    }


//    public function newDatabase($db)
//    {
//        $this->connect();
//        if ($this->dbConnection->('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME != $db')) {
//            $sqlDb = "CREATE DATABASE $db";
//            if ($this->dbConnection->query($sqlDb)) {
//                echo 'database created ' . $db . "<br>";
//                $this->connectToDataBase($db);
//            } else {
//                echo $db . 'source is not created';
//            }
//        } else {
//            echo $db . 'source is already created';
//        }
//    }

//    public function connect()
//    {
//
//
//        $dbConnection = new mysqli($this->host, $this->user, $this->pass);
//        if ('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME != $this->db') {
//            $sqlDb = "CREATE DATABASE $this->db";
//            if ($dbConnection->query($sqlDb)) {
//                echo 'database created ' . $this->db . "<br>";
//                $dbConnection = new mysqli($host, $user, $pass, $this->db, $port);
//            } else {
//                $dbConnection = new mysqli($host, $user, $pass, $this->db, $port);
//            }
//        } else {
//
//        }
//
//
////        $dbConnection = new mysqli($host, $user, $pass, $this->db, $port);
////
//        if ($dbConnection->connect_error) {
//            die("Connection failed: " . $dbConnection->connect_error);
//        } else {
//
//        }
//        return $dbConnection;
//    }

}
