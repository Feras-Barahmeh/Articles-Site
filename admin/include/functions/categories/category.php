<?php
        class Categories {
            public static function Post () {
                isset($_POST['titleCategory']) ?     $titleCategory                 = filter_var($_POST['titleCategory'], FILTER_UNSAFE_RAW)    : $titleCategory    = NULL;
                isset($_POST['content'])       ?     $content                       = filter_var($_POST['content'], FILTER_UNSAFE_RAW)          : $content          = NULL;
                isset($_POST['IdUser'])        ?     $IdUser                        = filter_var($_POST['IdUser'], FILTER_UNSAFE_RAW)           : $IdUser           = NULL;

                return [
                    'titleCategory' => $titleCategory,
                    'content' => $content,
                    'IdUser' => $IdUser,
                ];
            }
        }

        class IfChangsCategoryInfo {
            public static function IfChangs() {
                $info = Categories::Post();
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
        }


        class ValidationCategory extends Categories {
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
        }
    
    