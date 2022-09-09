<?php

    class SingupPost {
        public static function Post() {
            $username = isset($_POST['username'])   ? filter_var($_POST['username'] , FILTER_UNSAFE_RAW)     : NULL;
            $password = isset($_POST['password'])   ? filter_var($_POST['password'] , FILTER_UNSAFE_RAW)     : NULL;
            $email    = isset($_POST['email'])      ? filter_var($_POST['email']    , FILTER_SANITIZE_EMAIL) : NULL;
            $fullname = isset($_POST['fullname'])   ? filter_var($_POST['fullname'] , FILTER_UNSAFE_RAW)     : NULL;
            return [
                "username" => $username,
                "password" => $password,
                "email" => $email,
                "fullname" => $fullname,
            ];
        }
    }


