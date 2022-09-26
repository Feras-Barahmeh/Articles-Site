<?php
include "../../config.php";
include "../../../commonBetweenBackFront/php/functions.php";



$idArtilce = $_REQUEST["idArticle"];
$idUser = $_REQUEST["idUser"];
$idComment = $_REQUEST["idComment"];

$ifAnatherReaction = Queries::Counter("id_dislike", "dislike_comment_articles", "WHERE id_article={$idArtilce} AND id_user={$idUser} AND id_comment={$idComment}");

if (isset($_REQUEST["typeReaction"]) && !empty($_REQUEST["typeReaction"])) {

    // ADD LIKE
    if ($_REQUEST["actionType"] === "like") {
        Queries::Insert(
            "like_comment_articles",
            ["id_article", "id_user", "id_comment"],
            [$idArtilce, $idUser, $idComment],
        );

    // Remove anather Reaction
    if ($ifAnatherReaction >= 1) {
        Queries::Delete("dislike_comment_articles", "id_article = {$idArtilce} AND id_user={$idUser} AND id_comment={$idComment}");
    }


    } elseif ($_REQUEST["actionType"] === "unlike") {
        Queries::Delete("like_comment_articles", "id_article = {$idArtilce} AND id_user={$idUser} AND id_comment={$idComment}");
    }
}