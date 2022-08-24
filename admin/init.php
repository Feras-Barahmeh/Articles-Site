<?php 

    // configration file
    include("config.php");

    // Paths
    $tpl            = 'include/templates/';
    $css            = 'layout/backend.css';
    $js             = 'layout/backend.js';
    $fun            = 'include/functions/';
    $funusers            = 'include/functions/users/';
    $lang           = 'include/languages/';
    $commfiles      = '../commonBetweenBackFront/';
    $commfilesCSS   = '../commonBetweenBackFront/css/';
    $commfilesImags =  '../commonBetweenBackFront/images/';
    $commfilesuploaded =  '../commonBetweenBackFront/uploaded/';
    $commfilesPHP   = '../commonBetweenBackFront/php/';

    // Include Files
    include($lang . 'eng.php');
    include($fun . 'backendFunctions.php');
    include($funusers . 'user.php');
    include($funusers . 'queries.php');
    include($commfilesPHP. 'functions.php');
    include($tpl . 'header.php');


    if (!function_exists('SetNav')) {
        function SetNav() {
            global $tpl;
            include($tpl . 'nav.php');
        }
    }

