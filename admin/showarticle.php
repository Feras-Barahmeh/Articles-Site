<?php
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = str_replace("-", " ", array_key_first($_GET));
    include ('init.php');
    SetNav();

// Start  Fork Functions

    function PrintArticles() {
        global $commfilesuploaded; 
        $NameArticle = filter_var(str_replace("-", " ", array_key_first($_GET)), FILTER_UNSAFE_RAW);


        $articles = Queries::FromTable("*", 'articles', "WHERE titleArticle = '" . $NameArticle . "'");
        // echo "<pre>";
        // print_r($articles);
        // echo "</pre>";
        if (! empty ($articles)) {
            foreach ($articles  as $article) {
                ?>
                    <div class="article">
                        <?php ShowImage::SetImg($commfilesuploaded . "articles/", $article['imageName']) ?>
                        <div class="info-article">
                            <a href="showarticle.php?<?php echo str_replace(" ", '-',  $NameArticle) ?>" class="title"><?php echo  $NameArticle ?></a>
                            <div class="info-art">
                                <span class="date"><?php echo $article['additionDate'] ?> </span>
                                <a href="articles.php?articleAction=edit&IdArticle=<?php echo $article['IdArticle'] ?>">Edit</a>
                            </div>
                        </div>
                    </div>

                <?php
            }
        } else {
            GlobalFunctions::AlertMassage("This Category Not included any article yet", 'info');
        }


    }


    function SidBarStructer() {
        global $commfilesImags, $commfilesuploaded;
        $nameUser =  Queries::FromTable('userName', 'users', "WHERE IdUser = " . Sessions::GetValueSessionDepKey('IdUser'), 'fetch')['userName']
        ?>
            
                <aside class="contant-sidbar">

                    <h4 class="name"> <?php ShowImage::SetImg($commfilesuploaded . 'users/', NameImag::GetNameImgFromDB('imageName', 'users', "Where IdUser = " .  Sessions::GetValueSessionDepKey('IdUser')), 'small-img'); echo $nameUser; ?>  </h4>
                    <?php GlobalFunctions::Search()?>

                    <ul id="showCat">
                        <?php Printer::PrintCatName() ?>
                    </ul>
                    
                </aside>
        <?php
    }

    function ControlePanel() {

        ?>
                <h2 class="showcat"><?php echo str_replace("-", " ", array_key_first($_GET)) ?></h2>
                <div class="show-article-cat">
                    <?php PrintArticles() ?>
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