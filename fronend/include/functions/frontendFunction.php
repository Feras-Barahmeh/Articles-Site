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

    class StructerErrorsMass {
        public static function AlertError ($e, $type) {
            ?>
                <div id="alert-mass" class="mass <?php echo $type ?>">
                    <div class="content-mass">
                        <p><?php echo $e ?></p>
                        <span id="del-mass"><i class="fa-solid fa-x"></i></span>
                    </div>
                </div>
            <?php
        }
    }