
<?php
    ob_start();
    session_start();
    $TITLE = "Feras Barahmeh";
    include ("init.php");
    include ($functions . "loginFunctions//login.php");

// Fork Funtion
    function BoxAlert($title, $massage) {
        ?>
            <div id="boxAlert" >
                <div class="contanier">
                    <h2 class=""><?php echo $title ?></h2>
                    <p><?php echo $massage ?></p>
                    <button id="btn-boxAlert" type="button">OK</button>
                </div>
            </div>
        <?php
    }

    function SetLinks() {

        if (!empty($_SESSION)) {
            ?><i class="fa-sharp fa-solid fa-circle-exclamation"></i>
                <li><a href="#"><i class="fa-solid fa-user"></i>Profile</a></li>
                <li><a href="#"><i class="fa-solid fa-newspaper"></i>Articles</a></li>
                <li><a href="#"><i class="fa-solid fa-tag"></i>Categories</a></li>
                <li><a href="#"><i class="fa-solid fa-quote-right"></i>Quotes</a></li>
                <li><a href="#"><i class="fa fa-puzzle-piece"></i>Problem Solving</a></li>
                <li><a href="#"><i class="fa-solid fa-bug"></i>Solving Bugs</a></li>
            <?php
        } else {
            ?>
                <li class="info">Register In site lets you read articles, Profile to display your prgict, Quotes, Solvin Bugs and Many options...</li>
            <?php
        }
    }

    function Aside() {
        ?>

            <aside id="login-aside">
                <div class="logo">
                    <a href="#">Feras Barahmeh</a>
                </div>

                <div class="nav-toggeler">
                    <span></span>
                </div>
                <nav>
                    <ul>
                        <?php SetLinks() ?>
                    </ul>
                </nav>
            </aside>
        <?php
    }

    function MainContent() {
        ?>
            <div class="main-content">
                <section class="section login-sigup">
                    <div class="content">
                        <!-- Start Title Button -->
                        <div class="title">
                            <div class="butns">
                                <div class="reg-btn login-btn active-lgsin">Login</div>
                                <div class="reg-btn sigun-btn un-active-lgsin">Sigup</div>
                            </div>
                        </div>
                        <!-- End Title Button -->

                        <!-- Start Login Structer -->
                        <form action="" method="POST" id="login-form">
                            <div class="form-structer login-form padd-15">
                                    <div class="row">
                                        <div class="input-item padd-15">
                                            <label for="username">username or email</label>
                                            <div class="">
                                                <input type="text" name="username" id="usernamelogin" required autocomplete="off" placeholder="username or email">
                                                <div class="alert-validation danger hidden user-alert">User Name Must BelowerCase, Greater Than three leters</div>
                                            </div>
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-item padd-15">
                                            <label for="passwordlogin">password</label>
                                            <div class="" >
                                                <input type="password" name="password" id="passwordlogin" required autocomplete="off" placeholder="password">
                                                <div class="alert-validation danger hidden user-alert">Passowrd week, Must  be grater than three characther</div>
                                            </div>

                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-item padd-15">
                                            <input type="submit" name="login" class="btn" id="submit" >
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <!-- End Login Structer -->

                        <!-- Start singup Structer -->
                        <form action="" class="hidden" id="singup-form">
                            <div class="form-structer singup-form padd-15 ">
                                    <div class="row">
                                        <div class="input-item padd-15">
                                            <label for="usernames">username or email</label>
                                            <div class="">
                                                <input type="text" name="username" id="usernames"  required autocomplete="off" placeholder="Usre Name Or Email">
                                                <div class="alert-validation danger hidden user-alert">User Name Must BelowerCase, Greater Than three leters</div>
                                            </div>
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-item padd-15">
                                            <label for="passwords">password</label>
                                            <div class="">
                                                <input type="password" name="password" id="passwords"  required autocomplete="off" placeholder="password">
                                                <div class="alert-validation danger hidden user-alert">Passowrd week, Must  be grater than three characther</div>
                                            </div>
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-item padd-15">
                                            <label for="emails">email</label>
                                            <div class="">
                                                <input type="emails" name="email" id="emails" required autocomplete="off" placeholder="email">
                                                <div class="alert-validation danger hidden user-alert">Must Be Valid Email To confirm Acount</div>
                                            </div>
                                            <i class="fa-regular fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-item padd-15">
                                            <label for="fullnames">Full Name</label>
                                            <div class="">
                                                <input type="text" name="fullname" id="fullnames" required autocomplete="off" placeholder="Full Name">
                                                <div class="alert-validation danger hidden user-alert">Can't include simples</div>
                                            </div>
                                            <i class="fa-solid fa-signature"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-item padd-15">
                                            <input type="submit" name="singup" class="btn" >
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <!-- End singup Structer -->

                    </div>
                </section>
            </div>
        <?php
    }

// Main Function
    function PageStructer() {
        ?>
            <div class="main-contanier">
                <!-- Start aside -->
                <?php echo Aside(); ?>
                <!-- End aside -->

                <!-- Start Main Content -->
                <?php MainContent() ?>
                <!-- End Main Content -->
            </div>
        <?php
    }


// Main Structer
    PageStructer();
// Main Configration

    if (isset($_POST['login'])) {
        $info = $_POST;
        if (Queries::IfExsist("username", "users", $info['username'], "string")) {
            echo "The User Is Eist";
        } else {
            // GlobalFunctions::AlertMassage("This User Not Exist");
            BoxAlert("Error In user Name", "This User Name Not Valid");
        }
    }

    include ($tpl . "footer.php");
    ob_end_flush();