<?php 


    class GlobalFunctions {
        public static function SitNamePage() {
            global $TITLE;
            if(isset($TITLE)) {
                echo  $TITLE;
            }
        }

        public static function SitBackBtn() {
            ?> <a href="<?php echo $_SERVER['HTTP_REFERER']?>"  class="form-btn back-btn">Back</a> <?php
        }

        public static function AlertMassage($mass, $typeAlert= 'danger') {
            ?> <div class="alert <?php echo $typeAlert?>"><?php echo $mass?></div> <?php
        }

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

            self::AlertMassage($mass, $typeAlert);

            self::AlertMassage('You Will Redirect To ' . $url . 'After '. $sec . 'sec', 'info');

            self::SitBackBtn();
            header('refresh:'.$sec . ';url='. $direct);
            exit();
        }


        public static function IfExsist($selector, $table, $ValueSelector, $debend='string') {
            $val = NULL;

            if ($debend === 'string') {
                $val = Queries::FromTable($selector, $table, 'WHERE ' . $selector . '= \'' . $ValueSelector . '\'', 'fetch');

            } else {
                $val = Queries::FromTable($selector, $table, 'WHERE ' . $selector . '= ' . $ValueSelector, 'fetch')[$selector];
            }

            if (! empty($val)) {
                return 1;
            } else {
                return 0;
            }
        } 

        public static function PrintErorrs($errors) {
            foreach ($errors as $error) {
                GlobalFunctions::AlertMassage($error);
            }
            GlobalFunctions::SitBackBtn();
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
            } else {
                $obj->AlertMassage("Can't Delete now try again later", 'danger');
            }
        }


        public static function FromTable($filed='*', $table, $condition=NULL, $typeFetch = 'fetchAll', $ordered = null, $typeOrders = 'DESC', $limit = NULL) {
            global $db;
            if($ordered === null) {

                $stmt = $db->prepare("SELECT $filed FROM $table $condition $limit");
            }

            else
                $stmt = $db->prepare("SELECT $filed FROM $table $condition ORDER BY $ordered $typeOrders $limit");
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
            if (isset($val) )  {
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



    class Images {

        public static function FileInfo() {
            if (PostRequests::IfPOST()) {
                $info = $_FILES['imageName'];

                $name       = filter_var(strtolower($info['name']), FILTER_UNSAFE_RAW);
                $full_path  = filter_var($info['full_path'], FILTER_UNSAFE_RAW);
                $type       = filter_var($info['type'], FILTER_UNSAFE_RAW);
                $tmp_name   = filter_var($info['tmp_name'], FILTER_UNSAFE_RAW);
                $error      = filter_var($info['error'], FILTER_SANITIZE_NUMBER_INT);
                $size       = filter_var($info['size'], FILTER_SANITIZE_NUMBER_INT);
    
                return [
                    'name'      => $name,
                    'full_path' => $full_path,
                    'type'      => $type,
                    'tmp_name'  => $tmp_name,
                    'error'     => $error,
                    'size'      => $size,
                ];
            }
        }

        public static function GetNameImgFromDB($nameCol, $nameTable , $where ) {
            return  Queries::FromTable($nameCol, $nameTable,  $where , 'fetch')['imageName'];
        }

        public static function NameImg($table, $ColCondition) {
            $info = self::FileInfo();

            if ( ! empty($info['name']) ) {
                $imgName = self::RenameName($info['name']);
                return $imgName;
            } else {
                $imgName = Queries::FromTable('imageName', $table, "WHERE $ColCondition = " . GetRequests::GetValueGet($ColCondition), 'fetch')['imageName'];
                return $imgName;
            }

            return NULL;
            
        }

        public static function ValidExtension($extension) {
            $extension = explode('.', $extension);
            $validExtension = ['jpeg', 'jpg', 'png', 'gif'];
            if(in_array(end($extension), $validExtension))  return true; else return false;
        }

        public static function RenameName($currentName) {
            if (! empty($currentName)) {
                return $currentName .GetRequests::GetNum() . "_" . $currentName;
            }
        }


        public static function controllerUplodeProcess($FolderName) {
            $info = self::FileInfo(); global $commfilesuploaded;

            if (self::ValidExtension($info['name'])) {

                if ( ! empty( $info['name']) ) {
                    $info['name'] = self::RenameName($info['name']);

                    # Add Remove Old Image

                    move_uploaded_file($info['tmp_name'], $commfilesuploaded . $FolderName . '/' . $info['name']);
                }
            }
        }

        public static function SetImg($path, $nameImg, $class = NULL ) {
            global $commfilesImags;

            if ( ! empty ($nameImg)) {
                ?> <img src="<?php echo $path . $nameImg ?>" alt="Image" class="<?php echo $class ?>"> <?php
            } else {
                ?>  <img src="<?php echo $commfilesImags ?>/imagesProject/defaultImg.jpg" alt="Image" class="<?php echo $class ?>"> <?php
            }

        }


        public static function IfValidImage( & $ERRORS) {

            $info = self::FileInfo();

            if ( ! empty($info['name']) ) {
                // name
                    if ( ! self::ValidExtension($info['name']) ) {
                        array_push($ERRORS, 'Unvalid Extension Permissible jpeg, jpg, png, gif extensions');
                    }
                // size
                    if ($info['size'] > 51194 * 3) {
                        array_push($ERRORS, 'Large Image Size Must be less Than' . 51194 * 3);
                    }

            } elseif(! empty($info['name']) &&  !empty(GetRequests::GetValueGet('edit')) ) {
                array_push($ERRORS, 'Can\'t Empty Image Name');
            }
        }
    }


