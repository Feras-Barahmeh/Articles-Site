<?php
// Start Global Defination
    ob_start();
    session_start();
    $TITLE = 'Edit Profile';
    include('init.php');
    SetNav();

// Start Fork Function

    function IfChangePass( $FromPostPass, $FromDB ) {
        if (  $FromPostPass !== $FromDB && ($FromPostPass == NULL || $FromPostPass == null)) {
            $_POST['password'] = $_POST['registerdPass'];
        }

    }

    function PrepareToEdit() {

        $info = Users::GetInfoUserFromPOST();

        if ( ValidationInput::ValidationInput() ) {
            IfChangePass($info['password'], $info['registerdPass'] ) ;
            Users::UpdateToDB('admins');
        }

    }

// Start Main Fucntion
    function StructerEdit() {
        global $commfilesuploaded;

        $values = GlobalFunctions::FromTable('*', 'users', 'WHERE idUser = ' . Sessions::GetValueSessionDepKey('IdUser'), 'fetch');
        ?>
            <h3 class="h-title">Edit Profile</h3>
            <div class="container-edit-form">
                <form action="" method="POST" class="form-edit" enctype="multipart/form-data">
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

                    <input type="submit" value="Edit Info" class="form-btn">
                </form>

                <div class="img-user">
                    <img src="<?php echo $commfilesuploaded ?>/users/<?php echo $values['imageName'] ?>" alt="Personal-Img">
                </div>
            </div>

        <?php
    }

// Start Controller Fucntions
    StructerEdit();

    if ( PostRequests::IfPOST() ) {
        PrepareToEdit();
    }

    include($tpl . 'footer.php');
    ob_end_flush();


