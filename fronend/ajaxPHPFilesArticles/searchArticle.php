<?php 
    include "../config.php";
    include "../../commonBetweenBackFront/php/functions.php";
    
    $titels = Queries::FromTable(
                                    "titleArticle",
                                    "articles",
                                    "WHERE  titleArticle LIKE '" . $_POST['indicator'] . "%'  
                                    OR
                                    articles.IdUser LIKE (SELECT users.IdUser FROM users WHERE users.userName LIKE '" . $_POST['indicator'] . "')");
    // print_r($articles);
    foreach ($titels as $titel) {  ?>
        <li><span><?php echo $titel['titleArticle'] ?></span><a href="#">Read</a></li>
    <?php }