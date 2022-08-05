<?php 

// Start Global Definations 
    ob_start();
    session_start();
    $TITLE = 'login';
    include('init.php');

// Start Fork Functions

    function logo() {
        global $commfilesImags;
        ?>
            <img src="<?php echo $commfilesImags ?>/logos/logo3.jpg" alt="" class="logo-layout-img">
        <?php
    }

    function SetSession($userName) {
        $fromDB = GlobalFunctions::FromTable('IdUser, password', 'admins', 'WHERE userName = \'' . $userName . '\'', 'fetch' );
        unset($_SESSION['userName']);
        $_SESSION['adminName'] = $userName;
        $_SESSION['password'] = $fromDB['password'];
        $_SESSION['adminID'] = $fromDB['IdUser'];

    }

// main Function
    function LoginStructure() {
        logo();
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form" method="POST" autocomplete="off">
                <!-- User Name -->
                    <div class="parent-input width-input-login">
                        <label for="userName" class="label-input text-center">User Name</label>
                        <i class="fa-solid fa-user icon-in-input" aria-hidden="true"></i>
                        <input type="text" name="userName" class="input" placeholder="User Name" required autocomplete="off">
                    </div>

                <!-- Password -->
                    <div class="parent-input width-input-login">
                        <label for="userName" class="label-input text-center">Password</label>
                        <i class="fa-solid fa-lock icon-in-input" aria-hidden="true"></i>
                        <input type="password" name="password" class="input" placeholder="password" required autocomplete="off">
                    </div>

                <input type="submit" value="Login" class="form-btn">
            </form>
        <?php
    }


// Controller Function
    LoginStructure();

    if (PostRequests::IfPOST()) {
        $info = Users::GetInfoUserFromPOST();

            if (  GlobalFunctions::IfExsist('userName', 'admins', $info['userName'], 'string') ) {

                $SortedPassword = GlobalFunctions::FromTable('password', 'admins', 'WHERE  userName = \'' . $info['userName'] . '\'' , 'fetch')['password'];
                
                if (  password_verify($info['password'], $SortedPassword) ) {
                    SetSession($info['userName']);
                    header("Location: dashbord.php");
                    exit();

                } else {
                    GlobalFunctions::AlertMassage("Not valid password or Not <strong>permission</strong> to enter this page");
                }

            } else {
                GlobalFunctions::AlertMassage("Not valid password or user name or Not <strong>permission</strong> to enter this page");
            }

    }

