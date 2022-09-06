<?php 

    // configration file
    include("config.php");

    // Function
    $functions = "include//functions//";

    // Commone Funtion
    $functionsCommone = "../commonBetweenBackFront/php/functions.php";

    // Templates
    $tpl = "include//templates//";

    // layout
    $css =  "layout//css//";
    $js  = "layout//js//";

    // include

    include ($functions . "frontendFunction.php");
    include  $functionsCommone;

    include ($tpl . "header.php");

    if (isset($_SESSION) && !empty($_SESSION)) {
        include ($tpl . "nav.php");

    }
