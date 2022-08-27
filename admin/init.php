<?php 

    // configration file
    include("config.php");

    // Paths
    $tpl            = 'include/templates/';
    $css            = 'layout/backend.css';
    $js             = 'layout/backend.js';

    // fUNC
    $Fun            = 'include/functions/';
    $FunUsers       = 'include/functions/users/';
    $FunArticles    = 'include/functions/articles/';
    $FunCategories  = 'include/functions/categories/';

    // Lang
    $lang           = 'include/languages/';

    // Common
    $commfiles      = '../commonBetweenBackFront/';
    $commfilesCSS   = '../commonBetweenBackFront/css/';
    $commfilesImags =  '../commonBetweenBackFront/images/';
    $commfilesuploaded =  '../commonBetweenBackFront/uploaded/';
    $commfilesPHP   = '../commonBetweenBackFront/php/';

    // Include Files
    include($lang . 'eng.php');
    include($Fun . 'backendFunctions.php');

    // Commone Function
    include($commfilesPHP. 'functions.php'); 
    include($commfilesPHP. 'images.php');

    
    // Header
    include($tpl . 'header.php');


    if (!function_exists('SetNav')) {
        function SetNav() {
            global $tpl;
            include($tpl . 'nav.php');
        }
    }
