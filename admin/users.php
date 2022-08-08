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

        if(ValidationInput::ValidationInput('add')) {

            if (! GlobalFunctions::IfExsist('userName', 'users', $info['userName'])) {
                Users::InsertToDB();
            } else {
                GlobalFunctions::AlertMassage('This User Is Exist Alrasdy');
                GlobalFunctions::SitBackBtn();
            }
        }
    }

    
    class EditInfoUser {
        
        public static function StructerEdit() {
            global $commfilesuploaded;
            $id = GetRequests::GetValueGet('IdUser');

            $values = GlobalFunctions::FromTable('*', 'users', 'WHERE IdUser = ' .  $id, 'fetch');
            ?>
                <h3 class="h-title">Edit Profile</h3>
                <div class="container-edit-form">
                    <form action="users.php?actionMember=update&IdUser=<?php echo $id ?>" method="POST" class="form-edit" enctype="multipart/form-data">
                        <!-- User Name -->
                            <div class="container-feild">
                                <label for="user-name" class="label-edit">User Name</label>
                                <i class="fa-solid fa-user"></i>
                                <input type="text" name="userName" class="input-edit-feild" value="<?php echo $values['userName'] ?>">
                            </div>

                        <!-- passwoed -->
                            <div class="container-feild">
                                <label for="user-name" class="label-edit">Password</label>
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" name="password" class="input-edit-feild" >
                            </div>

                        <!-- Registerd Password -->
                            <div class="container-feild" style="display: none;">
                                <input type="hidden" name="registerdPass" class="input-edit-feild" value="<?php echo $values['password'] ?>">
                            </div>

                        <!-- Email -->
                            <div class="container-feild">
                                <label for="user-name" class="label-edit">Email</label>
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" name="email" class="input-edit-feild" value="<?php echo $values['email'] ?>">
                            </div>

                        <!-- Longuage And Tools -->
                            <div class="container-feild">
                                <label for="user-name" class="label-edit">Longuage And Tools</label>
                                <i class="fa-solid fa-language"></i>
                                <input type="text" name="langAndTools" class="input-edit-feild" value="<?php echo $values['langAndTools'] ?>" placeholder="Your Tools, Programming Language">
                            </div>

                        <!-- Image -->
                            <div class="container-feild" >
                                <label for="user-name" class="label-edit">Image</label>
                                <i class="fa-solid fa-camera"></i>
                                <input type="file" name="imageName" class="input-edit-feild file-input">
                            </div>

                        <!-- Full Name -->
                            <div class="container-feild">
                                <label for="user-name" class="label-edit">Full Name</label>
                                <i class="fa-solid fa-signature"></i>
                                <input type="text" name="fullName" class="input-edit-feild" value="<?php echo $values['fullName'] ?>" placeholder="Full Name">
                            </div>

                        <!-- Age -->
                            <div class="container-feild">
                                <label for="user-name" class="label-edit">Age</label>
                                <i class="fa-solid fa-calendar"></i>
                                <input type="text" name="age" class="input-edit-feild" value="<?php echo $values['age'] ?>" placeholder="Your Age">
                            </div>

                        <!-- About You -->
                            <div class="container-feild">
                                <label for="user-name" class="label-edit">About You</label>
                                <i class="fa-solid fa-comment-medical"></i>
                                <textarea name="aboutYou" cols="39" rows="5"><?php echo $values['aboutYou'] ?></textarea>
                            </div>

                        <input type="submit" value="Save" class="form-btn text-center">
                    </form>

                    <div class="img-user">
                        <?php Images::SetImg($commfilesuploaded . 'users//', Images::GetNameImgFromDB('imageName', 'users', "WHERE IdUser = " . GetRequests::GetValueGet("IdUser"))); ?>
                    </div>
                </div>

            <?php
        }

        public static function ChangesFaild() {
            $info = Users::GetInfoUserFromPOST();
            $FromDB = GlobalFunctions::FromTable('*', 'users', "WHERE IdUser = " . GetRequests::GetValueGet('IdUser'), 'fetch');

            if (  $info['userName'] !== $FromDB['userName'] && ($info['userName'] == NULL || $info['userName'] == null)) {
                $_POST['userName'] = $FromDB['userName'];
            }
            
            
            if (  $info['password'] !== $FromDB['password'] && empty($info['password']) ) {
                $_POST['password'] = $FromDB['password'];

            } else {
                $_POST['password'] = password_hash( $info['password'], PASSWORD_DEFAULT);
            }

            if (  $info['email'] !== $FromDB['email'] && empty($info['email']) ) {
                $_POST['email'] = $FromDB['email'];
            }

            if (  $info['fullName'] !== $FromDB['fullName'] && empty($info['fullName'])) {
                $_POST['fullName'] = $FromDB['fullName'];
            }

            if (  $info['aboutYou'] !== $FromDB['aboutYou'] && empty($info['aboutYou'])) {
                $_POST['aboutYou'] = $FromDB['aboutYou'];
            }

            if (  $info['langAndTools'] !== $FromDB['langAndTools'] && empty($info['langAndTools'])) {
                $_POST['langAndTools'] = $FromDB['langAndTools'];
            }

            if (  $info['age'] !== $FromDB['age'] &&  empty($info['age'])) {
                $_POST['age'] = $FromDB['age'];
            }

            if (  $info['imageName'] !== $FromDB['imageName'] && empty($info['imageName'])) {
                $_POST['imageName'] = $FromDB['imageName'];
            }

            $result = ValidationInput::ValidationInput();

            return $result;
        }
    
        public static function PrepareToEdit() {

            if (  self::ChangesFaild() ) {
                Users::UpdateToDB('users');
            }
        }
    }


    function ControlleUpdate() {
        if (PostRequests::IfPOST()) {
            EditInfoUser::PrepareToEdit();

        } else {
            GlobalFunctions::AlertMassage("Can't Enter This Page Directry");
            ?> <a href="dashbord.php" class="form-btn">Back</a> <?php
        }
    }


    function PrintDataUser() {
        $data = GlobalFunctions::FromTable("*", 'users', "WHERE permission != 1");
        global $commfilesuploaded;
        
        foreach ($data as $info) {
            ?>
                <tr>
                    <td><?php echo $info['IdUser'] ?></td>
                    <td><?php Images::SetImg($commfilesuploaded. 'users/', $info['imageName'], 'profile-pictuer') ?></td>
                    <td><?php echo $info['userName'] ?></td>
                    <td class="long-text"><?php echo $info['password'] ?></td>
                    <td><?php echo $info['email'] ?></td>
                    <td><?php echo $info['aboutYou'] ?></td>
                    <td><?php echo $info['langAndTools'] ?></td>
                    <td><?php echo $info['age'] ?></td>
                    <td><?php echo $info['dataRegister'] ?></td>
                    <td>
                        <a href="users.php?actionMember=edit&IdUser=<?php echo $info['IdUser'] ?>" class="process-btn" data-hover="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="users.php?actionMember=delete&IdUser=<?php echo $info['IdUser'] ?>" class="process-btn" data-hover="Delete"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>

                
            <?php
        }
    }


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

// End Fork Fucntions




// Main Function 
    function ShowUserStructuer() {
        ?>

            <h3 class="h-title">Member</h3>
            <div class="contanier-table">
                <div class="additions">
                    <a href="users.php?actionMember=add" class="form-btn add-member-in-users">Add member</a>
                    <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" value="Search" id="gsearch" name="gsearch">
                    </div>
                </div>

                <table class="dashbord-show-users-table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>pictuer</td>
                            <td>User Name</td>
                            <td class="long-text">Password</td>
                            <td>Email</td>
                            <td>Discription</td>
                            <td>Languages And Tools</td>
                            <td>Age</td>
                            <td>Register Date</td>
                            <td>Controlle</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php PrintDataUser() ?>
                    </tbody>

                </table>
            </div>
        <?php
    }



// Start controlled Function
    function ControlledFunction() {
        switch (GetRequests::GetValueGet('actionMember')) {

            case 'add':
                AddStructure();
                break;

            case 'insert':
                controllerInsert();
                break;

            case 'edit':
                EditInfoUser::StructerEdit();
                break;

            case 'update':
                ControlleUpdate();

                
            break;

            default:
                ShowUserStructuer();
                break;
        }
    }
// End controlled Function



// Root file
    ControlledFunction();
    include ($tpl . 'footer.php');
    ob_end_flush();