<?php
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = 'Profile';
    include ('init.php');
    SetNav();

// Fork Function

    function PrintArticlesName() {
        $idUser = Sessions::GetValueSessionDepKey('IdUser');
        $articles = Queries::FromTable("titleArticle" , 'articles', "WHERE IdUser = " . $idUser);
        foreach ($articles as $article) {
            ?>
                <li><a href="showarticle.php?<?php echo $article['titleArticle'] ?>"><?php echo $article['titleArticle'] ?></a> <a href="showarticle.php?<?php echo $article['titleArticle'] ?>" class="btn-read">Read</a></li>
            <?php
        }
    }

    function PrintLanguages() {
        $idUser = Sessions::GetValueSessionDepKey('IdUser');
        $langs = Queries::FromTable("langs" , 'users', "WHERE IdUser = " . $idUser, 'fetch')['langs'];
        $SplitedLangs = explode(',', $langs);

        foreach ($SplitedLangs as $lang) {
        ?>
            <div class="lang">
                <label class="name-lang"><?php echo $lang ?></label>
                <div class="under"></div>
            </div>
        <?php }
    }

    function PrintSkilles () {
        $idUser = Sessions::GetValueSessionDepKey('IdUser');
        $skilles = Queries::FromTable("tools" , 'users', "WHERE IdUser = " . $idUser, 'fetch')['tools'];
        $SplitedSkilles = explode(',', $skilles);
        if (!empty($skilles)) {
            foreach ($SplitedSkilles as $skill) {
                ?>
                    <div class="skill">
                        <label class="name-skill"><?php echo $skill ?></label>
                        <div class="under"></div>
                    </div>
                <?php }
        } else {
            ?> <img src="../commonBetweenBackFront/images/imagesProject/null_light.png" alt="" class="null-img"> <?php
        }
    } 


// Main Functions
    function StructerProfiel () {
        global $commfilesuploaded;
        $queries = new Queries;
        $idUser = Sessions::GetValueSessionDepKey('IdUser');
        $imgname = $queries->FromTable("imageName", 'users', "WHERE IdUser = $idUser", 'fetch')['imageName'];

        // Queries fetch Info
            $info = $queries->FromTable("*" , 'users', "WHERE users.IdUser = $idUser", 'fetch');
            $numberArticles =  $queries->Counter("IdArticle", 'articles', "WHERE IdUser = $idUser");
            $numberCat =  $queries->Counter("IdCategory", 'categories', "WHERE IDwriter = $idUser");

        ?>
            <div class="content-profile">
                <aside class="aside-profile">
                    <div class="header">
                        <div class="name-user">
                            <div class="img"><?php ShowImage::SetImg($commfilesuploaded . "users/", $imgname) ?></div>
                            <div class="name">
                                <h3><?php echo $info['fullName'] ?></h3>
                                <h5 class="username"><?php echo $info['userName'] ?></h5>
                            </div>
                        </div>

                        <div class="location link"><span><i class="fa-solid fa-location-pin"></i></span> Jordan</div>
                        <a href="" class="githup link"><span><i class="fa-brands fa-github"></i></span> FerasBarahmeh</a>
                        <a href="" class="facebook link" ><span><i class="fa-brands fa-linkedin"></i></span> FerasBarahmeh</a>
                        <a href="" class="twetter link"><span><i class="fa-brands fa-twitter"></i></span> FerasBarahmeh</a>
                        <div class="separator"></div>
                    </div>

                    <div class="bio">
                        <h5>About you</h5>
                        <p><?php echo $info['aboutYou'] ?> </p>
                        <div class="separator"></div>
                    </div>

                    <div class="date-reg">
                        <h5>Register Date</h5>
                        <p><?php echo $info['dataRegister'] ?> </p>
                        <div class="separator"></div>
                    </div>

                    <div class="langs">
                        <h5>Languages</h5>
                        <?php PrintLanguages() ?>
                        <div class="separator"></div>
                    </div>

                    <div class="skills">
                            <h4>Skills</h4>
                            <?php PrintSkilles() ?>
                            <div class="separator"></div>
                    </div>
                </aside>

                <section class="contant-section">
                    <div class="cats">
                        <span><a href="#">Db</a></span>
                        <span><a href="#">Python</a></span>
                        <span><a href="#">Cpp</a></span>
                    </div>

                    <div class="articles">
                        <ul>
                            <?php PrintArticlesName() ?>
                        </ul>
                    </div>
                </section>
            </div>
        <?php
    }


// Last Page
    StructerProfiel();
    include ($tpl . 'footer.php');
    ob_end_flush();