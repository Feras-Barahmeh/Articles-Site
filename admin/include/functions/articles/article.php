<?php 
        interface IArticle {
            public static function IfValidArticleInfo();
        }

        class Articles {
            public static function FromPost() {
                isset($_POST['titleArticle']) ? $titleArticle                = addslashes(filter_var($_POST['titleArticle'], FILTER_UNSAFE_RAW))          : $titleArticle          = NULL;
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
        }

        class ValidationArticleAdd implements IArticle {
            public static function IfValidArticleInfo() {
                $info = Articles::FromPost(); $errors = [];
                if ( empty($info['titleArticle']) ) {
                    array_push($errors, "Title Artical Can't Be Empty");
                }

                if (Queries::Counter("titleArticle", "articles", "WHERE content = '{$info['titleArticle']}'") >= 1) {
                    array_push($errors, "This Title arady used");
                }

                if (Queries::Counter("content", "articles", "WHERE content = '{$info['content']}'") >= 1) {
                    array_push($errors, "This article alrady used");
                }

                if ( empty($info['content']) ) {
                    array_push($errors, "Content Artical Can't Be Empty");
                }

                // Chenk To Image
                if (! empty(ImagePost::FileInfo()['name'])) {
                    ValidationInputWhenAdd::IfValidImage($errors);
                }
    
                if (!empty($errors)) {
                    GlobalFunctions::PrintErorrs($errors);
                } else {
                    return true;
                }
            }
        }

        class ValidationArticleEdit implements IArticle {
            public static function IfValidArticleInfo() {
                $info = Articles::FromPost(); $errors = [];
                if ( empty($info['titleArticle']) ) {
                    array_push($errors, "Title Artical Can't Be Empty");
                }

                if ( empty($info['content']) ) {
                    array_push($errors, "Content Artical Can't Be Empty");
                }

                // Chenk To Image
                if (! empty(ImagePost::FileInfo()['name'])) {
                    ValidationInputWhenEdit::IfValidImage($errors);
                }

                if (!empty($errors)) {
                    GlobalFunctions::PrintErorrs($errors);
                } else {
                    return true;
                }
            }
        }


        class FetchChanged extends Articles {
            public static function IfChangs() {
                $data = Queries::FromTable('*', 'articles', "WHERE IdArticle = " . GetRequests::GetValueGet('IdArticle'), 'fetch');
                $post = self::FromPost();
                $postImg = ImagePost::FileInfo();
    
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