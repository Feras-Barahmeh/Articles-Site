<?php
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = str_replace("-", " ", array_key_first($_GET));
    include ('init.php');

// Start  Fork Functions

    function PrintNameArticlesAtSameCat($InfoArticle) {
        $ArticlesAtSameCats = Queries::FromTable('titleArticle', 'articles', "Where categoryID = '" . $InfoArticle . "'");
        foreach($ArticlesAtSameCats as $ArticleAtSameCats) {
        ?>
            <li class="list-search"><a href="showarticle.php?<?php echo str_replace(" ", '-', $ArticleAtSameCats['titleArticle']) ?>"><?php echo $ArticleAtSameCats['titleArticle'] ?> </a></li>
        <?php }
    }

// Start Main Function

    function MainStructer() {
        $InfoArticle = Queries::FromTable('*', 'articles', "Where titleArticle = '" . str_replace("-", " ", array_key_first($_GET)) . "'", 'fetch');
        ?>
            <div class="dashbord flex">
                <?php AsideHeaderStructer() ?>
                <h4 class="p-20"><?php echo stripslashes($InfoArticle['titleArticle']) ?></h4>
                <div class="content-page-read-article flex p-10">
                    <aside class="relative flex sort-col">
                        <div class="contaner-search-input relative">
                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            <input type="search" class="search-input" placeholder="Article at same feild">
                        </div>
                        <ul>
                                <?php  PrintNameArticlesAtSameCat($InfoArticle['categoryID']) ?>
                        </ul>
                    </aside>
                    <section class="contanier-show-article flex-1">
                                <div class="option-article flex f-sp-between  w-fu mb-5">
                                        <div class="">
                                            <a href="articles.php?articleAction=edit&IdArticle=<?php echo $InfoArticle ['IdArticle']?>" class="process-btn description mr-10" description="Edit"><i class="fa-solid fa-edit"></i></a>
                                            <span class="process-btn description" description="Delete" onclick="return confirem('Delete Article', 'Are you sure deleted', `?delete&IdArticle=<?php echo $InfoArticle['IdArticle'] ?>`, true)"  ><i class="fa-solid fa-trash-can"></i></span>
                                        </div>
                                        <span class="date"><?php echo $InfoArticle['additionDate'] ?></span>
                                </div>
                                <div class="info-article">
                                    <?php ShowImage::SetImg('../commonBetweenBackFront/uploaded/articles/', $InfoArticle['imageName']) ?>
                                </div>
                                <div class="article-content">
                                    <h3><?php echo $InfoArticle['titleArticle'] ?></h3>
                                    <p><?php echo $InfoArticle['content'] ?></p>
                                </div>
                    </section>
                </div>
            </div>
        <?php
    }


// Controller Part 
    MainStructer();
    include ($tpl . 'footer.php');
    ob_end_flush();