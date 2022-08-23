<?php
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = 'Profile';
    include ('init.php');
    SetNav();

// Main Functions

    function PrintArticles() {
        $idUser = Sessions::GetValueSessionDepKey('IdUser');
        $articles = Queries::FromTable("*" , 'articles', "WHERE IdUser = " . $idUser);
        
        global $commfilesuploaded;
        foreach ($articles as $article) {
            $fromcat = Queries::FromTable("titleCategory" , 'categories', "WHERE categories.IdCategory = " . $article['categoryID'] , 'fetch')['titleCategory'];
            ?>
                <div class="article">
                    <?php Images::SetImg($commfilesuploaded . "articles/", $article['imageName']) ?>
                    <div class="info-article">
                        <a href="#"><?php echo $article['titleArticle'] ?></a>
                    </div>

                    <div class="info-art">
                        <span><a href="filterByCat.php?CatName=<?php echo str_replace(" ", "-", $fromcat) ?>"><?php echo $fromcat ?></a></span></span>
                        <span class="date"><?php echo $article['additionDate'] ?> </span>
                        <a href="articles.php?articleAction=edit&IdArticle=<?php echo $article['IdArticle'] ?>">Edit</a>
                    </div>
                </div>
            <?php
        }
    }

    function StructerProfiel() {
        global $commfilesuploaded;
        $queries = new Queries;
        $idUser = Sessions::GetValueSessionDepKey('IdUser');
        $imgname = $queries->FromTable("imageName", 'users', "WHERE IdUser = $idUser", 'fetch')['imageName'];

        // Queries fetch Info
            $info = $queries->FromTable("*" , 'users', "WHERE users.IdUser = $idUser", 'fetch');
            $numberArticles =  $queries->Counter("IdArticle", 'articles', "WHERE IdUser = $idUser");
            $numberCat =  $queries->Counter("IdCategory", 'categories', "WHERE IDwriter = $idUser");

        ?>
            <h4 class="h-title"><?php echo $info['userName'] ?> Profile</h4>
            <div class="row">
                <aside class="aside">
                    <?php Images::SetImg($commfilesuploaded . "users/", $imgname) ?>

                    <div class="bio">
                        <div class="information">
                            <pre><?php echo $info['aboutYou'] ?> </pre>
                        </div>

                        <div class="action">
                            <a href="users.php?actionMember=edit&IdUser=<?php echo $idUser ?>">Edit Bio</a>
                        </div>
                    </div>
                </aside>

                <div class="data">
                    <div class="username contant">
                        <div class="information">
                            <span>User Name: </span> <p><?php echo $info['userName'] ?></p>
                        </div>
                    </div>

                    <div class="email contant">
                        <div class="information ">
                            <span>Email: </span> <p> <?php echo $info['email'] ?></p>
                        </div>
                    </div>

                    <div class="fullname contant">
                        <div class="information ">
                            <span>Full name</span> <p> <?php echo $info['fullName'] ?></p>
                        </div>
                    </div>


                    <div class="sklis contant">
                        <div class="information">
                            <span>Skiles</span> <p> <?php echo $info['langAndTools'] ?></p>
                        </div>

                    </div>

                    <div class="age contant">
                        <div class="information">
                        <span>Age</span> <p> <?php echo $info['age'] ?></p>
                        </div>
                    </div>

                    <div class="reg-date contant">
                        <div class="information">
                        <span>Register Date</span> <p> <?php echo $info['dataRegister'] ?> </p>
                        </div>
                    </div>

                    <div class="reg-date contant">
                        <div class="information">
                        <span>Number Articles</span> <p> <?php echo $numberArticles ?> </p>
                        </div>
                    </div>
                    

                    <div class="reg-date contant">
                        <div class="information">
                        <span>Number Categories</span> <p> <?php echo $numberCat ?> </p>
                        </div>
                    </div>

                    
                    <div class="action">
                            <a href="users.php?actionMember=edit&IdUser=<?php echo $idUser ?>">Edit</a>
                        </div>
                </div>

            </div>


            <!-- Start Show Articles -->
                <h4 class="h-title">Your Articles</h4>
                <div class="articles">
                    <?php PrintArticles() ?>
                </div>
        <?php
    }

// Last Page
    StructerProfiel();
    include ($tpl . 'footer.php');
    ob_end_flush();