<?php 

    class Insert extends Users {
        public static function Insert() {
            $info = self::Post();
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
                'imageName' =>  Images::RenameName($infoImg['name']),
            ]);

            new IfQuerieDone($stmt->rowCount());
        }
    }

    class Update extends Users {
        public static function Update() {
            $info = Users::Post();
            global $db;

            $stmt = $db->prepare("UPDATE
                                        users
                                    SET
                                        userName = ?, password = ?, email = ?, fullName = ?, age = ?, aboutYou = ?, permission = ?, langAndTools = ?, imageName = ?
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
                $info['langAndTools'],
                Images::NameImg('users', 'IdUser'),
                GetRequests::GetValueGet('IdUser'),
            ]);

            new IfQuerieDone($stmt->rowCount());
        }
    }

    class IfQuerieDone {
        public function __construct($rowCount) {
            $this->rowCount = $rowCount;
            if ($this->rowCount  > 0) {
                Images::controllerUplodeProcess('users');
                GlobalFunctions::Redirect('operation accomplished successfully', 'back', 'success', 100);

            } else {
                GlobalFunctions::AlertMassage("No Changed in information", 'info', 100);
                GlobalFunctions::SitBackBtn();
            }
        }

    }