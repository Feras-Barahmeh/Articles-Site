<?php

include "../../config.php";
include "../../../commonBetweenBackFront/php/functions.php";
include "addLike.php";
include "addDislike.php";
include "addSave.php";


if (isset($_REQUEST["typeReact"]) && $_REQUEST["typeReact"] === "like") {
    $addLike = new AddLike($_REQUEST["idArticle"], $_REQUEST["idUser"], "likes", "likeID");
    $addLike->AddLike();
}

if (isset($_REQUEST["typeReact"]) && $_REQUEST["typeReact"] === "dislike") {
    $addLike = new AddDislike($_REQUEST["idArticle"], $_REQUEST["idUser"], "dislikes", "dislikeID");
    $addLike->AddDislike();
}
if (isset($_REQUEST["typeReact"]) && $_REQUEST["typeReact"] === "save") {
    $addLike = new AddSave($_REQUEST["idArticle"], $_REQUEST["idUser"], "saveds", "idSaved");
    $addLike->AddSave();
}