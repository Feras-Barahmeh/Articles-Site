<?php 

    class Users {
        public static function GetInfoUserFromPOST() {

            isset($_POST['IdUser']) ? $IdUser       = filter_var($_POST['IdUser'], FILTER_SANITIZE_NUMBER_INT)  : $IdUser = NULL;
            isset($_POST['userName']) ? $userName   = filter_var($_POST['userName'], FILTER_SANITIZE_STRING)         : $userName = NULL;
            isset($_POST['password']) ? $password   = filter_var($_POST['password'], FILTER_SANITIZE_STRING)         : $password = NULL;
            isset($_POST['email']) ? $email         = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)        : $email = NULL;
            isset($_POST['fullName']) ? $fullName   = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING)         : $fullName = NULL;
            isset($_POST['permission']) ? $permission       = filter_var($_POST['permission'], FILTER_SANITIZE_NUMBER_INT)  : $permission = NULL;
            isset($_POST['imageName']) ? $imageName       = filter_var($_POST['imageName'], FILTER_SANITIZE_NUMBER_INT)  : $imageName = NULL;

            return [
                'IdUser'            => $IdUser,
                'userName'          => $userName,
                'password'          => $password,
                'fullName'          => $fullName,
                'email'             => $email,
                'permission'            => $permission,
                'imageName'         => $imageName,
            ];
        }


        public static function InsertInDB() {
            $info = Users::GetInfoUserFromPOST();
            $infoImg = Images::FileInfo();
            global $db;
            $stmt = $db->prepare("INSERT INTO 
                                        users 
                                            (userName, password, email, fullName, permission, dataRegister, imageName)
                                        VALUES 
                                            (:userName, :password, :email, :fullName, :permission, NOW(), :imageName)
                                ");
            $stmt->execute([
                'userName'  => $info['userName'],
                'password'  => password_hash($info['password'], PASSWORD_DEFAULT),
                'email'     => $info['email'],
                'fullName'  => $info['fullName'],
                'permission'    => $info['permission'],
                'imageName' => Images::RenameName($infoImg['name']),
            ]);

            if ($stmt) {
                Images::controllerUplodeProcess();
                GlobalFunctions::Redirect('Sucsses Add User', 'back', 'success', 1000); 
            } else {
                echo "Found sum errore";
            }
        }
    }

    class ValidationInput {

        public static function ValidationInput() {
            $ERRORS = [];
            $info = Users::GetInfoUserFromPOST();
            // Start user Name
                strtolower($info['userName']);
                if (strlen($info['userName']) <= 3 ) {
                    array_push($ERRORS, 'User Name Must Be Grater Than 3');
                }

            // Start password
                if (strlen($info['password']) <= 3) {
                    array_push($ERRORS, 'Password very week use characters and number');
                }
            // Start Full name
                if (strlen($info['fullName']) >= 25) {
                    array_push($ERRORS, 'To long name must be less than 26 Character');
                }
            
            // Start permission 
                if ($info['permission'] < 0 || $info['permission'] > 2) {
                    array_push($ERRORS, 'permission Must between 0 to 2');
                }
            // Start Email
                if (strlen($info['email']) == 0) {
                    array_push($ERRORS, 'Must Enter Email To verify Acount');
                }

            // Image
                Images::IfValidImage($ERRORS);

            if (!empty($ERRORS)) {
                HandleErrors::PrintErorrs($ERRORS);
            } elseif (count($ERRORS) == 1) {
                GlobalFunctions::AlertMassage($ERRORS[0]);
            } else {
                return true;
            }

        }
    }