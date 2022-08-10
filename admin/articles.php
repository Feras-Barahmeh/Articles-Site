<?php 
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = 'users';
    include ('init.php');
    SetNav();


// Main Function
    function Controller() {
        switch (GetRequests::GetValueGet('articleAction')) {
            case 'add':
                echo "add";
                break;

            default:
                # code...
                break;
        }
    }



// Controller Part 
    Controller();
    include ($tpl . 'footer.php');
    ob_end_flush();