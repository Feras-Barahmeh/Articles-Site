<?php 
include "../../config.php";
include "../../../commonBetweenBackFront/php/functions.php";

    $tableName = "users";
    $idUser = $_REQUEST["idUser"];
    $newValue = $_REQUEST["newValue"];
    $colName = $_REQUEST["nameCol"];

if (Queries::Update($tableName, $colName, $newValue, "WHERE IdUser = " . $idUser)) {
    echo "Done";
} else {
    echo "Fail";
}