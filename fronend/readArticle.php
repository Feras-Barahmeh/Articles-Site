<?php 
// Header Configration
    ob_start();
    session_start();
    $TITLE =  str_replace("-", " ", array_key_first($_GET));
    include ("init.php");

// Fork Fucntion 

    function PrintDefoultTitle() {
        $titles = Queries::FromTable("titleArticle", "articles", "", "fetchAll", "additionDate", 'ASC', "LIMIT 7" );
        foreach($titles as $title) {
            ?>
                <li>
                    <span><?php echo $title['titleArticle'] ?></span>
                    <a href="readArticle.php?<?php echo str_replace(" ", "-", $title['titleArticle']) ?>">Read</a>
                </li>
            <?php 
        }
    }

    function setReactBtn($btnName, $searchTo, $table, $nameContanitCol, $idContanit, $nameUserCol) {
        if (Queries::Counter($searchTo, $table, "WHERE $nameContanitCol = $idContanit AND $nameUserCol = {$_COOKIE['IdUser']}") === 0) {
            ?> <i class="fa-regular <?php echo $btnName ?>"></i> <?php
        } else {
            ?> <i class="fa <?php echo $btnName ?>"></i> <?php 
        }
    }

// Main Function 

    function StructAside() {
        ?>
            <aside id="" class="aside-articles">
                <div class="logo">
                    <a href="profile.php">
                        <span class="part-one"><?php echo $_COOKIE['userName'][0] ?></span>
                        <span class="part-two"><?php echo substr($_COOKIE['userName'], 1) ?></span>
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
                                    <!-- Like -->
                                    <span class="react-btn description" description="like">
                                        <i class="fa-regular fa-thumbs-up"></i>
                                    </span>

                                    <!-- Dislike -->
                                    <span class="react-btn description" description="dislike">
                                        <i class="fa-regular fa-thumbs-down"></i>
                                    </span>
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
                        <!-- like -->
                        <span 
                            class="num-reaction likes description" 
                            typeReact="like" 
                            description="likes">

                            <i class="fa-regular fa-thumbs-up"></i>
                            <span class="num like"><?php echo $infoArticle["likes"] ?></span>
                        </span>
                        <!-- dislike -->
                        <span 
                            class="num-reaction deslike description"
                            typeReact="dislike" 
                            description="deslike">
                            <i class="fa-regular fa-thumbs-down"></i>
                            <span class="num dislike"><?php echo $infoArticle["dislikes"] ?></span>
                        </span>
                        <!-- Saved -->
                        <span 
                            class="num-reaction saveds description" 
                            typeReact="saved" 
                            description="saveds">
                            <i class="fa-regular fa-bookmark"></i>
                            <span class="num"><?php echo $infoArticle["saveds"] ?></span>
                        </span>
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
            <article class="contanier-p">
                <div class="befor-read-more">
                    <?php echo $befReadMore  ?>
                </div>
                <div class="read-more hidden" id="read-more-p">
                    <?php echo $threeThrees ?>
                </div>
                <span id="re-mo">Read More...</span>
            </article>
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
                                <span class="share-btn description" description="Share">
                                    <i class="fa-sharp fa-solid fa-share"></i>
                                    <span class="hint" id="share-comment">Share</span>
                                </span>
                            </div>

                            <div class="reacts">
                                <!-- Start Smiles -->
                                <div class="smile">
                                    <!-- like -->
                                    <span 
                                        class="react-btn description"
                                        id-article="<?php echo  $infoArticle['IdArticle'] ?>"
                                        type-react="<?php echo 'like' ?>"
                                        id_user="<?php echo $_COOKIE["IdUser"] ?>"
                                        description="like">
                                        <?php setReactBtn("fa-thumbs-up", "likeID", "likes", "IdContent", $infoArticle["IdArticle"], "IdUser") ?>
                                        <!-- <i class="fa-regular fa-thumbs-up"></i> -->
                                    </span>

                                    <!-- dislike -->
                                    <span 
                                        class="react-btn description" 
                                        id-article="<?php echo  $infoArticle['IdArticle'] ?>"
                                        type-react="<?php echo 'dislike' ?>"
                                        id_user="<?php echo $_COOKIE["IdUser"] ?>"
                                        description="dislike">
                                        <?php setReactBtn("fa-thumbs-down", "dislikeID", "dislikes", "IdContent", $infoArticle["IdArticle"], "IdUser") ?>
                                        <!-- <i class="fa-regular fa-thumbs-down"></i> -->
                                    </span>

                                    <!-- save -->
                                    <span
                                        class="react-btn description"
                                        description="save">
                                        <i class="fa-regular fa-bookmark"></i>
                                    </span>
                                </div>
                                <!-- End Smiles -->

                                <div class="add-comm-btn " 
                                    id="add-comm-btn"
                                    description="add comment">
                                    <i class="fa-solid fa-comment"></i>
                                    <span class="comm">Comment</span>
                                </div>
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