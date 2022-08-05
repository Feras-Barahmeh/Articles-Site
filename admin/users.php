<?php
    /*
        |============================================================|
        |----- This file to ADD | Delete | Edit Information user-----|
        |============================================================|
    */


// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = 'users';
    include ('init.php');
    SetNav();
// End Gloabal Difination


// Stasrt Fork Functions
    function controllerInsert() {
        $info = Users::GetInfoUserFromPOST();

        if(ValidationInput::ValidationInput()) {
            
            if (! GlobalFunctions::IfExsist('userName', 'users', $info['userName'])) {
                Users::InsertToDB();
            } else {
                GlobalFunctions::AlertMassage('This User Is Exist Alrasdy');
                GlobalFunctions::SitBackBtn();
            }
        }
    }



// Start Main Structures
    function AddStructure() {
        ?>
            <div class="container">
                <h3 class="h-title">Add Member</h3>
                <div class="parent">
                    <form action="?actionMember=insert" method="POST" class="form" enctype="multipart/form-data">
                            <!-- Start User name -->
                                <div class="user-name parent-input">
                                    <label for="userName" class="label-input">User Name</label>
                                    <i class="fa-solid fa-user icon-in-input" aria-hidden="true" ></i>
                                    <input type="text" name="userName" class="input" placeholder="User Name" required>
                                </div>

                            <!-- Start Password -->
                                <div class="parent-input">
                                    <label for="userName" class="label-input">password</label>
                                    <i class="fa-solid fa-lock icon-in-input" aria-hidden="true"></i>
                                    <input type="password" name="password" class="input" placeholder="password" required>
                                </div>

                            <!-- Start Email -->
                                <div class="parent-input">
                                    <label for="userName" class="label-input">Email</label>
                                    <i class="fa-solid fa-envelope icon-in-input" aria-hidden="true"></i>
                                    <input type="email" name="email" class="input" placeholder="Email" required>
                                </div>

                                <!-- Start Full Name -->
                                <div class="parent-input">
                                    <label for="userName" class="label-input">Full Name</label>
                                    <i class="fa-solid fa-signature icon-in-input" aria-hidden="true"></i>
                                    <input type="text" name="fullName" class="input" placeholder="Full Name" required>
                                </div>

                                <!-- Start Image-->
                                <div class="parent-input">
                                    <label for="userName" class="label-input">Profile Pictuer</label>
                                    <i class="fa-solid fa-file-image icon-in-input" aria-hidden="true"></i>
                                    <input type="file" name="imageName" class="input file-input" >
                                </div>
                                
                            <!-- Start Rank -->
                                <div class="parent-input">
                                    <label for="userName" class="label-input">Rank</label>
                                    <i class="fa-solid fa-ranking-star icon-in-input" aria-hidden="true"></i>
                                    <select name="permission" id="permission" class="input" required>
                                        <option value="0">Member</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Programer</option>
                                    </select>
                                </div>

                            <!-- Submit btn -->
                                <input type="submit" value="Add member" class="form-btn">
                    </form>
                </div>
            </div>

        <?php
    }
// End Main Structures


// Start controlled Function
    function ControlledFunction() {
        switch (GetRequests::GetValueGet('actionMember')) {
            case 'add':
                AddStructure();
                break;

            case 'edit':
                break;

            case 'insert':
                controllerInsert();
                break;

            default:
                echo 'maneg bla';
                break;
        }
    }
// End controlled Function



// Root file
    ControlledFunction();
    include ($tpl . 'footer.php');
    ob_end_flush();