<?php
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = str_replace("-", " ", array_key_first($_GET));
    include ('init.php');
    SetNav();

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
            <h3 class="h-title"><?php echo $InfoArticle['titleArticle'] ?></h3>
            <div class="contanier-show-article">
                <aside>
                        <?php GlobalFunctions::Search('FilterArticlesInThisCat()') ?> 
                    <ul> 
                            <?php  PrintNameArticlesAtSameCat($InfoArticle['categoryID']) ?>
                    </ul>
                </aside>

                <section>
                        <div class="info-article">
                            <?php ShowImage::SetImg('../commonBetweenBackFront/uploaded/articles/', $InfoArticle['imageName']) ?>
                            <div class="opt-article">
                                    <a href="articles.php?articleAction=edit&IdArticle=<?php echo $InfoArticle ['IdArticle']?>" class="process-btn" data-hover="Edit""><i class="fa-solid fa-edit"></i></a>
                                    <a href="articles.php?articleAction=delete&IdArticle=<?php echo $InfoArticle ['IdArticle']?>"  onclick="return Confirm()" class="process-btn" data-hover="Delete"><i class="fa-solid fa-trash-can"></i></a>
                                    <span class="date"><?php echo $InfoArticle['additionDate'] ?></span>
                            </div>
                        </div>
                        <div class="content">
                            <h3><?php echo $InfoArticle['titleArticle'] ?></h3>
                            <p><?php echo $InfoArticle['content'] ?></p>

                        </div>
                </section>
            </div>
        <?php
    }


// Controller Part 
    MainStructer();
    include ($tpl . 'footer.php');
    ob_end_flush();