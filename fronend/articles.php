<?php 
// Header Configration
    ob_start();
    session_start();
    $TITLE =  "Articles";
    include ("init.php");

    function PrintDefoultTitle() {
        $titles = Queries::FromTable("titleArticle", "articles", "", "fetchAll", "additionDate", 'ASC', "LIMIT 7" );
        foreach($titles as $title) {
            ?>
                <li><span><?php echo $title['titleArticle'] ?></span><a href="#">Read</a></li>
            <?php 
        }
    }

    function StructAside() {
        ?>
            <aside id="" class="aside-articles">
                <div class="logo">
                    <a href="profile.php">
                        <span class="part-one"><?php echo $_COOKIE['userName'][0] ?></span>
                        <span class="part-tow"><?php echo substr($_COOKIE['userName'], 1) ?></span>
                    </a>
                </div>

                <!-- Toggel Start -->
                <div class="nav-toggeler">
                    <span></span>
                </div>

                <nav class="contanier-articles">
                    <!-- Links Media -->
                    <ul id="links-media" class="search-feild">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input 
                            type="search"
                            name="selectarticle"
                            id="search-art"
                            description="serach name article name feild"
                            placeholder="Search Articel">
                    </ul>

                    <ul class="title-article" id="contaniert-art-tit">
                        <?php PrintDefoultTitle(); ?>
                    </ul>

                </nav>
            </aside>
        <?php
    }

    function MostPopularArticels() {
        $mostArtsPub = Queries::FromTable("titleArticle", "articles", NULL, "fetchAll", "likes", "DESC", "LIMIT 5");
        foreach ($mostArtsPub as $mostArtPub) {
            ?>
                <li><a href="readArticle.php"><?php echo $mostArtPub['titleArticle'] ?></a></li>
            <?php
        }
    }

    function LastArticle() {
        $lastArt = Queries::FromTable("titleArticle, imageName", "articles", NULL, "fetch", "IdArticle", "DESC", "LIMIT 1");
        ?>
            <div class="main-part lpa">
                <h4 class="title"><i class="fa-regular fa-clipboard"></i>Last Published Article</h4>
                <a href="readArticle.php" target="_blank"><?php echo $lastArt['titleArticle'] ?></a>
                <?php ShowImage::SetImg("../../commonBetweenBackFront/uploaded/articles/", $lastArt['imageName']) ?>
            </div>
        <?php
    }

    function Feilds() {
        $categories = Queries::FromTable("titleCategory", "categories", NULL, "fetchAll");
        foreach ($categories as $catregory) {
            ?>
                <li><span class="to"><i class="fa-solid fa-tag"></i><a href="#" class="cats" name-cat="<?php echo $catregory["titleCategory"] ?>"><?php echo $catregory["titleCategory"] ?></a></span></li>
            <?php
        }
    }

    function GetAdmins() {
        $admins = Queries::FromTable("userName, permission", "users", "WHERE permission > 0", "fetchAll", "permission", "ASC"); 

        foreach($admins as $admin) {
            $rank = $admin["permission"] === 1 ? '<i class="fa-solid fa-crown"></i>' :  '<i class="fa-solid fa-chess-queen"></i>';
            ?>
                <li><span class="to"><?php echo $rank; echo $admin["userName"];  ?> </li> 
            <?php
        }

    }

    function SectionRegritions () {
        ?>
            <div class="main-part top-viewed">
                <h4 class="title"><i class="fa-regular fa-star"></i>Most Popular</h4>
                <ul>
                    <?php MostPopularArticels() ?>
                </ul>
            </div>

            <!-- Start Statistics -->
            <div class="main-part statistics">
                <h4 class="title"><i class="fa-regular fa-chart-bar"></i>Statistics</h4>
                <ul>
                    <li><span class="to"><i class="fa-regular fa-newspaper"></i>Articels</span><span class="val"><?php echo Queries::Counter("IdArticle", "articles") ?></span></li>
                    <li><span class="to"><i class="fa fa-quote-right"></i>Quotes</span><span class="val">11</span></li>
                    <li><span class="to"><i class="fa-solid fa-bug"></i>Solved Bugs</span><span class="val">11</span></li>
                    <li><span class="to"><i class="fa-solid fa-house-laptop"></i>Fields</span><span class="val"><?php echo Queries::Counter("IdCategory", "categories") ?></span></li>
                </ul>
            </div>
            <!-- End Statistics -->

            <!-- Start last published article -->
                <?php LastArticle() ?>
            <!-- End last published article -->

            <!-- Admins Name Start -->
            <div class="main-part statistics">
                <h4 class="title"><i class="fa-solid fa-signature"></i>Name Admins</h4>
                <ul>
                    <?php GetAdmins() ?>
                </ul>
            </div>
            <!-- Admins Name End -->

            <!-- Start Statistics -->
            <div class="main-part cats-contaniere">
                <h4 class="title"><i class="fa fa-lines-leaning"></i>Fieldes</h4>
                <ul class="">
                    <ul id="sea-cat" class="contanier-search-cat">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="search" id="search-cat"  placeholder="Search Fielde">
                    </ul>
                    <?php Feilds() ?>
                </ul>
            </div>
            <!-- End Statistics -->
        <?php
    }

    function ArticlesStructer() {
        $infoArticels = Queries::FromTable("*", "articles");
        foreach($infoArticels as $infoArticel ) {
            ?>
                <div class="article">
                    <?php ShowImage::SetImg("../../commonBetweenBackFront/uploaded/articles/", $infoArticel['imageName']) ?>
                    <div class="box">
                        <a href="readArticle.php?<?php echo str_replace(" ", "-", $infoArticel['titleArticle']) ?>" class="art-a" id=""><?php echo $infoArticel['titleArticle'] ;?></a>
                        <div class="excerpt">
                            <?php echo $infoArticel['excerpt'] ; ?>
                        </div>
                        <div class="info-article">
                            <span class="date"><i class="fa-regular fa-calendar"></i><?php echo $infoArticel['additionDate'] ?></span>
                            <span class="viwed"><i class="fa-solid fa-heart"></i><?php echo $infoArticel['likes'] ?></span>
                        </div>
                    </div>
                </div>
            <?php
        }
    }

    function padding() {
        ?>
            <div class="contanier-padding">
                <section class="section-regritions">
                    <?php SectionRegritions(); ?>
                </section>
                <section class="section-articles">
                    <?php ArticlesStructer() ?>
                </section>
                <i class="fa fa-arrow-up scroll-to-top" id="up-btn" ></i>
            </div>
        <?php
    }

    StructAside();
    padding();

// Footer Configration
    include ($tpl . "footer.php");
    ?>
        <script src="layout/js/article.js"></script>
    <?php
    ob_end_flush();