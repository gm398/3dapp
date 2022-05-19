<?php
include_once "../model/config.php";
$dbhandle = NULL;
$cardData = NULL;
$titleData = NULL;
// Change connection string for different databases, currently using SQLite
$conn = NULL;

function getModel($modelName){
    $conn = dbConnection();

    if (is_string($conn)) {
        $cardData = array();
        http_response_code(500);
        echo "<script>console.log('" . $conn . "')</script>";
        echo "<h1>There seems to be an error</h1>";
        exit;
    }

    $sql = "SELECT * FROM `3dModels` WHERE modelName = :modelName";
    $query = $conn->prepare($sql);
    $query->bindParam(":modelName", $modelName);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}