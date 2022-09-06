<?php 

    class Directions {

        public static function Redirect($mass, $direct=NULL, $typeAlert='info', $sec=200) {
            if ($direct === NULL) {
                $direct = 'index.php';
                $url = 'Home Page';
            } elseif ($direct === 'back') {
                $direct = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '' ? $direct = $_SERVER['HTTP_REFERER'] : 'index.php';
                $url = 'Previes page';
            } else {
                $url = $direct;
            }

            GlobalFunctions::AlertMassage($mass, $typeAlert);
            GlobalFunctions::AlertMassage('You Will Redirect To ' . $url . 'After '. $sec . 'sec', 'info');
            GlobalFunctions::SitBackBtn();
            header('refresh:'.$sec . ';url='. $direct);
            exit();
        }

        public static function SamePage($key) {

        }
    }

    class GlobalFunctions {
        public $db;
        public static function SetNamePage() {
            global $TITLE;
            if(isset($TITLE)) {
                echo  $TITLE;
            }
        }

        public static function SitBackBtn() {
            ?> <a href="<?php echo $_SERVER['HTTP_REFERER']?>"  class="btn-submit">Back</a> <?php
        }

        public static function AlertMassage($mass, $typeAlert= 'danger') {
            ?> <div class="alert <?php echo $typeAlert?>"><span><?php echo $mass?></span> <i id="X" class="fa-sharp fa-solid fa-xmark" onclick="removeAleart()"></i></div> <?php
        }


        public static function PrintErorrs($errors) {
            foreach ($errors as $error) {
                GlobalFunctions::AlertMassage($error);
            }
            GlobalFunctions::SitBackBtn();
        }

        public static function Search($NameJSFilterFunct='filter()', $position=NULL) {
            ?>
                <table class="saerch-table"  style="position: <?php echo $position ?>;">
                    <tr>
                        <td><i class="fas fa-search"></i></td>
                        <td><input type="text" placeholder="saerch" id="SearchValue"
                        onkeyup="<?php echo $NameJSFilterFunct ?>"></td>
                    </tr>
                </table>
            <?php
        }

    }

    class Queries {
        public static function Delete($table, $condition) {
            global $db;
            $obj = new GlobalFunctions();

            $stmt = $db->prepare("DELETE FROM $table WHERE $condition");
            $stmt->execute();

            if ($stmt->rowCount() > 0 ) {
                $obj->AlertMassage("Sucssess Delete", 'success');
                $obj->SitBackBtn();
            } 
        }


        public static function IfExsist($selector, $table, $ValueSelector, $debend='string') {
            $val = NULL;

            if ($debend === 'string') {
                $val = self::FromTable($selector, $table, 'WHERE ' . $selector . ' = \'' . $ValueSelector . '\'', 'fetch');

            } else {
                $val = self::FromTable($selector, $table, 'WHERE ' . $selector . ' = ' . $ValueSelector, 'fetch')[$selector];
            }

            if (! empty($val)) {
                return 1;
            } else {
                return 0;
            }
        } 


        public static function FromTable($filed='*', $table, $condition=NULL, $typeFetch = 'fetchAll', $ordered = null, $typeOrders = 'DESC', $limit = NULL) {
            global $db;
            if($ordered === null) {
                $stmt = $db->prepare("SELECT $filed FROM $table $condition $limit");
            } else {
                $stmt = $db->prepare("SELECT $filed FROM $table $condition ORDER BY $ordered $typeOrders $limit");
            }

            $stmt->execute();
    
            if ($typeFetch === 'fetchAll')
                $requerd = $stmt->fetchAll();

            elseif($typeFetch === 'fetch') {
                $requerd = $stmt->fetch();

            }
            return $requerd;
        }

        public static function Counter($columnName, $tableName, $where = NULL) {
            global $db;

            $stmt = $db->prepare("SELECT COUNT($columnName) FROM $tableName $where");

            $stmt->execute();

            $number = $stmt->fetch();

            if ($stmt->rowCount() > 0 ) {
                return $number[0];
            } else {
                echo "Random Nubmer";
            }

        }

    }

    class Sessions {
        public static function IfSetSession() {
            if (isset($_SESSION)) {
                return true;
            } else {
                return false;
            }
        }

        public static function IfSetSessionDepValue($key) {
            if ( ! empty($_SESSION[$key]) && isset( $_SESSION[$key] ) ) {
                return true;
            } else {
                return 0;
            }
        }

        public static function GetValueSessionDepKey($key) {
            if (self::IfSetSessionDepValue($key)) {
                return $_SESSION[$key];
            } else {
                return false;
            }
        }
    }

    class GetRequests {
        public static function IfGet() {
            if(! empty($_GET)) {
                return true;
            } else {
                return false;
            }
        }

        public static function GetValueGet($nameGet) {
            if (GetRequests::IfGet() && isset($_GET[$nameGet])) {
                return $_GET[$nameGet];
            }  
        }

        public static function IfSetValue($val) {
            if (isset($_GET[$val]) )  {
                return true;
            } else {
                return false;
            }
        }

        public static function GetNum() {
            if (self::IfGet()) {
                $gets = $_GET;
                foreach($gets as $get) {
                    if (is_numeric($get)) {
                        return $get;
                    }
                }
            }
        }
    }

    class PostRequests {
        public static function IfPOST() {
            if(! empty($_POST) && isset($_POST)) {
                return true;
            } else {
                return false;
            }
        }

        public static function GetValuePOST($nameGet) {
            if (PostRequests::IfPOST() && isset($_POST[$nameGet])) {
                return $_POST[$nameGet];
            }  
        }
    }


