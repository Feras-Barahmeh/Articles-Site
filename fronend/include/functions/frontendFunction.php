<?php
    class Configration {
        public static function SetTitle () {
            global $TITLE;
            if (isset($TITLE)) {
                echo $TITLE;
            } else {
                echo "Undefid Page";
            }
        }
    }