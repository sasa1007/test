<?php

include_once 'Database.php';
include_once 'Helpers.php';

if ($_POST) {
    $database = new Database();
    $databaseName = $_POST['dbName'];
    $database->newDatabase($databaseName);
    $conn = $database->connectToDataBase($databaseName);
    $helpers = new Helpers();
    $createTableSql = $helpers->createTable($databaseName);
    $createSeed = $helpers->createSeed($databaseName, TRUE,  FALSE, $databaseName);


    if ($conn->query($createTableSql)) {
        echo 'createTable' . "<br>";
        for ($i = 1; $i <= 10; $i++) {
            if ($conn->query($createSeed) === TRUE) {
                echo "New record created successfully" . "<br>";
            } else {
                echo "Error: " ;
            }
        }
    } else {
        echo 'not created table: ';
    }

    $conn->close();
};




