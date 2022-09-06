<?php 

// Start Global Definations 
    ob_start();
    session_start();
    $TITLE = 'login';
    include('init.php');
    
    // Users
    include($FunUsers . 'user.php');
    include($FunUsers . 'queries.php');

// Start Fork Functions

    function logo() {
        global $commfilesImags;
        ?>
            <div class="index-logo"><img src="<?php echo $commfilesImags ?>/logos/logo.jpg" alt="" class="login-img"></div>
        <?php
    }

    function SetSession($userName) {
        $fromDB = Queries::FromTable('IdUser, password, IdUser', 'users', 'WHERE userName = \'' . $userName . '\'', 'fetch' );
        unset($_SESSION['userName']);
        $_SESSION['adminName'] = $userName;
        $_SESSION['password'] = $fromDB['password'];
        $_SESSION['IdUser'] = $fromDB['IdUser'];
    }

// main Function
    function LoginStructure() {
        ?>
            <div class="login-box">
                <h2>Login</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                    <div class="user-box">
                        <input type="text" name="userName" required="">
                        <label for="userName">User Name</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" required="">
                        <label for="password">Password</label>
                    </div>
                    <input type="submit" value="Login" class="btn-submit">

                    </a>
                </form>
            </div>
        <?php
    }


// Controller Function
    LoginStructure();

    if (PostRequests::IfPOST() ) {

        $info = Users::Post();

        if (  Queries::IfExsist('userName', 'users', $info['userName'], 'string') ) {

            $SortedPassword = Queries::FromTable('password', 'users', 'WHERE  userName = \'' . $info['userName'] . '\'' , 'fetch')['password'];

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

