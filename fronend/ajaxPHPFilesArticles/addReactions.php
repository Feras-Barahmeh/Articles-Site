<?php
    include "../config.php";
    include "../../commonBetweenBackFront/php/functions.php";


    $nameArticle = str_replace("-", " ", $_REQUEST['namearticle']);

    $art = Queries::FromTable("IdArticle, likes", "articles", "WHERE titleArticle = '{$nameArticle}'", "fetch");
    $currLikes = $art['likes'];
    $idArt = $art["IdArticle"];
    $idUser = $_COOKIE['IdUser'];

    if (isset($_REQUEST['typeReact']) && $_REQUEST['typeReact'] === "like") {

        $likeExist = Queries::IfExsist("IdArticle", "likes", $idArt);

        // Check If User Set Like OR Not 
        if ($likeExist) {
            $idLike = Queries::FromTable("IDLike", "likes", "WHERE likes.IdUser = {$idUser} AND likes.IdArticle = {$idArt}", "fetch")["IDLike"];
            if (Queries::Update("articles", "likes", $currLikes - 1 , "WHERE IdArticle = {$idArt}") ) {
                $idDel = Queries::Delete("likes", "IDLike = {$idLike}");
                $operation = "unSetLike";

                // To Live Set Update Live In Inforamtion Article Bok
                echo json_encode([
                    "operation" => $operation,
                    "countReaction" => --$currLikes,
                    "changeCountThisReaction" => "likes",
                    "idClickedBtn" => "likeart",
                ]);
            }
        } else {
            // Add Like in Articles Table
            if ( Queries::Update("articles", "likes", $currLikes + 1 , "WHERE IdArticle = {$idArt}") ) {
                $ifDel = Queries::Insert("likes", ["IdUser", "IdArticle "], [$idUser, $idArt]);
                $operation = "setLike";

                // To Live Set Update Live In Inforamtion Article Bok
                echo json_encode([
                    "operation" => $operation,
                    "countReaction" => ++$currLikes,
                    "changeCountThisReaction" => "likes",
                    "idClickedBtn" => "likeart",
                ]);
            } 
        }
    }

