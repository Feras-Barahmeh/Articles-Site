<?php
include "../../config.php";
include "../../../commonBetweenBackFront/php/functions.php";

if (! Queries::IfExsist("contentComment", "commentarticles", $_REQUEST["comment"])) {
    $ifinesrt = Queries::Insert(
            "commentarticles", 
            ["articelID", "userID", "contentComment"], 
            [
                    $_REQUEST["idArticle"], 
                    $_REQUEST["idUser"],
                    "'" . $_REQUEST["comment"] . "'",
            ]);
}