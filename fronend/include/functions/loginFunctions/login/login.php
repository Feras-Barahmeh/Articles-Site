<?php 

    require_once "../commonBetweenBackFront/php/functions.php";
    require_once "QuerysLogin.php";
    require_once "session.php";
    require_once "cookies.php";

    class Login {
        public static function Post() {
            $userName = isset($_POST['username']) ? $_POST['username'] : NULL;
            $password = isset($_POST['password']) ? $_POST['password'] : NULL;
            return [
                "userName" => $userName,
                "password" => $password,
            ];
        }
    }

    class SinglePost extends Login {
        public static function UserName (){
            global $userName;
            return $userName;
        }

        public static function Password (){
            global $password;
            return $password;
        }
    }

    class PrepareToLogin extends QuerysLogin {
        public static function login () {
            if (isset($_POST['login'])) {
                $info = $_POST;
                if (self::IfExist($info['username'])) {
                    $permistion = self::GetPermissionUser($info["username"]);
                    $passwordDB = self::GetPassword($info['username']);

                    // Validation Password
                    if (password_verify($info['password'], $passwordDB)) {
                        
                        $directory = SetSession::AddToSesssion($permistion, $info['username']) ;
                        // Cultivation Cookies
                        CultivationCookies::cultivation();
                        if ( $directory == "admin") {
                            header("Location: ../../admin/dashbord.php");
                        } elseif ($directory === "regular") {

                            header("Location: profile.php?user=" . $_SESSION['user']);
                        }
                    } else {
                        BoxAlert("Error In Password", "Invalid Password 😅");
                    }
    
                } else {
                    BoxAlert("Error In User Name 😞!!", "This User Name Not Valid");
                }
            } else {
                return false;
            }
        }
    }


