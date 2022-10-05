<?php 

    interface IImageValidation {
        public static function IfValidImage(&$ERRORS);
    }

    interface IImageUplode {
        public static function UplodeImage($FolderName);
    }

    class ImagePost {
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
    }

    class NameImag {
        public static function GetNameImgFromDB($nameCol, $nameTable , $where ) {
            return  Queries::FromTable($nameCol, $nameTable,  $where , 'fetch')['imageName'];
        }

        public static function RenameName($currentName) {
            if (! empty($currentName)) {
                return $currentName .GetRequests::GetNum() . "_" . $currentName;
            }
        }

        public static function NameImg($table, $ColCondition) {
            $info = ImagePost::FileInfo();

            if ( ! empty($info['name']) ) {
                $imgName = self::RenameName($info['name']);
                return $imgName;
            } else {
                $imgName = Queries::FromTable('imageName', $table, "WHERE $ColCondition = " . GetRequests::GetValueGet($ColCondition), 'fetch')['imageName'];
                return $imgName;
            }

            return NULL;
            
        }

    }

    class ValidExtension {
        public static function ValidExtension($extension) {
            $extension = explode('.', $extension);
            $validExtension = ['jpeg', 'jpg', 'png', 'gif'];
            if(in_array(end($extension), $validExtension))  return true; else return false;
        }
    }

    class ValidationInputWhenAdd implements IImageValidation{

        public static function IfValidImage(&$ERRORS) {
            $info = ImagePost::FileInfo();

            // name
                if ( ! ValidExtension::ValidExtension($info['name']) ) {
                    array_push($ERRORS, 'Unvalid Extension Permissible jpeg, jpg, png, gif extensions');
                }

                if ( empty($info['name']) || !isset($info['name']))  {
                    array_push($ERRORS, "Must Enter Pictuer");
                }

            // size
                if ($info['size'] > 51194 * 3) {
                    array_push($ERRORS, 'Large Image Size Must be less Than ' . floor(51194 * 3 / 1000) . " Byte");
                }
        }

    }

    class ValidationInputWhenEdit implements IImageValidation{
        public static function IfValidImage(&$ERRORS) {
            $info = ImagePost::FileInfo();
            // name
                if ( ! ValidExtension::ValidExtension($info['name']) && ! empty($info['name'])) {
                    array_push($ERRORS, 'Unvalid Extension Permissible jpeg, jpg, png, gif extensions');
                }

            // size
                if ($info['size'] > 51194 * 3) {
                    array_push($ERRORS, 'Large Image Size Must be less Than' . 51194 * 3);
                }
        }
    }


    class UplodeImageAdd implements IImageUplode {
        public static function UplodeImage($FolderName) {
            $info = ImagePost::FileInfo(); global $commfilesuploaded;
            if (ValidExtension::ValidExtension($info['name'])) {
                if ( ! empty( $info['name']) ) {
                    $info['name'] = NameImag::RenameName($info['name']);
                    move_uploaded_file($info['tmp_name'], $commfilesuploaded . $FolderName . '/' . $info['name']);
                }
            }
        }
    }


    class UplodeImageEdit implements IImageUplode {
        public static function UplodeImage($FolderName) {

            $info = ImagePost::FileInfo(); global $commfilesuploaded;

            if (ValidExtension::ValidExtension($info['name'])) {

                if ( ! empty( $info['name']) ) {
                    $info['name'] = NameImag::RenameName($info['name']);
                    # Add code delete previes pictuer
                    move_uploaded_file($info['tmp_name'], $commfilesuploaded . $FolderName . '/' . $info['name']);
                }
            }
        }
    }

    class ShowImage {
        public static function SetImg($path, $nameImg, $class = NULL ) {
            global $commfilesImags;

            if ( ! empty ($nameImg)) {
                ?> <img src="<?php echo $path . $nameImg ?>" alt="Image" class="<?php echo $class ?>"> <?php
            } else {
                ?>  <img src="<?php echo $commfilesImags ?>/imagesProject/defaultImg.jpg" alt="Image" class="<?php echo $class ?>"> <?php
            }
        }
    }
