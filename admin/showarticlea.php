<?php
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = 'users';
    include ('init.php');
    SetNav();

// Start Fork Fucntion 
    function printThisCat() {
        
    }


    function Controller() {

        if (GetRequests::IfSetValue('CatName')) {
            $catname = str_replace("-", " ", GetRequests::GetValueGet('CatName'));
            printThisCat();
        }
    }

// Controller Part 
    Controller();
    include ($tpl . 'footer.php');
    ob_end_flush();