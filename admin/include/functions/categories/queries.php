<?php 

    class Insert {
            
        public static function Insert () {
            global $db; $info = Categories::Post();
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
            new IFExecuteQuerie($stmt->rowCount());
        }
    }


    class Update {

        public static function Update() {
            global $db;
            $info = Categories::Post();

            $stmt = $db->prepare("UPDATE categories SET titleCategory = ?, content = ?, IDwriter = ? WHERE IdCategory = " . GetRequests::GetValueGet('IdCategory'));
            $stmt->execute([
                $info['titleCategory'],
                $info['content'],
                $info['IdUser'],
            ]);

            new IFExecuteQuerie($stmt->rowCount());
        }
    }


    class IFExecuteQuerie {
        public function __construct($RowCount) {
            $tools = new GlobalFunctions();
            if ($RowCount > 0 ) {
                $tools->AlertMassage("operation accomplished successfully", 'success');;
                $tools->SitBackBtn();
            } else {
                $tools->AlertMassage("No Changed In Inforamtion", 'info');;
                $tools->SitBackBtn();
            }
        }
    }