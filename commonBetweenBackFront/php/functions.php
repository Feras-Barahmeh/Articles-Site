<?php 


    // Calss
    class GlobalFunctions {
        public static function SitNamePage() {
            global $TITLE;
            if(isset($TITLE)) {
                echo  $TITLE;
            }
        }

        public static function SitBackBtn() {
            ?> <a href="<?php echo $_SERVER['HTTP_REFERER']?> "  class="form-btn back-btn">Back</a> <?php
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

            GlobalFunctions::AlertMassage($mass, $typeAlert);
            ?> <br> <br> <?php
            GlobalFunctions::AlertMassage('You Will Redirect To ' . $url . 'After '. $sec . 'sec', 'info');
            GlobalFunctions::SitBackBtn();
            header('refresh:'.$sec . ';url='. $direct);
            exit();
        }

        public static function FromTable($filed='*', $table, $condition=NULL,  $ordered = null, $typeOrders = 'DESC', $typeFetch = 'fetchAll', $limit = NULL) {
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


        public static function IfExsist($selector, $table, $ValueSelector, $debend='string') {
            $val = NULL;
            if ($debend === 'string') {
                $val = GlobalFunctions::FromTable($selector, $table, 'WHERE ' . $selector . '= \'' . $ValueSelector . '\'', NULL, NULL, 'fetch');
            } else {
                $val = GlobalFunctions::FromTable($selector, $table, 'WHERE ' . $selector . '= ' . $ValueSelector, NULL, NULL, 'fetch')[$selector];
            }

            if (empty($val[$selector])) {
                return true;
            } else {
                return false;
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

    class HandleErrors {
        public static function PrintErorrs($errors) {
            foreach ($errors as $error) {
                GlobalFunctions::AlertMassage($error);
            }
            GlobalFunctions::SitBackBtn();
        }
    }


    class Images {

        public static function FileInfo() {
            $info = $_FILES['imageName'];

            $name = filter_var(strtolower($info['name']), FILTER_SANITIZE_STRING);
            $full_path = filter_var($info['full_path'], FILTER_SANITIZE_STRING);
            $type = filter_var($info['type'], FILTER_SANITIZE_STRING);
            $tmp_name = filter_var($info['tmp_name'], FILTER_SANITIZE_STRING);
            $error = filter_var($info['error'], FILTER_SANITIZE_STRING);
            $size = filter_var($info['size'], FILTER_SANITIZE_NUMBER_INT);

            return [
                'name'      => $name,
                'full_path' => $full_path,
                'type'      => $type,
                'tmp_name'  => $tmp_name,
                'error'     => $error,
                'size'      => $size,
            ];
        }

        public static function ValidExtension($extension) {
            $extension = explode('.', $extension);
            $validExtension = ['jpeg', 'jpg', 'png', 'gif'];
            if(in_array(end($extension), $validExtension))  return true; else return false;
        }

        public static function RenameName($currentName) {
            $info = Users::GetInfoUserFromPOST();
            return $info['userName'] . "_" . $currentName;
        }

        public static function controllerUplodeProcess() {
            $info = Images::FileInfo(); global $commfilesuploaded;
            if (Images::ValidExtension($info['name'])) {
                $info['name'] = Images::RenameName($info['name']);
                move_uploaded_file($info['tmp_name'], $commfilesuploaded . 'users' . $info['name']);
            }
        }

        public static function IfValidImage(&$ERRORS) {
            $info = Images::FileInfo();
            // name
                if (!Images::ValidExtension($info['name'])) {
                    array_push($ERRORS, 'Un Valid Extension Permissible jpeg, jpg, png, gif extensions');
                }
            // size
                if ($info['size'] > 51194 * 3) {
                    array_push($ERRORS, 'Large Image Size Must be less Than' . 51194 * 3);
                }
        }
    }


