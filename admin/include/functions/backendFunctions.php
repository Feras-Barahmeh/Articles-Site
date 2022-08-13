<?php 

    class Users {

        public static function FromPost() {

            isset($_POST['IdUser']) ? $IdUser                = filter_var($_POST['IdUser'], FILTER_SANITIZE_NUMBER_INT)          : $IdUser          = NULL;
            isset($_POST['userName']) ? $userName            = filter_var($_POST['userName'], FILTER_SANITIZE_STRING)            : $userName        = NULL;
            isset($_POST['password']) ? $password            = filter_var($_POST['password'], FILTER_SANITIZE_STRING)            : $password        = NULL;
            isset($_POST['email']) ? $email                  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)                : $email           = NULL;
            isset($_POST['fullName']) ? $fullName            = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING)            : $fullName        = NULL;
            isset($_POST['permission']) ? $permission        = filter_var($_POST['permission'], FILTER_SANITIZE_NUMBER_INT)      : $permission      = NULL;
            isset($_POST['age']) ? $age                      = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT)             : $age             = NULL;
            isset($_POST['imageName']) ? $imageName          = filter_var($_POST['imageName'], FILTER_SANITIZE_NUMBER_INT)       : $imageName       = NULL;
            isset($_POST['registerdPass']) ? $registerdPass  = $_POST['registerdPass']                                           : $registerdPass   = NULL;
            isset($_POST['aboutYou']) ? $aboutYou            = filter_var($_POST['aboutYou'], FILTER_UNSAFE_RAW)                 : $aboutYou        = NULL;
            isset($_POST['langAndTools']) ? $langAndTools    = filter_var($_POST['langAndTools'], FILTER_UNSAFE_RAW)             : $langAndTools    = NULL;


            $data =  [
                'IdUser'                => $IdUser,
                'userName'              => $userName,
                'password'              => $password,
                'fullName'              => $fullName,
                'email'                 => $email,
                'permission'            => $permission,
                'imageName'             => $imageName,
                'registerdPass'         => $registerdPass,
                'aboutYou'              => $aboutYou,
                'langAndTools'          => $langAndTools,
                'age'                   => $age,
            ];

            return $data;
        }


        public static function InsertToDB() {
            $info = Users::FromPost();
            $infoImg = Images::FileInfo();
            global $db;

            $stmt = $db->prepare("INSERT INTO 
                                        users 
                                            (userName, password, email, fullName, permission, dataRegister, imageName)
                                        VALUES 
                                            (:userName, :password, :email, :fullName, :permission, NOW(), :imageName)
                                ");
            $stmt->execute([
                'userName'  => $info['userName'],
                'password'  => password_hash($info['password'], PASSWORD_DEFAULT),
                'email'     => $info['email'],
                'fullName'  => $info['fullName'],
                'permission'    => $info['permission'],
                'imageName' =>  Images::RenameName($infoImg['name']),
            ]);

            if ( $stmt->rowCount() > 0 ) {
                Images::controllerUplodeProcess('users');
                GlobalFunctions::Redirect('Sucsses Add User', 'back', 'success', 1000); 
            } else {
                echo "Found sum errore";
            }
        }


        public static function UpdateToDB($nameTable) {
            $info = Users::FromPost();
            global $db;


            $stmt = $db->prepare("UPDATE
                                        $nameTable
                                    SET
                                        userName = ?, password = ?, email = ?, fullName = ?, age = ?, aboutYou = ?, langAndTools = ?, imageName = ?
                                    WHERE
                                        IdUser = ?");

            $stmt->execute([
                $info['userName'],
                $info['password'],
                $info['email'],
                $info['fullName'],
                $info['age'],
                $info['aboutYou'],
                $info['langAndTools'],
                Images::NameImg('users', 'IdUser'),
                GetRequests::GetValueGet('IdUser'),
            ]);

            if ($stmt->rowCount() > 0) {
                Images::controllerUplodeProcess('users');
                GlobalFunctions::Redirect('Sucsses Edit Information', 'back', 'success', 1000);

            } else {
                GlobalFunctions::AlertMassage("No Changed in information");
                GlobalFunctions::SitBackBtn();
            }
        }


        public static function ValidationInput() {
            $ERRORS = [];
            $info = Users::FromPost();

                if (strlen(strtolower($info['userName'])) <= 3) {
                    array_push($ERRORS, 'User Name Must Be Grater Than 3');
                }

                if (strlen($info['password']) <= 3 ) {
                    array_push($ERRORS, 'Password very week use characters and number');
                }

                if (strlen($info['fullName']) >= 25 ) {
                    array_push($ERRORS, 'To long name must be less than 26 Character');
                }

                if ($info['permission'] < 0 || $info['permission'] > 2) {
                    array_push($ERRORS, 'permission Must between 0 to 2');
                }

                if (strlen($info['email']) == 0) {
                    array_push($ERRORS, 'Must Enter Email To verify Acount');
                }

                // Image
                    Images::IfValidImage($ERRORS);


            if (!empty($ERRORS)) {
                GlobalFunctions::PrintErorrs($ERRORS);
            } elseif (count($ERRORS) == 1) {
                GlobalFunctions::AlertMassage($ERRORS[0]);
            } else {
                return true;
            }

        }
    }


    class Articles {
        public static function FromPost() {
            isset($_POST['titleArticle']) ? $titleArticle                = filter_var($_POST['titleArticle'], FILTER_SANITIZE_STRING)          : $titleArticle          = NULL;
            isset($_POST['IdUser']) ? $IdUser                = filter_var($_POST['IdUser'], FILTER_SANITIZE_NUMBER_INT)          : $titleArticle          = NULL;
            isset($_POST['content']) ? $content                = filter_var($_POST['content'], FILTER_SANITIZE_STRING)          : $content          = NULL;
            
            return [
                'titleArticle' => $titleArticle,
                'IdUser' => $IdUser,
                'content' => $content,
            ];
        }

        public static function Insert() {
            global $db; $info = self::FromPost();
            $tools = new GlobalFunctions();

            $stmt = $db->prepare("INSERT INTO 
                                        articles( titleArticle , content, IdUser, imageName, additionDate ) 
                                VALUES  
                                        (:titleArticle, :content, :IdUser, :imageName, NOW() ) ");
            $stmt->execute([
                'titleArticle' => $info['titleArticle'],
                'content' => $info['content'],
                'IdUser' => $info['IdUser'],
                'imageName' => Images::NameImg('articles', 'IdArticle'),
            ]);

            if ($stmt->rowCount() > 0 ) {
                $tools->AlertMassage(" Inserted Article successfully", 'success');
                $tools->SitBackBtn();

            } else {
                $tools->AlertMassage("Sorry, Not insertes Article, try again later");
            }
        }

        public static function IfValidInput() {
            $info = self::FromPost(); $errors = [];

            if ( empty($info['titleArticle']) ) {
                array_push($errors, "Title Artical Can't Be Empty");
            }

            if ( empty($info['content']) ) {
                array_push($errors, "Content Artical Can't Be Empty");
            }

            Images::IfValidImage($errors);

            if (!empty($errors)) {
                GlobalFunctions::PrintErorrs($errors);
            } else {
                return true;
            }
        }

        public static function Update() {
            global $db;
            $info = self::FromPost();
            $tools = new GlobalFunctions();

            $stmt = $db->prepare("UPDATE 
                                        articles
                                    SET
                                        titleArticle = :titleArticle, IdUser = :IdUser, content = :content, imageName = :imageName
                                    WHERE
                                        IdArticle = :IdArticle" );

            $stmt->execute([
                'titleArticle'  => $info['titleArticle'],
                'IdUser'        => $info['IdUser'],
                'content'       => $info['content'],
                'imageName'     => Images::NameImg('articles', 'IdArticle'),
                'IdArticle'     => GetRequests::GetValueGet('IdArticle')
            ]);

            if ($stmt->rowCount() > 0 ) {
                $tools->AlertMassage("Success Edit", 'success');
                $tools->SitBackBtn();
            } else {
                $tools->AlertMassage("No Changed in information");
                $tools->SitBackBtn();

            }
        }

        public static function IfChangs() {
            $data = Queries::FromTable('*', 'articles', "WHERE IdArticle = " . GetRequests::GetValueGet('IdArticle'), 'fetch');
            $post = self::FromPost();
            $postImg = Images::FileInfo();

            if ( empty($post['titleArticle']) ) {
                $_POST['titleArticle'] = $data['titleArticle'];
            }

            if ($post['IdUser'] != $data['IdUser']) {
                $_POST['IdUser'] = $post['IdUser'];
            }

            if ( empty ($postImg['name']) ) {
                $_FILES['name']  = $data['imageName'];
            }

            if ( empty ($post['content'])) {
                $_POST['content'] = $data['content'];
            }
        }
    }

