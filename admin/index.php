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
function SetSession($userName) {
    $fromDB = Queries::FromTable('IdUser, password, IdUser', 'users', 'WHERE userName = \'' . $userName . '\'', 'fetch' );
    unset($_SESSION['userName']);
    $_SESSION['adminName'] = $userName;
    $_SESSION['userName'] = $userName;
    // $_SESSION['password'] = $fromDB['password'];
    $_SESSION['IdUser'] = $fromDB['IdUser'];
}

// main Function
function LoginStructure() {
    ?>
        <div class="login-box rad-5 box-sh-op10-clwh">
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
                <input type="submit" value="Login" class="btn-shape">

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

            if(Queries::FromTable("permission", "users", "WHERE userName = '" . $info['userName'] . "'", "fetch")["permission"] >= 1) {

                $SortedPassword = Queries::FromTable('password', 'users', 'WHERE  userName = \'' . $info['userName'] . '\'' , 'fetch')['password'];
                if (  password_verify($info['password'], $SortedPassword)) {
                    SetSession($info['userName']);
                    header("Location: dashbord.php");
                    exit();
    
                } else {
                    GlobalFunctions::AlertMassage("Not valid <strong>password</strong>");
                }
            } else {
                GlobalFunctions::AlertMassage("Your <strong>permission</strong> can't enter admin dashbord");
            }

        } else {
            GlobalFunctions::AlertMassage("User name Not Valid");
        }
    }

