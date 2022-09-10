<?php
        require_once "QuerysLogin.php";

    class SetSession extends QuerysLogin {
        
        public static function AddToSesssion($permistion, $user) {
            $userInfo =  self::GetUser($user);


            if ($permistion === 1) {
                $_SESSION['adminName']  = $userInfo['userName'];
                $_SESSION['password']   = $userInfo['password'];
                $_SESSION['IdUser']     = $userInfo['IdUser'];
                return "admin";

            } else {
                unset($_SESSION['adminName']);
                $_SESSION['user']  = $userInfo['userName'];
                $_SESSION['password']   = $userInfo['password'];
                $_SESSION['IdUser']     = $userInfo['IdUser'];
                return "regular";
            }
        }
    }
