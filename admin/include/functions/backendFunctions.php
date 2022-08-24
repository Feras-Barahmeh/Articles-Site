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

