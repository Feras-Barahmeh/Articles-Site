<?php
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = 'users';
    include ('init.php');
    SetNav();

// Start  Fork Functions

    function PrintArticles($nameCat) {
        global $commfilesuploaded; 
        $catid = Queries::FromTable("IdCategory", 'categories', "WHERE titleCategory = '$nameCat'", 'fetch')['IdCategory'];

        $articles = Queries::FromTable("*", 'articles', "WHERE categoryID = '$catid'");

        foreach ($articles  as $article) {
            ?>
                <div class="article">
                    <?php ShowImage::SetImg($commfilesuploaded . "articles/", $article['imageName']) ?>
                    <div class="info-article">
                        <a href="showarticle.php?<?php echo str_replace(" ", '-', $article['titleArticle']) ?>" class="title"><?php echo $article['titleArticle'] ?></a>
                        <div class="info-art">
                            <span class="date"><?php echo $article['additionDate'] ?> </span>
                            <a href="articles.php?articleAction=edit&IdArticle=<?php echo $article['IdArticle'] ?>">Edit</a>
                        </div>
                    </div>

                </div>

            <?php
        }

    }


    function SidBarStructer() {
        global $commfilesImags, $commfilesuploaded;
        $nameUser =  Queries::FromTable('userName', 'users', "WHERE IdUser = " . Sessions::GetValueSessionDepKey('IdUser'), 'fetch')['userName']
        ?>
            
                <aside class="contant-sidbar">

                    <h4 class="name"> <?php ShowImage::SetImg($commfilesuploaded . 'users/', NameImag::GetNameImgFromDB('imageName', 'users', "Where IdUser = " .  Sessions::GetValueSessionDepKey('IdUser')), 'small-img'); echo $nameUser; ?>  </h4>
                    
                    <?php GlobalFunctions::Search()?>
                    
                    <ul id="showCat search-ul">
                        <?php Printer::PrintCatName() ?>
                    </ul>
                    
                </aside>
        <?php
    }

    function ControlePanel() {
        $namecat = str_replace("-", " ", GetRequests::GetValueGet('CatName'));
        ?>
                <h2 class="showcat">Articles <?php echo $namecat ?></h2>
                <div class="show-article-cat">
                    <?php PrintArticles($namecat) ?>
                </div>
            </div>
        <?php
    }



// Start Main Function

    function ControllerLayout() { 
        ?>
        <div class="dashbord">
            <?php 
                SidBarStructer();
            ?>
            <section class="containt-section">
                <?php 
                    ControlePanel(); 
                ?>
            </section>
        </div>
        <?php
    }

    function Controller() {
        if (GetRequests::IfSetValue('CatName')) {
            ControllerLayout();
        }
    }

// Controller Part 
    Controller();
    include ($tpl . 'footer.php');
    ob_end_flush();