<?php
    
    require "singup.php";

    class ValidUserName  {
        public static function UserName() {
            $Errors = [];
            $post = SingupPost::Post();
            $UserName = $post['username'];

            // check If User name not exist in db
            if (Queries::IfExsist("userName", "users",  $UserName, "string")) {
                array_push( $Errors, "This User Name Already Exist");
            }

            if (! filter_var($UserName, FILTER_UNSAFE_RAW)) {
                array_push($Errors, "Not Valid User Name");
            }

            // Length User Name
            if (strlen( $UserName ) < 4) {
                array_push( $Errors, "User name must be greater than three caracter");
            }
            if (strlen( $UserName ) > 10) {
                array_push( $Errors, "User name must be less than ten caracter");
            }

            if (! empty($Errors)) {
                return $Errors;
            } else {
                return true;
            }
        }
    }


    class ValidationPass {
        public static  function Password() {
            $Errors = [];
            $post = SingupPost::Post();
            $password = $post['password'];

            if (! filter_var($password, FILTER_UNSAFE_RAW)) {
                array_push($Errors, "Not Valid password");
            }

            // Length User Name
            if (strlen( $password ) < 4) {
                array_push( $Errors, "Password must be greater than three caracter");
            }
            if (strlen( $password ) > 15) {
                array_push( $Errors, "Password must be less than ten caracter");
            }

            if (! empty($Errors)) {
                return $Errors;
            } else {
                return true;
            }
        }
    }

    class ValidationEmail {
        public static  function Email() {
            $Errors = [];
            $post = SingupPost::Post();
            $email = $post['email'];

            if (! filter_var($email, FILTER_SANITIZE_EMAIL)) {
                array_push($Errors, "In valid Email");
            }

            // Length User Name
            if (strlen( $email ) < 5) {
                array_push( $Errors, "email must be greater than three caracter");
            }

            if (! empty($Errors)) {
                return $Errors;
            } else {
                return true;
            }
        }
    }

    class ValidationfullName {
        public static  function FullName() {
            $Errors = [];
            $post = SingupPost::Post();
            $fullName = $post['fullname'];

            if (! filter_var($fullName, FILTER_UNSAFE_RAW)) {
                array_push($Errors, "Not Valid Full name");
            }
            // Length User Name
            if (strlen( $fullName ) < 4) {
                array_push( $Errors, "Full Name must be greater than three caracter");
            }
            if (strlen( $fullName ) > 15) {
                array_push( $Errors, "FullName must be less than ten caracter");
            }

            if (! empty($Errors)) {
                return $Errors;
            } else {
                return true;
            }
        }
    }


    class IfValid  {
        public static function IfValid() {
            $error = [];
            $name = ValidUserName::UserName();
            if ($name !== true) {
                array_push($error, array_values($name));
            }
            // Password
            $pass = ValidationPass::Password();
            if ($pass !== true) {
                array_push($error, array_values($pass));
            }
            // Eamil
            $email = ValidationEmail::Email();
            if ($email !== true) {
                array_push($error, array_values($email));
            }
            // Full Name
            $fname = ValidationfullName::FullName();
            if ($fname !== true) {
                array_push($error, array_values($fname));
            }

            if (!empty($error)) {
                foreach ($error as $e) {
                    StructerErrorsMass::AlertError($e[0], "danger");
                }
            } else {
                return true;
            }
        }
    }