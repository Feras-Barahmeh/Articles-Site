<?php   
    class InsertArticle extends Articles {
        public static function Insert() {
            global $db; $info = self::FromPost();

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

            new IfExciteQuerie($stmt->rowCount());
        }
    }


    class UpdateArticle extends Articles {
        public static function Update() {
            global $db; $info = self::FromPost();
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
                'categoryID'    => $info['categoryID'],
                'IdArticle'     => GetRequests::GetValueGet('IdArticle')
            ]);

            new IfExciteQuerie($stmt->rowCount());
        }
    }

    class NameWriter {
        public static function NameWriter () {
            global $db;
            $stmt = $db->prepare("SELECT 
                                    users.userName,
                                    users.IdUser,
                                    articles.*
    
                                FROM
                                    users
                                INNER JOIN
                                    articles
                                ON
                                    users.IdUser = articles.IdUser
                                ORDER BY IdArticle DESC ");
            $stmt->execute();
    
            $names = $stmt->fetchAll();
    
            if ($stmt->rowCount() > 0 ) {
                return $names;
            } else {
                echo "Some Errors";
            }
        }
    }


    class IfExciteQuerie  {
        public function  __construct($rowCount) {
            $tools = new GlobalFunctions();
            if ($rowCount > 0 ) {
                $tools->AlertMassage("operation accomplished successfully", 'success');
                $tools->SitBackBtn();
            } else {
                $tools->AlertMassage("No Chaned in data", 'info');
                $tools->SitBackBtn();

            }
        }
    }