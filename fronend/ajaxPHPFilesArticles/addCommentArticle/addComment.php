<?php
date_default_timezone_set("Asia/Amman");

include "../../config.php";
include "../../../commonBetweenBackFront/php/functions.php";


if (! Queries::IfExsist("contentComment", "commentarticles", $_REQUEST["comment"])) {
        $ifinesrt = Queries::Insert(
                "commentarticles", 
                ["articelID", "userID", "contentComment", "dateComment"], 
                [
                        $_REQUEST["idArticle"], 
                        $_REQUEST["idUser"],
                        "'" . $_REQUEST["comment"] . "'",
                        "'" . date("Y-m-d H:i:s") . "'",
                ]);
}
