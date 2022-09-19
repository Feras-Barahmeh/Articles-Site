<?php 
// Header Configration
    ob_start();
    session_start();
    $TITLE =  "Articles";
    include ("init.php");

// Fork Fucntion 

    function PrintDefoultTitle() {
        $titles = Queries::FromTable("titleArticle", "articles", "", "fetchAll", "additionDate", 'ASC', "LIMIT 7" );
        foreach($titles as $title) {
            ?>
                <li><span><?php echo $title['titleArticle'] ?></span><a href="readArticle.php?<?php echo str_replace(" ", "-", $title['titleArticle']) ?>">Read</a></li>
            <?php 
        }
    }

// Main Function 

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
                    </ul>

                    <ul class="title-article" id="contaniert-art-tit">
                        <?php PrintDefoultTitle(); ?>
                    </ul>

                </nav>
            </aside>
        <?php
    }

    function Showcomment () {
        ?>
            <div class="comments background">
                <h4>Comments</h4>
                <div class="comment">
                    <div class="info-writer">
                        <img src="../../commonBetweenBackFront/images/imagesProject/defaultImg.jpg" alt="">
                        <span class="name-user"><a href="">Feras</a></span>
                    </div>
                    <div class="containet-comment">
                        <div class="comment-p">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse qui neque totam.</div>
                        <div class="options">
                            <div class="reacts">
                                <div class="smile">
                                    <span class="react-btn like" id="like-btn" description="Like"><i class="fa fa-thumbs-up"></i></span>
                                    <span class="react-btn love" id="love-btn" description="Love"><i class="fa fa-heart"></i></span>
                                    <span class="react-btn disloke" id="dislike-btn" description="Dislike"><i class="fa fa-thumbs-down"></i></span>
                                </div>
                            </div>
                            <div class="date">22-5-2022</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    function ImgInfoArt($infoArticle) {
        ?>
            <div class="art-img">
                <?php ShowImage::SetImg("../../commonBetweenBackFront/uploaded/articles/", $infoArticle['imageName']); ?>
                <div class="info-art">
                    <h4><i class="fa-solid fa-sitemap"></i>Information Article</h4>
                    <span class="writer"><span class="title">Writer:</span><?php echo $infoArticle["userName"] ?></span>
                    <div class="feild"><span class="title">Article Feild:</span><?php echo $infoArticle["titleCategory"] ?></div>
                    <span class="date"><span class="title">Date:</span><?php echo $infoArticle["additionDate"] ?></span>
                    <div class="reacts-statistic">
                        <span class="loves" description="number loves"><i class="fa fa-heart"></i><span class="num"><?php echo $infoArticle["loves"] ?></span></span>
                        <span class="likes" description="number likes"><i class="fa fa-thumbs-up"></i><span class="num"><?php echo $infoArticle["likes"] ?></span></span>
                        <span class="deslikes" description="number deslike"><i class="fa fa-thumbs-down"></i><span class="num"><?php echo $infoArticle["dislikes"] ?></span></span>
                        <span class="saveds" description="number saved"><i class="fa fa-bookmark"></i><span class="num"><?php echo $infoArticle["saveds"] ?></span></span>
                    </div>
                </div>
            </div>
        <?php
    }

    function containtArticle($infoArticle) {
        $P = $infoArticle["content"];
        $lengthP = strlen($P);
        $quarter =  floor($lengthP * 50/100);
        $befReadMore = substr($P, 0, $quarter);
        $threeThrees = substr($P, $quarter, $lengthP);
        ?>
            <div class="contanier-p">
                <div class="befor-read-more">
                    <?php echo $befReadMore  ?>
                </div>
                <div class="read-more hidden" id="read-more-p">
                    <?php echo $threeThrees ?>
                </div>
                <span id="re-mo">Read More...</span>
            </div>
        <?php
    }

    function article() {
        $nameArticle = str_replace("-", " ",  array_key_first($_GET));
        $infoArticle = Queries::FromTable(
                        "articles.*, users.userName, categories.titleCategory", 
                        "articles, users, categories",
                        "WHERE articles.titleArticle = '{$nameArticle}' AND users.IdUser = articles.IdUser AND categories.IdCategory = articles.categoryID", 
                        "fetch");

        ?>
            <div class="background constanier-article" namearticle=<?php echo array_key_first($_GET) ?>>
                <h4 class="background title"><?php echo $nameArticle ?></h4>
                <div class="background continet-art">

                    <!-- End Image And Information Article -->
                        <?php ImgInfoArt($infoArticle) ?>
                    <!-- Start Image And Information Article -->

                    <div class="art-box">
                        <!-- Start Containt Article -->
                            <?php containtArticle($infoArticle) ?>
                        <!-- End Containt Article -->

                        <div class="options">
                            <div class="add-comm hidden" id="comm-box">
                                <textarea name="" placeholder="Add comment" id="" ></textarea>
                                <span class="share-btn" description="Add"><i class="fa-sharp fa-solid fa-share"></i><span class="hint">Share</span></span>
                            </div>

                            <div class="reacts">
                                <!-- Start Smiles -->
                                <div class="smile">
                                    <span 
                                        class="react-btn like" 
                                        id="likeart" 
                                        description="like">
                                        <i class="fa fa-thumbs-up"></i>
                                    </span>
                                    <span 
                                        class="react-btn love" 
                                        id="loveart" 
                                        description="love">
                                        <i class="fa fa-heart"></i>
                                    </span>
                                    <span 
                                        class="react-btn disloke" 
                                        id="dislikeart" 
                                        description="dislike">
                                        <i class="fa fa-thumbs-down"></i>
                                    </span>
                                    <span
                                        class="react-btn save-art"
                                        id="saveart"
                                        description="save">
                                        <i class="fa fa-bookmark"></i>
                                    </span>
                                </div>
                                <!-- End Smiles -->

                                <div class="add-comm-btn" id="share-comm"><i class="fa-solid fa-comment"></i><span class="comm">Comment</span></div>
                            </div>
                        </div>
                        <i class="fa fa-arrow-up scroll-to-top" id="up-btn" ></i>

                        <!-- Start Show Commint -->
                            <?php Showcomment() ?>
                        <!-- End Show Commint -->
                    </div>
                </div>
            </div>
        <?php
    }

// Controller Section
        StructAside();
        article(); 

// Footer Configration
    ?> <script src="layout/js/article.js"></script> <script src="layout/js/readArticle.js"></script> <?php
    include ($tpl . "footer.php");
    ob_end_flush();