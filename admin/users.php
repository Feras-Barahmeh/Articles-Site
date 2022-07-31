<?php
    /*
        |============================================================|
        |----- This file to ADD | Delete | Edit Information user-----|
        |============================================================|
    */


// Start Gloabal Difination
    ob_start();
    $TITLE = 'users';
    include ('init.php');
// End Gloabal Difination



// Start Main Structures
    function AddStructure() {
        ?>
            <div class="container">
                <h3 class="h-title">Add Member</h3>
                <div class="parent">
                    <form action="users.php?actionInMember=add" method="POST" class="form">
                            <!-- Start User name -->
                            <div class="user-name">
                                <label for="userName">User Name</label>
                                <input type="text" name="userName" class="" placeholder="User Name">
                            </div>

                    </form>
                </div>
            </div>

        <?php
        print_r($_POST);
    }
// End Main Structures


// Start controlled Function
    function ControlledFunction($valueGet) {

        switch ($valueGet) {
            case 'add':
                AddStructure();
                break;

            case 'edit':
                break;

            default:
                echo 'maneg';
                break;
        }

    }
// End controlled Function



// Root file

    ControlledFunction(GetRequests::GetValueGet('actionMember'));
    include ($tpl . 'footer.php');