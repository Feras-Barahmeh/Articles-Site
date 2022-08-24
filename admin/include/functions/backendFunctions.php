<?php 


    class Backend {
        public static function PrintWriters() {
            $data = Queries::FromTable('IdUser, userName', 'users', "WHERE permission > 0");

            foreach($data as $info) {
            ?>
                <option value="<?php echo $info['IdUser'] ?>"><?php echo $info['userName'] ?></option>
            <?php 
            }
        }
    }

    class Articles {
        public static function FromPost() {
            isset($_POST['titleArticle']) ? $titleArticle                = filter_var($_POST['titleArticle'], FILTER_UNSAFE_RAW)          : $titleArticle          = NULL;
            isset($_POST['IdUser']) ? $IdUser                = filter_var($_POST['IdUser'], FILTER_SANITIZE_NUMBER_INT)          : $titleArticle          = NULL;
            isset($_POST['content']) ? $content                = filter_var($_POST['content'], FILTER_UNSAFE_RAW)          : $content          = NULL;
            isset($_POST['categoryID']) ? $categoryID                = filter_var($_POST['categoryID'], FILTER_SANITIZE_NUMBER_INT)          : $categoryID          = NULL;
            return [
                'titleArticle' => $titleArticle,
                'IdUser' => $IdUser,
                'categoryID' => $categoryID,
                'content' => $content,
            ];
        }

        public static function Insert() {
            global $db; $info = self::FromPost();
            $tools = new GlobalFunctions();

            $stmt = $db->prepare("INSERT INTO 
                                        articles( titleArticle , content, IdUser, imageName, categoryID, additionDate ) 
                                VALUES  
                                        (:titleArticle, :content, :IdUser, :imageName, :categoryID, NOW() ) ");
            $stmt->execute([
                'titleArticle' => $info['titleArticle'],
                'content' => $info['content'],
                'IdUser' => $info['IdUser'],
                'imageName' => Images::NameImg('articles', 'IdArticle'),
                'categoryID' => $info['categoryID'],
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
                                        titleArticle = :titleArticle, IdUser = :IdUser, content = :content, imageName = :imageName, categoryID = :categoryID
                                    WHERE
                                        IdArticle = :IdArticle" );

            $stmt->execute([
                'titleArticle'  => $info['titleArticle'],
                'IdUser'        => $info['IdUser'],
                'content'       => $info['content'],
                'imageName'     => Images::NameImg('articles', 'IdArticle'),
                'categoryID'       => $info['categoryID'],
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

    class Categories {
        public static function Post () {
            isset($_POST['titleCategory']) ? $titleCategory                = filter_var($_POST['titleCategory'], FILTER_SANITIZE_STRING)          : $titleCategory          = NULL;
            isset($_POST['content']) ? $content                = filter_var($_POST['content'], FILTER_SANITIZE_STRING)          : $content          = NULL;
            isset($_POST['IdUser']) ? $IdUser                = filter_var($_POST['IdUser'], FILTER_SANITIZE_STRING)          : $IdUser          = NULL;

            return [
                'titleCategory' => $titleCategory,
                'content' => $content,
                'IdUser' => $IdUser,
            ];
        }

        public static function ValidationInput() {
            $info = self::Post(); $errors = [];

            if ( empty($info['titleCategory']) ) {
                array_push($errors, "Can't insert empty titel");
            }

            if (empty($errors)) {
                return true;
            } else {
                GlobalFunctions::PrintErorrs($errors);
            }
        }

        public static function Insert () {
            global $db; $info = self::Post();
            $stmt = $db->prepare("INSERT INTO
                                        categories(titleCategory, content, additionDate, IDwriter) 
                                VALUES
                                        (:titleCategory, :content, NOW(), :IDwriter )
                                ");

            $stmt->execute([
                'titleCategory' => $info['titleCategory'],
                'content' => $info['content'],
                'IDwriter' => $info['IdUser'],
            ]);

            if ($stmt->rowCount() > 0 ) {
                GlobalFunctions::AlertMassage("Success Insert Category", "success");
                GlobalFunctions::SitBackBtn();
            }
            else {
                GlobalFunctions::AlertMassage("Not Insert Category, Try again Later", "danger");
                GlobalFunctions::SitBackBtn();

            }
        }

        public static function IfChangs() {
            $info = self::Post();
            $registerdInfo = Queries::FromTable("*", 'categories', "WHERE IdCategory = " . GetRequests::GetValueGet('IdCategory'), 'fetch');
            if ($info['titleCategory'] !== $registerdInfo['titleCategory']) {
                $_POST['titleCategory'] = $info['titleCategory'];
            }

            if ($info['content'] !== $registerdInfo['content']) {
                $_POST['content'] = $info['content'];
            }

            if ($info['IdUser'] !== $registerdInfo['IDwriter']) {
                $_POST['IdUser'] = $info['IdUser'];
            }
        }

        public static function Update() {
            global $db;
            $info = self::Post();

            $stmt = $db->prepare("UPDATE categories SET titleCategory = ?, content = ?, IDwriter = ? WHERE IdCategory = " . GetRequests::GetValueGet('IdCategory'));
            $stmt->execute([
                $info['titleCategory'],
                $info['content'],
                $info['IdUser'],
            ]);

            if ($stmt->rowCount() > 0 ) {
                GlobalFunctions::AlertMassage("Success Edit Information", 'success');;
                GlobalFunctions::SitBackBtn();
            } else {
                GlobalFunctions::AlertMassage("No Change in information", 'info');;
                GlobalFunctions::SitBackBtn();
            }
        }
    }

