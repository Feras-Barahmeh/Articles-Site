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
                    <a href="profile.php"><span><?php echo $_SESSION['user'][0] ?></span><span><?php echo substr($_SESSION['user'], 1) ?></span></a>
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
                        <!-- <button id="search-btn">Search</button> -->
                    </ul>

                    <ul class="title-article" id="contaniert-art-tit">
                        <?php PrintDefoultTitle(); ?>
                    </ul>

                </nav>
            </aside>
        <?php
    }

    function SectionRegritions () {
        ?>
            <div class="main-part top-viewed">
                <h4 class="title"><i class="fa-regular fa-star"></i>Top Viewed</h4>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit</li>
                </ul>
            </div>

            <!-- Start Statistics -->
            <div class="main-part statistics">
                <h4 class="title"><i class="fa-regular fa-chart-bar"></i>Statistics</h4>
                <ul>
                    <li><span class="to"><i class="fa-regular fa-newspaper"></i>Articels</span><span class="val">11</span></li>
                    <li><span class="to"><i class="fa fa-quote-right"></i>Quotes</span><span class="val">11</span></li>
                    <li><span class="to"><i class="fa-solid fa-bug"></i>Solved Bugs</span><span class="val">11</span></li>
                    <li><span class="to"><i class="fa-solid fa-house-laptop"></i>Fields</span><span class="val">11</span></li>
                </ul>
            </div>
            <!-- End Statistics -->

            <!-- Start last published article -->
            <div class="main-part lpa">
                <h4 class="title"><i class="fa-regular fa-chart-bar"></i>Last Published Article</h4>
                <a href="#" target="_blank">Lorem ipsum dolor, sit amet consectetur</a>
                <img src="../../commonBetweenBackFront/images/imagesProject/null_light.png" alt="">
            </div>
            <!-- End last published article -->
        <?php
    }

    function ArticlesStructer() {
        ?>
            <div class="article">
                <img src="../../commonBetweenBackFront/uploaded/articles/php-logo.svg.png20_php-logo.svg.png" alt="">
                <div class="box">
                    <a href="#">Title</a>
                    <div class="excerpt">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="info-article">
                        <span class="date"><i class="fa-regular fa-calendar"></i>22-5-2002</span>
                        <span class="viwed"><i class="fa-regular fa-eye"></i>2342</span>
                    </div>
                </div>
            </div>
            <div class="article">
                <img src="../../commonBetweenBackFront/uploaded/articles/php-logo.svg.png20_php-logo.svg.png" alt="">
                <div class="box">
                    <a href="#">Title</a>
                    <div class="excerpt">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="info-article">
                        <span class="date"><i class="fa-regular fa-calendar"></i>22-5-2002</span>
                        <span class="viwed"><i class="fa-regular fa-eye"></i>2342</span>
                    </div>
                </div>
            </div>
        <?php
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
                <div class="scroll-to-top" id="up-btn" ><span></span></div>
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