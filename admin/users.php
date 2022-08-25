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

    // Users
    include($FunUsers . 'user.php');
    include($FunUsers . 'queries.php');
    SetNav();



// Stasrt Fork Functions

    class EditInfoUser {
        public static function StructerEdit() {
            global $commfilesuploaded;
            $id = GetRequests::GetValueGet('IdUser');
            $values = Queries::FromTable('*', 'users', 'WHERE IdUser = ' .  $id, 'fetch');
            ?>
                <div class="img-user">
                    <?php Images::SetImg($commfilesuploaded . 'users//', Images::GetNameImgFromDB('imageName', 'users', "WHERE IdUser = " . GetRequests::GetValueGet("IdUser"))); ?>
                </div>`

                <div class="contanier-form">
                    <h3 class="h-title">Edit Profile</h3>
                    <form form action="users.php?actionMember=update&IdUser=<?php echo $id ?>" method="POST" class="form-edit" enctype="multipart/form-data">
                        <!-- Start User name -->
                        <div class="input-box">
                            <input type="text" name="userName" id="userName" value="<?php echo $values['userName'] ?>" class="input" autocomplete="off">
                            <label for="userName" class="label">user name</label>
                        </div>

                        <!-- password -->
                        <div class="input-box">
                            <input type="password" name="password" id="password" class="input" autocomplete="off">
                            <label for="password" class="label">password</label>
                        </div>
                        
                        <!-- Registerd Password -->
                        <div class="input-box" style="display: none;">
                            <input type="hidden" name="registerdPass" id="" value="<?php echo $values['password'] ?>" class="" autocomplete="off">
                        </div>

                        <!-- Email -->
                        <div class="input-box">
                            <input type="email" name="email" id="password" value="<?php echo $values['email'] ?>" class="input" autocomplete="off">
                            <label for="email" class="label">Email</label>
                        </div>

                        <!-- Longuage And Tools -->
                        <div class="input-box">
                            <input type="text" name="langAndTools" id="langAndTools" value="<?php echo $values['langAndTools'] ?>" class="input" autocomplete="off">
                            <label for="langAndTools" class="label">Longuage And Tools</label>
                        </div>

                        <!-- Image -->
                        <div class="input-box" >
                            <input type="file" name="imageName" class="input">
                        </div>

                        <!-- Full Name -->
                        <div class="input-box">
                            <input type="text" name="fullName" id="fullName" value="<?php echo $values['fullName'] ?>" class="input" autocomplete="off">
                            <label for="fullName" class="label">Full Name</label>
                        </div>

                        <!-- Age -->
                        <div class="input-box">
                            <input type="text" name="age" id="age" value="<?php echo $values['age'] ?>" class="input" autocomplete="off">
                            <label for="age" class="label">Age</label>
                        </div>

                        <!-- Permission -->
                        <div class="input-box">
                            <select name="permission" id="permission" class="select" required>
                                <option value="<?php echo $values['permission'] ?>">Same permission</option>
                                <option value="0">Member</option>
                                <option value="1">Admin</option>
                                <option value="2">Programer</option>
                            </select>
                        </div>

                        
                        <!-- About You -->
                        <div class="input-box">
                            <textarea name="aboutYou" cols="36" rows="3" class="input"><?php echo $values['aboutYou'] ?></textarea>
                            <label for="aboutYou" class="label">About You</label>
                        </div>

                        <input type="submit" value="Save" class="btn-submit">

                    </form>
                </div>

            <?php
        }

        public static function ChangesFaild() {
            $info = Users::Post();
            $FromDB = Queries::FromTable('*', 'users', "WHERE IdUser = " . GetRequests::GetValueGet('IdUser'), 'fetch');

            if (  $info['userName'] !== $FromDB['userName'] && ($info['userName'] == NULL || $info['userName'] == null)) {
                $_POST['userName'] = $FromDB['userName'];
            }

            if (  !empty($info['password']) ) {
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

            if (  $info['permission'] !== $FromDB['permission'] && empty($info['permission'])) {
                $_POST['permission'] = $FromDB['permission'];
            }

            if (  $info['langAndTools'] !== $FromDB['langAndTools'] && empty($info['langAndTools'])) {
                $_POST['langAndTools'] = $FromDB['langAndTools'];
            }

            if (  $info['age'] !== $FromDB['age'] &&  empty($info['age'])) {
                $_POST['age'] = $FromDB['age'];
            }

            if (  $info['imageName'] !== $FromDB['imageName'] && empty($info['imageName']) ) {
                $_POST['imageName'] = $FromDB['imageName'];
            }

            $result =  ValidationInput::IfValid('update');

            return $result;
        }

        public static function PrepareToEdit() {
            if ( self::ChangesFaild() ) {
                EditInfoUser::ChangesFaild();
                Update::Update();
            } 
        }
    }

    function controllerInsert() {
        $info = Users::Post();

        if(new ValidationInput('Insert')) {

            if (! GlobalFunctions::IfExsist('userName', 'users', $info['userName'])) {
                Insert::Insert();
            } else {
                GlobalFunctions::AlertMassage('This User Is Exist Alrasdy');
                GlobalFunctions::SitBackBtn();
            }
        }
    }

    function ControlleUpdate() {
        if (PostRequests::IfPOST()) {
            EditInfoUser::PrepareToEdit();

        } else {
            GlobalFunctions::AlertMassage("Can't Enter This Page Directry");
            ?> <a href="dashbord.php" class="btn-submit">Back</a> <?php
        }
    }

    function WhoShowed () {
        $WantShow = GetRequests::GetValueGet('show');
        if ($WantShow  === "users")
            $data = Queries::FromTable("*", 'users', "WHERE permission = 0", 'fetchAll', 'IdUser');
        else if ($WantShow === 'admins')
            $data = Queries::FromTable("*", 'users', "WHERE permission = 1");
        else if ($WantShow === 'prog')
            $data = Queries::FromTable("*", 'users', "WHERE permission = 2");
        return $data;
    }


    function PrintDataUser() {
        $data = WhoShowed();
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
                    <td><?php echo $info['permission'] ?></td>
                    <td><?php echo $info['langAndTools'] ?></td>
                    <td><?php echo $info['age'] ?></td>
                    <td><?php echo $info['dataRegister'] ?></td>
                    <td>
                        <a href="users.php?actionMember=edit&IdUser=<?php echo $info['IdUser'] ?>" class="process-btn" data-hover="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="users.php?actionMember=delete&IdUser=<?php echo $info['IdUser'] ?>" class="process-btn" data-hover="Delete" onclick="return Confirm()" ><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>

            <?php
        }
    }

    function AddStructure() {
        ?>
            <div class="contanier-form">
                <h1 class="h-title">Add User</h1>
                <form action="?actionMember=insert" method="POST" class="form" enctype="multipart/form-data">
                    <!-- User Name -->
                    <div class="input-box">
                        <input type="text" name="userName" id="userName" class="input" required="" autocomplete="off">
                        <label for="userName" class="label">User Name</label>
                    </div>

                    <!-- Password -->
                    <div class="input-box">
                        <input type="password" name="password" id="password"  class="input" required="" autocomplete="off">
                        <label for="password" class="label">password</label>
                    </div>

                    <!-- Email -->
                    <div class="input-box">
                        <input type="email" name="email" id="email"  class="input" required="" autocomplete="off">
                        <label for="email" class="label">Email</label>
                    </div>

                    <!-- Full Name -->
                    <div class="input-box">
                        <input type="text" name="fullName" id="fullName"  class="input" required="" autocomplete="off">
                        <label for="fullName" class="label">Full Name</label>
                    </div>

                    <!-- Pictuer -->
                    <div class="input-box">
                        <input type="file" name="imageName" id="imageName"  class="input" required="" autocomplete="no">
                        <!-- <label for="imageName" class="file-label">Profile Pictuer</label> -->
                    </div>

                    <!-- Start permission -->
                    <div class="input-box">
                        <select name="permission" id="permission" class="select" required="" autocomplete="off">
                            <option value="0">Member</option>
                            <option value="1">Admin</option>
                            <option value="2">Programer</option>
                        </select>
                        <!-- <label for="permission" class="file-label">permission</label> -->
                    </div>
                    <input type="submit" value="Add member" class="btn-submit">
                </form>
            </div>
        <?php
    }

// End Fork Fucntions




// Main Function 
    function ShowUserStructuer() {
        ?>

            <h3 class="h-title">Users</h3>
            <div class="contanier-table">

                <div class="additions">
                    <a href="users.php?actionMember=add" class="add-member-in-users">Add member</a>

                    <?php GlobalFunctions::Search()?>
                    
                    <div class="counters">
                        <a href="users.php?show=users">
                            <div class="number-users add-btn">
                                <span>Users</span> <span class="num"><?php echo  Queries::Counter("IdUser", 'users', "Where permission = 0") ?></span>
                            </div>
                        </a>

                        <a href="users.php?show=admins">
                            <div class="number-admins add-btn">
                                <span>Admins</span> <span class="num"><?php echo  Queries::Counter("IdUser", 'users', "Where permission = 1") ?></span>
                            </div>
                        </a>

                        <a href="users.php?show=prog">
                            <div class="number-admins add-btn">
                                <span>Programmers</span> <span class="num"><?php echo  Queries::Counter("IdUser", 'users', "Where permission = 2") ?></span>
                            </div>
                        </a>
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
                            <td>permission</td>
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

            case 'delete':
                Queries::Delete('users', " IdUser = " . GetRequests::GetValueGet('IdUser'));
                break;

            case 'update':
                ControlleUpdate();
                break;

            default:
                ShowUserStructuer();
                break;
        }
    }


// Root file
    ControlledFunction();
    include ($tpl . 'footer.php');
    ob_end_flush();