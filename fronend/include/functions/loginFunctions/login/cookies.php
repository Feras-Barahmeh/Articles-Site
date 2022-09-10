<?php 

    require_once "login.php";

    class CultivationCookies extends QuerysLogin {
        public static function cultivation () {
            $info = Login::Post();
            setcookie("userName", $info['userName'], time() + (86400 * 30), "/");
            setcookie("password", $info['password'], time() + (86400 * 30), "/");

            $user = Queries::FromTable("permission, IdUser", "users", "WHERE userName = '" . $info['userName'] . "'", "fetch");

            setcookie("permission", $user['permission'], time() + (86400 * 30), "/");
            setcookie("IdUser", $user['IdUser'], time() + (86400 * 30), "/");
        }
    }