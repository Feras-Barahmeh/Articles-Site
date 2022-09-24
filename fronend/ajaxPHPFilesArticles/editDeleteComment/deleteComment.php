<?php
include "../../config.php";
include "../../../commonBetweenBackFront/php/functions.php";


if (isset($_REQUEST["typeOparation"]) && !empty($_REQUEST["typeOparation"]) &&  $_REQUEST["typeOparation"] == "delete" ) {
    if (Queries::Delete("commentarticles", "commentID = " . $_REQUEST["idComment"]) ) {
    }
}