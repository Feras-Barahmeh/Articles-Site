<?php 

    // configration file
    include("config.php");

    // Paths
    $tpl            = 'include/templates/';
    $css            = 'layout/backend.css';
    $js             = 'layout/backend.js';
    $fun            = 'include/functions/';
    $lang           = 'include/languages/';
    $commfiles      = '../commonBetweenBackFront/';
    $commfilesCSS   = '../commonBetweenBackFront/css/';
    $commfilesImags =  '../commonBetweenBackFront/images/';
    $commfilesuploaded =  '../commonBetweenBackFront/uploaded/';
    $commfilesPHP   = '../commonBetweenBackFront/php/';

    // Include Files
    include($lang . 'eng.php');
    include($fun . 'backendFunctions.php');
    include($commfilesPHP. 'functions.php');
    include($tpl . 'header.php');
    include($tpl . 'nav.php');

