<?php

function dbConnection()
{
    try {
        $conn =  new PDO('sqlite:../../db/info.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        return "Connection Failed: " . $e->getMessage();
    }
}