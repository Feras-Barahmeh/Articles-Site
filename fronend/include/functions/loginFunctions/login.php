<?php 
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
