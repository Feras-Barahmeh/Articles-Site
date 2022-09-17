<?php

// Header Configration
    ob_start();
    session_start();
    $TITLE =  isset($_SESSION) && !empty($_SESSION) ? $_SESSION['user'] : "Undefined";
    include ("init.php");

// Fork Structer 

    function SetMediaLinks() {
        $user = GetRequests::GetValueGet("user");
        $userNams = Queries::FromTable(
                                        "githup, facebook, twitter, linkedin, location, website",
                                        "users",
                                        "WHERE userName = '" . $user . "'", 
                                        "fetch");

        // Set Country
        if (! empty($userNams['location'])) {
            ?>
                <li><a href=""><i class="fa-solid fa-location-dot"></i><?php echo $userNams["location"]  ?></a></li>
            <?php
        }

        // Set GitHup Account
    
        if (! empty($userNams["githup"])) {

            ?>
                <li><a href="https://github.com/<?php echo $userNams["githup"] ?>"><i class="fa-brands fa-github"></i><?php echo $userNams["githup"]  ?></a></li>
            <?php
        }

        if (! empty($userNams["facebook"])) {
            ?>
                <li><a href="https://www.facebook.com/<?php echo $userNams['facebook'] ?>"><i class="fa-brands fa-facebook"></i><?php echo $userNams["facebook"]  ?></a></li>
            <?php
        }

        if (! empty($userNams["twitter"])) {
            ?>
                <li><a href="https://twitter.com/<?php echo $userNams['twitter'] ?>"><i class="fa-brands fa-twitter"></i><?php echo $userNams["twitter"]  ?></a></li>
            <?php
        }

        if (! empty($userNams["linkedin"])) {
            ?>
                <li><a href="https://www.linkedin.com/in/<?php echo $userNams["linkedin"] ?>"><i class="fa-brands fa-linkedin"></i><?php echo $userNams["linkedin"]  ?></a></li>
            <?php
        }

        if (! empty($userNams["website"])) {
            ?>
                <li><a href="<?php echo $userNams["website"] ?>"><i class="fa-solid fa-browser"></i><?php echo $userNams["website"]  ?></a></li>
            <?php
        }
        
    }

    function PrepareSkilleAndRate($langs) : array{
        $lang = explode(",", $langs);
        return $lang;
    }

    
    function SetProsses($to) {
        if (!empty($to)) {
            ?>
                <div class="prosses">
                    <div class="back" style="width: <?php echo $to ?>;"></div>
                    <div class="rate"><?php echo $to ?></div>
                </div>
            <?php
        }
    }

    function SetLanguges() {
        $lansUser = Queries::FromTable("langs", "users", "WHERE IdUser = {$_SESSION['IdUser']}", "fetch")['langs'];
        $langs = PrepareSkilleAndRate($lansUser);
        foreach ($langs as $lang) {
            $lang = explode(":", $lang);
            $langName = $lang[0];
            $langRate = $lang[1];
            
            
            ?>
                <li>
                    <div class="content-ul">
                        <label><?php echo $langName ?></label>
                        <?php SetProsses($langRate) ?>
                    </div>
                </li>
            <?php 
        }
    }


    function SetTools() {
        $toolsUser = Queries::FromTable("tools", "users", "WHERE IdUser = {$_SESSION['IdUser']}", "fetch")['tools'];
        $tools = PrepareSkilleAndRate($toolsUser);
        foreach ($tools as $tool) {
            $tool = explode(":", $tool);

            $toolName = $tool[0];

            if (isset($tool[1])) {
                $toolRate = $tool[1];
            } else {
                $toolRate = "";
            }
            
            ?>
                <li>
                    <div class="content-ul">
                        <label><?php echo $toolName ?></label>
                        <?php SetProsses($toolRate) ?>
                    </div>
                </li>
            <?php 
        }
    }


    function StructAside() {
        ?>
            <aside id="aside-profile-page" class="aside-profile-page">
                <div class="logo">
                    <a href="#"><span><?php echo $_SESSION['user'][0] ?></span><span><?php echo substr($_SESSION['user'], 1) ?></span></a>
                </div>

                <!-- Toggel Start -->
                <div class="nav-toggeler">
                    <span></span>
                </div>

                <nav>
                    <!-- Links Media -->
                    <ul id="links-media" class="contanier-section">
                        <?php SetMediaLinks() ?>
                        <a href="editprofile.php?user=<?php echo $_SESSION['user'] ?>" class="edit-profile">Edit</a>
                    </ul>

                    <!-- Language Skilles -->
                    <ul id="langs" class="contanier-section">
                        <h4>Languages</h4>
                        <?php SetLanguges() ?>
                    </ul>

                    <!-- Tools And Skiles -->
                    <ul id="skils" class="contanier-section">
                        <h4>Skiells</h4>
                        <?php SetTools() ?>
                    </ul>
                </nav>
            </aside>
        <?php
    }

    function StructerCardsSection() {
        $user = Queries::FromTable("*", "users", "WHERE IdUser = {$_SESSION['IdUser']}", "fetch");

        ?>
            <section class="cards">
                    <!-- Start Favarit Articles -->
                    <div class="card-statistics">
                        <h4>Favarite Feild</h4>
                        <span>Web Devalobment</span>
                    </div>
                    <!-- End Favarit Articles -->

                    <!-- Start nakie Articles -->
                    <div class="card-statistics">
                        <h4>Nickname</h4>
                        <span><?php echo $user['nickname'] ?></span>
                    </div>
                    <!-- End nakie Articles -->

                    <!-- Start AGE Articles -->
                    <div class="card-statistics">
                        <h4>Age</h4>
                        <span><?php echo $user['age'] ?></span>
                    </div>
                    <!-- End age Articles -->

                    <!-- Start loin Articles -->
                    <div class="card-statistics">
                        <h4>Register Date</h4>
                        <span><?php echo $user['dataRegister'] ?></span>
                    </div>
                    <!-- End join Articles -->

            </section>
        <?php
    }

    function StructerStatistics() {
        $aboutUser = Queries::FromTable("aboutYou", "users", "WHERE IdUser = {$_SESSION['IdUser']}", "fetch")['aboutYou'];
        ?>
            <!-- Start About You Section -->
            <section class="about-you">
                <div class="header">
                    <h4>About You</h4>
                </div>
                <p>
                    <?php echo $aboutUser ?>
                </p>
            </section>
            <!-- End About You -->

            <!--Statistics  -->
            <section class="Statistics-section">
                <!-- Start Articles -->
                    <div class="inner-section">
                        <div class="header">
                            <h4>Last Articles Read</h4>
                            <span class="shrink-content" id="to-show-articls"><p>Show All</p><i class="fa fa-caret-down" id="down-section"></i><i class="fa-solid fa-caret-up" id="up-section"></i></span>
                        </div>
                        <ul id="articles">
                            <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos rem laborum quae.</p><a class="btn-a" href="#">Read</a></li>
                            <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos rem laborum quae.</p><a class="btn-a" href="#">Read</a></li>
                            
                        </ul>
                    </div>
                <!-- End Articles -->

                <!-- Start Articles -->
                    <div class="inner-section">
                        <div class="header">
                            <h4>Last Comments</h4>
                            <span class="shrink-content" id="to-show-comments"><p>Show Comment</p><i class="fa fa-caret-down" id="down-section-comm"></i><i class="fa-solid fa-caret-up" id="up-section-comm"></i></span>
                        </div>
                        <ul id="comments">
                            <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos rem laborum quae.</p><a class="btn-a" href="#">Go</a></li>
                            <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos rem laborum quae.</p><a class="btn-a" href="#">Go</a></li>
                            
                        </ul>
                    </div>

                <!-- Start Read Later -->
                    <div class="inner-section">
                        <div class="header">
                            <h4>Read Later Artiles</h4>
                            <span class="shrink-content" id="to-queue-articles"><p>show</p><i class="fa fa-caret-down" id="down-queue-articles"></i><i class="fa-solid fa-caret-up" id="up-queue-articles"></i></span>
                        </div>
                        <ul id="queue-articles">
                            <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos rem laborum quae.</p><a class="btn-a" href="#">Go</a></li>
                            <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos rem laborum quae.</p><a class="btn-a" href="#">Go</a></li>
                            
                        </ul>
                    </div>
                <!-- End Read Later -->
            </section>
        <?php
    }

// Main Structer 

    function MainStructer() {
        ?>

            <!-- Aside  Start  -->
            <?php StructAside() ?>
            <!-- Aside  End  -->

            <div class="main-contanier contanier-profile">
                <!-- Start Cards Section -->
                <?php StructerCardsSection(); ?>
                <!-- End Cards Section -->
            
                <!-- Start statistics -->
                <?php StructerStatistics(); ?> 
                <!-- End statistics -->
            </div>

        <?php
        
    }


// Main 
    if (isset($_SESSION) && !empty($_SESSION)) {
        MainStructer();
    } else {
        echo "Canot Inter";
    }

// Footer Configration
    include ($tpl . "footer.php");
    ob_end_flush();