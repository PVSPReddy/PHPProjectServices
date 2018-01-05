<?php

class GetConnectionService
{
    function getConnection()
    {
        $servername = "den1.mysql1.gear.host";
        $username = "countriesdb";
        $password = "Siv@123";
        $dbName = "countriesdb";
        $host = 3306;

        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}

?>
