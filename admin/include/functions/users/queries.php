<?php 

    interface IQuerieDone {
        public static function IfQuerieDone($RowCount);
    }


    class Insert implements IQuerieDone {

        public static function Insert() {
            $info = Users::Post();
            $infoImg = ImagePost::FileInfo(); global $db;

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
                'imageName' =>  NameImag::RenameName($infoImg['name']),
            ]);
            self::IfQuerieDone($stmt->rowCount());
        }

        public static function IfQuerieDone($RowCount) {
            if ($RowCount > 0) {
                UplodeImageAdd::UplodeImage('users');
                GlobalFunctions::AlertMassage("operation accomplished successfully", 'success');
            } else {
                GlobalFunctions::AlertMassage("No Changed in information", 'info', 100);
                GlobalFunctions::SitBackBtn();
            }
        }
    }

    class Update implements IQuerieDone {
        public static function Update() {
            $info = Users::Post();
            global $db;

            $stmt = $db->prepare("UPDATE
                                        users
                                    SET
                                        userName = ?, password = ?, email = ?, fullName = ?, age = ?, aboutYou = ?, permission = ?, langs = ?, tools = ?, imageName = ?
                                    WHERE
                                        IdUser = ?");

            $stmt->execute([
                $info['userName'],
                $info['password'],
                $info['email'],
                $info['fullName'],
                $info['age'],
                $info['aboutYou'],
                $info['permission'],
                $info['langs'],
                $info['tools'],
                NameImag::NameImg('users', 'IdUser'),
                GetRequests::GetValueGet('IdUser'),
            ]);

            self::IfQuerieDone($stmt->rowCount());
        }

        public static function IfQuerieDone($RowCount) {

            if ($RowCount > 0) {
                UplodeImageEdit::UplodeImage('users');
                GlobalFunctions::AlertMassage('operation accomplished successfully', 'success');
            } else {
                GlobalFunctions::AlertMassage("No Changed in information", 'info', 100);
                GlobalFunctions::SitBackBtn();
            }
        }
    }
