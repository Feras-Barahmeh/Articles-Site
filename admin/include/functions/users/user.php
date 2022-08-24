<?php
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
                isset($_POST['langAndTools']) ? $langAndTools    = filter_var($_POST['langAndTools'], FILTER_UNSAFE_RAW)             : $langAndTools    = NULL;

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
                    'langAndTools'          => $langAndTools,
                    'age'                   => $age,
                ];

                return $data;
            }
        }

        class ValidationInput {

            public static function IfValid($ValidTo) {
                $info = Users::Post(); $ERRORS = [];

                if ($ValidTo == 'update') {
                    if ( ! GlobalFunctions::IfExsist('userName', 'users', $info['userName'])) {
                        array_push($ERRORS, 'This User Name used');
                    }
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
                Images::IfValidImage($ERRORS);

                // Print Error If Founded
                return PrintErrors::IfNoError($ERRORS);
            }
        }


    class PrintErrors extends ValidationInput {

        public static function IfNoError(&$ERRORS) {
            if (!empty($ERRORS)) {
                GlobalFunctions::PrintErorrs($ERRORS);
            }  else {
                return true;
            }
        }
    }