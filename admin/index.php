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
            <div class="index-logo"><img src="<?php echo $commfilesImags ?>/logos/logo3.jpg" alt="" class=""></div>
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
            <div class="repo">

                <?php  logo() ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="index-form" method="POST" autocomplete="off">
                    <!-- User Name -->
                        <div class="">
                            <label for="userName" class="label">User Name</label>
                            <i class="fa-solid fa-user icon-in-input" aria-hidden="true"></i>
                            <input type="text" name="userName" class="index-input" placeholder="User Name" required autocomplete="off">
                        </div>

                    <!-- Password -->
                        <div class="">
                            <label for="userName" class="label">Password</label>
                            <i class="fa-solid fa-lock icon-in-input" aria-hidden="true"></i>
                            <input type="password" name="password" class="index-input" placeholder="password" required autocomplete="off">
                        </div>

                    <input type="submit" value="Login" class="form-btn btn-index">
                </form>
            </div>
        <?php
    }


// Controller Function
    LoginStructure();

    if (PostRequests::IfPOST() ) {

        $info = Users::GetInfoUserFromPOST();

        if (  GlobalFunctions::IfExsist('userName', 'users', $info['userName'], 'string') ) {

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

