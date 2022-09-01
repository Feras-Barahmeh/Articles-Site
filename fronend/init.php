<?php 

    // configration file
    include("config.php");

    // Paths
    $tpl            = 'include/templates/';
    $css            = 'layout/frontend.css';
    $js             = 'layout/frontend.js';

    // fUNC
    $Fun            = 'include/functions/';

    // Lang
    $lang           = 'include/languages/';

    // Common
    $commfiles      = 'commonBetweenBackFront/';
    $commfilesCSS   = 'commonBetweenBackFront/css/';
    $commfilesImags =  'commonBetweenBackFront/images/';
    $commfilesuploaded =  'commonBetweenBackFront/uploaded/';
    $commfilesPHP   = 'commonBetweenBackFront/php/';

    // Include Files
    include($lang . 'eng.php');
    include($Fun . 'fronendFuntions.php');

    // Commone Function
    include($commfilesPHP. 'functions.php'); 
    include($commfilesPHP. 'images.php');

    
    // Header
    include($tpl . 'header.php');

    // Navigation
    // include($tpl . 'nav.php');

    // if (!function_exists('SetNav')) {
    //     function SetNav() {
    //         global $tpl;
    //         include($tpl . 'nav.php');
    //     }
    // }
