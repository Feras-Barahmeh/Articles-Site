<?php

include "../config.php";
include "../../commonBetweenBackFront/php/functions.php";
include "addLike.php";


if (isset($_REQUEST["typeReact"]) && $_REQUEST["typeReact"] === "like") {
    $addLike = new AddLike($_REQUEST["idArticle"], $_REQUEST["idUser"], "likes", "likeID");
    $addLike->AddLike();
}