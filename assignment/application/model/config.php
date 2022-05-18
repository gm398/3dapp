<?php

function dbConnection()
{
    try {
        return new PDO('sqlite:../../db/info.db');
    } catch (PDOException $e) {
        return "Connection Failed: " . $e->getMessage();
    }
}