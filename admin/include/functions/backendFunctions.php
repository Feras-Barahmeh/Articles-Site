<?php 


    class Printer {
        public static function PrintWriters() {
            $data = Queries::FromTable('IdUser, userName', 'users', "WHERE permission > 0");

            foreach($data as $info) {
            ?>
                <option value="<?php echo $info['IdUser'] ?>"><?php echo $info['userName'] ?></option>
            <?php 
            }
        }

        
        public static function PrintCatName() {
            $nameCats = Queries::FromTable("titleCategory", 'categories');
            foreach ($nameCats as $nameCat) {
            ?>
                <li class="showCat for-search"><a href="filterByCat.php?CatName=<?php  echo str_replace(" ", '-', $nameCat['titleCategory']) ?>" class="search-li"><?php  echo $nameCat['titleCategory'] ?></a>  </li> 
            <?php }
        }

    }





