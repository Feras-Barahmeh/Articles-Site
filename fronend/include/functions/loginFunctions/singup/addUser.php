<?php
    require "validation.php";

    class AddUser {
        protected  static function QueryAdd () {
            $post = SingupPost::Post();
            global $db;
            $stmt = $db->prepare("INSERT INTO 
                                        `users` (`userName`, password, email, fullName)
                                VALUES
                                        (:userName, :password, :email, :fullName)
                                ");
            $stmt->execute([
                "userName" => $post['username'],
                "password" => password_hash($post['password'], PASSWORD_DEFAULT),
                "email" => $post['email'],
                "fullName" => $post['fullname'],
            ]);

            return $stmt->rowCount();
        }

        public static function AddUser () {
            if (IfValid::IfValid()) {
                if ( AddUser::QueryAdd() > 0) {
                    AddUser::IfDone(1);
                    return true;
                } else {
                    AddUser::IfDone(0);
                    return false;
                }
            }
        } 

        protected static function IfDone($RowCount) : void {
            if ($RowCount > 0) {
                StructerErrorsMass::AlertError("Congratulations Your Are Member Now Be happe ❤️", "done");
            } else {
                StructerErrorsMass::AlertError("We Are Sorry Can't Singup Now Try Again later 😞", "daner");
            }
        }
    }