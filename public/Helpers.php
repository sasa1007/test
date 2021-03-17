<?php


class Helpers
{
    public function createSeed($site,  $googleAnalytics, $positiveGuys, $databaseName)
    {
        $sql = "INSERT INTO $databaseName (`site`, `GoogleAnalytics`, `PositiveGuys`) 
                VALUES ('$site', '$googleAnalytics' , '$positiveGuys' )";
        return $sql;
    }

    public function createTable($table)
    {
        $createTableSql = "CREATE TABLE $table (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    site varchar(255),
                    GoogleAnalytics boolean DEFAULT false,
                    PositiveGuys boolean DEFAULT false,
                    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";

        return $createTableSql;
    }

    public function getAllDataBases()
    {
        $sql = "SELECT schema_name FROM information_schema.schemata WHERE schema_name
            NOT IN ('information_schema', 'mysql', 'performance_schema')";
        return $sql;
    }

}