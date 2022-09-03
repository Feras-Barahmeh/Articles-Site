<?php

        interface IValisation {
            public static function IfValid();
        }

        class Users {

            public static function Post() {
                isset($_POST['IdUser']) ? $IdUser                = filter_var($_POST['IdUser'], FILTER_SANITIZE_NUMBER_INT)          : $IdUser          = NULL;
                isset($_POST['userName']) ? $userName            = filter_var($_POST['userName'], FILTER_UNSAFE_RAW)            : $userName        = NULL;
                isset($_POST['password']) ? $password            = filter_var($_POST['password'], FILTER_UNSAFE_RAW)            : $password        = NULL;
                isset($_POST['email']) ? $email                  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)                : $email           = NULL;
                isset($_POST['fullName']) ? $fullName            = filter_var($_POST['fullName'], FILTER_UNSAFE_RAW)            : $fullName        = NULL;
                isset($_POST['permission']) ? $permission        = filter_var($_POST['permission'], FILTER_SANITIZE_NUMBER_INT)      : $permission      = NULL;
                isset($_POST['age']) ? $age                      = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT)             : $age             = NULL;
                isset($_POST['imageName']) ? $imageName          = filter_var($_POST['imageName'], FILTER_SANITIZE_NUMBER_INT)       : $imageName       = NULL;
                isset($_POST['registerdPass']) ? $registerdPass  = $_POST['registerdPass']                                           : $registerdPass   = NULL;
                isset($_POST['aboutYou']) ? $aboutYou            = filter_var($_POST['aboutYou'], FILTER_UNSAFE_RAW)                 : $aboutYou        = NULL;
                isset($_POST['langs']) ? $langs    = filter_var($_POST['langs'], FILTER_UNSAFE_RAW)             : $langs    = NULL;
                isset($_POST['tools']) ? $tools    = filter_var($_POST['tools'], FILTER_UNSAFE_RAW)             : $tools    = NULL;

                $data =  [
                    'IdUser'                => $IdUser,
                    'userName'              => $userName,
                    'password'              => $password,
                    'fullName'              => $fullName,
                    'email'                 => $email,
                    'permission'            => $permission,
                    'imageName'             => $imageName,
                    'registerdPass'         => $registerdPass,
                    'aboutYou'              => $aboutYou,
                    'langs'                 => $langs,
                    'tools'                 => $tools,
                    'age'                   => $age,
                ];

                return $data;
            }
        }


        class ValidationInputInsert implements IValisation {
            public static function IfValid() {
                $info = Users::Post(); $ERRORS = [];

                if (  Queries::IfExsist('userName', 'users', $info['userName'])) {
                    array_push($ERRORS, 'This User Name used');
                }

                if (strlen(strtolower($info['userName'])) <= 3) {
                    array_push($ERRORS, 'User Name Must Be Grater Than 3');
                }

                if (strlen($info['password']) <= 3 ) {
                    array_push($ERRORS, 'Password very week use characters and number');
                }

                if (strlen($info['fullName']) >= 25 ) {
                    array_push($ERRORS, 'To long name must be less than 26 Character');
                }

                if ($info['permission'] < 0 || $info['permission'] > 2) {
                    array_push($ERRORS, 'permission Must between 0 to 2');
                }

                if (strlen($info['email']) == 0) {
                    array_push($ERRORS, 'Must Enter Email To verify Acount');
                }

                // Image validation
                ValidationInputWhenAdd::IfValidImage($ERRORS);

                // Print Error If Founded
                return PrintErrors::IfNoError($ERRORS);
            }
        }

        class ValidationInputUpdate implements IValisation {
            public static function IfValid() {
                $info = Users::Post(); $ERRORS = [];

                if (strlen(strtolower($info['userName'])) <= 3) {
                    array_push($ERRORS, 'User Name Must Be Grater Than 3');
                }

                if (strlen($info['password']) <= 3 ) {
                    array_push($ERRORS, 'Password very week use characters and number');
                }

                if (strlen($info['fullName']) >= 25 ) {
                    array_push($ERRORS, 'To long name must be less than 26 Character');
                }

                if ($info['permission'] < 0 || $info['permission'] > 2) {
                    array_push($ERRORS, 'permission Must between 0 to 2');
                }

                if (strlen($info['email']) == 0) {
                    array_push($ERRORS, 'Must Enter Email To verify Acount');
                }

                // Image validation
                ValidationInputWhenEdit::IfValidImage($ERRORS);

                // Print Error If Founded
                return PrintErrors::IfNoError($ERRORS);
            }
        }


        class IfChangs {
            
        public static function ChangesFaild() {
            $info = Users::Post();
            $FromDB = Queries::FromTable('*', 'users', "WHERE IdUser = " . GetRequests::GetValueGet('IdUser'), 'fetch');

            if (  $info['userName'] !== $FromDB['userName'] && ($info['userName'] == NULL || $info['userName'] == null)) {
                $_POST['userName'] = $FromDB['userName'];
            }

            if (  !empty($info['password']) ) {
                $_POST['password'] = $FromDB['password'];

            } else {
                // $_POST['password'] = password_hash( $info['password'], PASSWORD_DEFAULT);
                $_POST['password'] = $FromDB['password'];
            }

            if (  $info['email'] !== $FromDB['email'] && empty($info['email']) ) {
                $_POST['email'] = $FromDB['email'];
            }

            if (  $info['fullName'] !== $FromDB['fullName'] && empty($info['fullName'])) {
                $_POST['fullName'] = $FromDB['fullName'];
            }

            if (  $info['aboutYou'] !== $FromDB['aboutYou'] && empty($info['aboutYou'])) {
                $_POST['aboutYou'] = $FromDB['aboutYou'];
            }

            if (  $info['langs'] !== $FromDB['langs'] && empty($info['langs'])) {
                $_POST['langs'] = $FromDB['langs'];
            }

            if (  $info['tools'] !== $FromDB['tools'] && empty($info['tools'])) {
                $_POST['tools'] = $FromDB['tools'];
            }

            if (  $info['age'] !== $FromDB['age'] &&  empty($info['age'])) {
                $_POST['age'] = $FromDB['age'];
            }

            if (  $info['imageName'] !== $FromDB['imageName'] && empty($info['imageName']) ) {
                $_POST['imageName'] = $FromDB['imageName'];
            }

            $result =  ValidationInputUpdate::IfValid('update');

            return $result;
        }
        }

    class PrintErrors  {

        public static function IfNoError(&$ERRORS) {
            if (!empty($ERRORS)) {
                GlobalFunctions::PrintErorrs($ERRORS);
            }  else {
                return true;
            }
        }
    }