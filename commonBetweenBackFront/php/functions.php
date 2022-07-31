<?php 

    class GlobalFunctions {
        public static function SitNamePage() {
            global $TITLE;
            if(isset($TITLE)) {
                echo  $TITLE;
            }
        }
    }

    class GetRequests {
        public static function IfGet() {
            if(isset($_GET)) {
                return true;
            }
        }

        public static function GetValueGet($nameGet) {
            if (GetRequests::IfGet() && isset($_GET[$nameGet])) {
                return $_GET[$nameGet];
            } 
        }
    }



