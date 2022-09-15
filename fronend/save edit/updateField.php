<?php
    include "../config.php";
    include "../../commonBetweenBackFront/php/functions.php";

    Queries::Update("users", array_key_first($_REQUEST), str_replace("'", "", filter_var(reset($_REQUEST), FILTER_UNSAFE_RAW)), "WHERE IdUser = {$_REQUEST['IdUser']}");
    echo reset($_REQUEST);
