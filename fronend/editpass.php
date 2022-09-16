<?php 
// Header Configration
    ob_start();
    session_start();
    $TITLE =  isset($_SESSION) && !empty($_SESSION) ? $_SESSION['user'] : "Undefined";
    $AllWidth = "null"; // To Set Width Nav 100%
    include ("init.php");

    function PreparePass() {
        $pass = filter_var($_POST['oldpassword'], FILTER_UNSAFE_RAW);
        $passConfirem = filter_var($_POST['confirem-old-password'], FILTER_UNSAFE_RAW);
        $passDB = Queries::FromTable("password", "users", "WHERE IdUser = {$_SESSION['IdUser']}", "fetch")["password"];

        return [
            "pass" => $pass,
            "passConfirem" => $passConfirem,
            "passDB" => $passDB,
        ];
    }

    function ifSamePass($DBpass, $formPass) {
        if (password_verify($formPass, $DBpass)) {
            return true;
        } else {
            return false;
        }
    }

    function ConfiremPass() {
        $pass = PreparePass();

        if ($pass['pass'] === $pass['passConfirem']) {
            if (ifSamePass($pass['passDB'], $pass['pass']) ) {
                header("Location: editpass.php?saveduser=true");
            } else {
                StructerErrorsMass::AlertError("Woring Password 😞😅", "danger");
            }
        } else {
            StructerErrorsMass::AlertError("Not Identical Password 😞", "danger");
        }
    }

    function ChangePassStructer() {
        ?>
            <div class="contanier-prosess-change-pass">
                <h3><i class="fa-solid fa-lock"></i><span>change Password</span></h3>
                <div class="form">
                    <h5>Edit Password</h5>
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="contnier-input">
                            <input
                                type="password"
                                name="newpassword"
                                required="required"
                                placeholder="New Password">
                            <label for="oldpassword">New Password</label>
                        </div>
                        <div class="contnier-input">
                            <input
                                type="password"
                                name="confirem-password"
                                required="required"
                                placeholder="Confirem New Password">
                                <label for="confirem-old-password">Confirem New Password</label>
                            </div>
                            
                            <input type="submit" name="change-pass" value="confirem">
                    </form>
                </div>
            </div>
        <?php
    }
    function GetNewPass() {
        $pass = filter_var($_POST['newpassword'], FILTER_UNSAFE_RAW);
        $passConf = filter_var($_POST['confirem-password'], FILTER_UNSAFE_RAW);
        return [
            "pass" => $pass,
            "passConf" => $passConf,
        ];
    }

    function ChangePass() {
        $mass = new StructerErrorsMass();
        $newPass = GetNewPass();
        if ($newPass['pass'] === $newPass['passConf']) {
            if (Queries::Update("users", "password", password_hash($newPass['pass'] , PASSWORD_DEFAULT), "WHERE IdUser = {$_SESSION['IdUser']}")) {
                $mass->AlertError("Success Update Passsword", "success-mas");
                $delay = 0;
                header("Refresh: $delay;"); 
            } else {
                $mass->AlertError("Fail Update Passsword", "danger");
            }
        } else {
            $mass ->AlertError("Not Identical Password 😞", "danger");
        }
    }

    function confiremPassStructer() {
        ?>
            <div class="contanier-prosess-change-pass" id="confirem-pass">
                <h3><i class="fa-solid fa-lock"></i><span>change Password</span></h3>
                <div class="form">
                    <h5>Confirem Password</h5>
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="contnier-input">
                            <input
                                type="password"
                                name="oldpassword"
                                required="required"
                                placeholder="Password">
                            <label for="oldpassword">Password</label>
                        </div>
                        <div class="contnier-input">
                            <input
                                type="password"
                                name="confirem-old-password"
                                required="required"
                                placeholder="Confirem Password">
                                <label for="confirem-old-password">Confirem Password</label>
                            </div>
                            
                            <input type="submit" name="confirem" value="confirem">
                    </form>
                </div>

            </div>
        <?php
    }
    confiremPassStructer();

    if (isset($_POST['confirem'])) {
        ConfiremPass();
    }

    if (GetRequests::GetValueGet("saveduser") == "true") {
        ChangePassStructer();
    }

    if (isset($_POST['change-pass'])) {
        ChangePass();
    }
// Footer Configration
    ?>
        <script src="layout/js/editpass.js"></script>
    <?php
    include ($tpl . "footer.php");
    ob_end_flush();