<?php

    class QuerysLogin {
        protected static function GetPermissionUser($value) {
            $permission = Queries::FromTable("permission", "users", "WHERE username = '{$value}' OR email = '{$value}'", "fetch")['permission'];
            return $permission;
        }

        protected static function GetPassword($value) {
            $password = Queries::FromTable("password", "users", "WHERE username = '{$value}' OR email = '{$value}'", "fetch")['password'];
            return $password;
        }

        protected static function GetUser($depend) {
            $data = Queries::FromTable("*", "users", "WHERE username = '{$depend}' OR email = '{$depend}'", "fetch");
            return $data;
        }
        protected static function IfExist($value) : bool {
            if ( Queries::IfExsist("username", "users", $value, "string") 
            || Queries::IfExsist("email", "users", $value, "string")) {
                return true;
            } else {
                return false;
            }
        }
    }