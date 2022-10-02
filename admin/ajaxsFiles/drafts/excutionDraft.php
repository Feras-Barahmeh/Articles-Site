<?php
include "../../config.php";
include "../../../commonBetweenBackFront/php/functions.php";


if (isset($_REQUEST) 
    && !empty($_REQUEST["typeRequest"]) 
    && $_REQUEST["typeRequest"] === "chngeStatusDraft") {
    
    $idDraft = $_REQUEST["id_draft"];
    $currentStatus = $_REQUEST["current_Status"];

    Queries::Update("quick_draft", "if_executed", $currentStatus, "WHERE id_draft = {$idDraft}");
} 

if (isset($_REQUEST) 
    && !empty($_REQUEST["typeRequest"]) 
    && $_REQUEST["typeRequest"] === "delete") {
    $idDraft = $_REQUEST["id_draft"];
    Queries::Delete("quick_draft", "id_draft = {$idDraft}");
} 


if (isset($_REQUEST) 
    && !empty($_REQUEST["typeRequest"]) 
    && $_REQUEST["typeRequest"] === "deleteAll") {

    
    if (Queries::Delete("quick_draft", "id_user = 12")) {
        ?>
            <div id="alert-mass" class="mass done">
                <div class="content-mass">
                    <p>Success Delete Drafts</p>
                    <span id="del-mass"><i class="fa-solid fa-x"></i></span>
                </div>
            </div>
        <?php
    } else {
        ?>
        <div id="alert-mass" class="mass danger" >
            <div class="content-mass">
                <p>Not Sucssess Delete All Drafts Try Agane later</p>
                <span id="del-mass"><i class="fa-solid fa-x"></i></span>
            </div>
        </div>
        <?php
    }
} 