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

    class StructerErrorsSingup {
        public static function AlertError ($e) {
            ?>
                <div id="alert-mass" class="mass">
                    <div class="content-mass">
                        <p><?php echo $e ?></p>
                        <span id="del-mass"><i class="fa-solid fa-x"></i></span>
                    </div>
                </div>
            <?php
        }
    }