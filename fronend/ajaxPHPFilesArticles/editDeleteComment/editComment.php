<?php
date_default_timezone_set("Asia/Amman");
include "../../config.php";
include "../../../commonBetweenBackFront/php/functions.php";


if (isset($_REQUEST["typeOparation"]) && !empty($_REQUEST["typeOparation"]) &&  $_REQUEST["typeOparation"] == "edit" ) {
    $_REQUEST["newComment"] = rtrim($_REQUEST["newComment"]);
    $_REQUEST["newComment"] = ltrim($_REQUEST["newComment"]);
    Queries::Update("commentarticles", "contentComment", $_REQUEST["newComment"], "WHERE commentID = " . $_REQUEST["idComment"]);
    Queries::Update("commentarticles", "dateComment", date("Y-m-d H:i:s") , "WHERE commentID = " . $_REQUEST["idComment"]);
}