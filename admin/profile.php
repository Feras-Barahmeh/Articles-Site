<?php
// Start Global Divination
    ob_start();
    session_start();
    $TITLE = 'Profile';
    include ('init.php');
    navPage();

// Fork Function

    function PrintArticlesName() {
        $idUser = Sessions::GetValueSessionDepKey('IdUser');
        $articles = Queries::FromTable("titleArticle, categoryID" , 'articles', "WHERE IdUser = " . $idUser);
        foreach ($articles as $article) {
            ?>
                <li class="name-articel" idcat="<?php echo $article['categoryID'] ?>"><a href="showarticle.php?<?php echo $article['titleArticle'] ?>"><?php echo $article['titleArticle'] ?></a> <a href="showarticle.php?<?php echo str_replace(" ", "-", $article['titleArticle']) ?>" class="btn-read">Read</a></li>
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

    function GetCats() {
        $Cats = Queries::FromTable('titleCategory, IdCategory', 'categories');
        foreach ($Cats as $Cat) {
            ?>
                <li id="cat-name" class="test" onclick="whenClickCategpry()" idcat="<?php echo $Cat['IdCategory']  ?>"><?php echo $Cat['titleCategory'] ?></li>
            <?php
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
                
                <aside class="aside-profile"  id="profile-user">
                    <div class="X-info hidden" id="X-info">X</div>
                    <div class="header">
                        <div class="name-user">
                            <div class="img"><?php ShowImage::SetImg($commfilesuploaded . "users/", $imgname) ?></div>
                            <div class="name">
                                <h3><?php echo $info['fullName'] ?></h3>
                                <h5 class="username"><?php echo $info['userName'] ?></h5>
                            </div>
                        </div>

                        <div class="location link"><span><i class="fa-solid fa-location-pin"></i></span> Jordan</div>
                        <a href="#" class="githup link"><span><i class="fa-brands fa-github"></i></span> FerasBarahmeh</a>
                        <a href="#" class="facebook link" ><span><i class="fa-brands fa-linkedin"></i></span> FerasBarahmeh</a>
                        <a href="#" class="twetter link"><span><i class="fa-brands fa-twitter"></i></span> FerasBarahmeh</a>
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
                    <div class="header-contaner">
                        <div class="categoreis-dropdown" >
                            Categories
                            <span><i class="fa-solid fa-caret-down" aria-hidden="true"></i><i class="fa-solid fa-caret-up"></i></span>
                            <!-- Search Feild -->
                            <span class="hidden err-mass">Not Avalibel Now <span class="X" id="X-info">X</span> </span>
                        </div>

                        <div class="showStatistics" id="showInfo">
                            <span>Information <i class="fa-solid fa-caret-down ml-5" aria-hidden="true"></i></span>
                        </div>

                        <ul id="padding-dropdown">
                                <li for="search-cats" ><input onkeyup="fetchLettersWhenSearch()" type="text" id="search-cats" placeholder="Search Category"><i class="fa-solid fa-magnifying-glass"></i></li>
                                <?php GetCats() ?>
                            </ul>
                    </div>

                    <div class="articles">
                        <div class="cats">
                            <ul id="if-no-val">
                                <?php PrintArticlesName() ?>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        <?php
    }


// Last Page
    
    StructerProfiel();

include ($tpl . 'footer.php');
    ob_end_flush();