<?php 
include "../../config.php";
include "../../../commonBetweenBackFront/php/functions.php";

abstract class Configuration {

    public function __construct () {
        $this->tableName = "users";
        $this->idUser = $_REQUEST["idUser"];
        $this->newValue = $_REQUEST["newValue"];
        $this->colName = $_REQUEST["nameCol"];
    }
}