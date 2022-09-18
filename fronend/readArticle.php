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
                                    <span class="react like" id="like-btn"><i class="fa fa-thumbs-up"></i></span>
                                    <span class="react love" id="love-btn"><i class="fa fa-heart"></i></span>
                                    <span class="react disloke" id="dislike-btn"><i class="fa fa-thumbs-down"></i></span>
                                </div>
                            </div>
                            <div class="date">22-5-2022</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    function article() {
        ?>
            <div class="background constanier-article">
                <h4 class="background title"><?php echo str_replace("-", " ",  array_key_first($_GET)) ?></h4>
                <div class="background continet-art">
                    <div class="art-img"><img src="../../commonBetweenBackFront/images/imagesProject/defaultImg.jpg" alt=""></div>
                    <div class="art-box">
                        <div class="contanier-p">
                            <div class="befor-read-more">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae quos animi obcaecati?
                            </div>
                            <div class="read-more hidden" id="read-more-p">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni cumque, veniam ad blanditiis exercitationem harum impedit adipisci quam autem. Impedit provident vel ipsum id, ad tempora est itaque pariatur excepturi?
                            </div>
                            <span id="re-mo">Read More...</span>
                        </div>
                        
                        <div class="options">
                            <div class="add-comm hidden" id="comm-box">
                                <textarea name="" placeholder="Add comment" id="" ></textarea>
                                <span class="share-btn"><i class="fa-sharp fa-solid fa-share"></i><span class="hint">Share</span></span>
                            </div>

                            <div class="reacts">
                                <div class="smile">
                                    <span class="react like" id="like-btn"><i class="fa fa-thumbs-up"></i></span>
                                    <span class="react love" id="love-btn"><i class="fa fa-heart"></i></span>
                                    <span class="react disloke" id="dislike-btn"><i class="fa fa-thumbs-down"></i></span>
                                </div>
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