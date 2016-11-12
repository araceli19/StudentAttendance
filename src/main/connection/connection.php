<?php

    function getDatabaseConnection(){
    $host= "localhost";
    //$host = "127.0.0.1";
    $dbname = "studentdb";
    $username = "user2";
    $password = "123";

        //create new connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        //setting errorhndling 
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $dbConn;
    }

?>