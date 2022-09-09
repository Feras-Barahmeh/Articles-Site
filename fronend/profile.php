<?php

// Header Configration
    ob_start();
    session_start();
    $TITLE =  isset($_SESSION) && !empty($_SESSION) ? $_SESSION['user'] : "Undefined";
    include ("init.php");

// Fork Structer 
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
                    <a href="#" class="edit-profile">Edit</a>
                    <ul id="links-media" class="contanier-section">
                        <li><a href=""><i class="fa-brands fa-github"></i>FerasBarahmeh</a></li>
                        <li><a href=""><i class="fa-brands fa-facebook"></i>ferasfadi</a></li>
                        <li><a href=""><i class="fa-brands fa-twitter"></i>ferasfadi</a></li>
                        <li><a href=""><i class="fa-brands fa-linkedin"></i>Feras-Barahmeh</a></li>
                    </ul>
                    <ul id="langs" class="contanier-section">
                        <h4>Languages</h4>
                        <li>
                            <div class="content-ul">
                                <label>CPP</label>
                                <div class="prosses">
                                    <div class="back"></div>
                                    <div class="rate">40%</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="content-ul ">
                                <label>Python</label>
                                <div class="prosses">
                                    <div class="back"></div>
                                    <div class="rate">40%</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="content-ul ">
                                <label>PHP</label>
                                <div class="prosses">
                                    <div class="back"></div>
                                    <div class="rate">40%</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul id="skils" class="contanier-section">
                        <h4>Skiells</h4>
                        <li>
                            <div class="content-ul">
                                <label>GitHup</label>
                                <div class="prosses">
                                    <div class="back"></div>
                                    <div class="rate">30%</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="content-ul ">
                                <label>lINUX</label>
                                <div class="prosses">
                                    <div class="back"></div>
                                    <div class="rate">40%</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </aside>
        <?php
    }

    function StructerCardsSection() {
        ?>
            <section class="cards">
                    <!-- Start  Intersest Card -->
                    <div class="card-statistics">
                        <h4>Intersted To</h4>
                        <span>Machine Learning</span>
                    </div>
                    <!-- End Intersest Card -->

                    <!-- Start Favarit Articles -->
                    <div class="card-statistics">
                        <h4>Favarite Feild</h4>
                        <span>Web Devalobment</span>
                    </div>
                    <!-- End Favarit Articles -->

                    <!-- Start nakie Articles -->
                    <div class="card-statistics">
                        <h4>Nickname</h4>
                        <span>Bnz</span>
                    </div>
                    <!-- End nakie Articles -->

                    <!-- Start AGE Articles -->
                    <div class="card-statistics">
                        <h4>Age</h4>
                        <span>20</span>
                    </div>
                    <!-- End age Articles -->

                    <!-- Start loin Articles -->
                    <div class="card-statistics">
                        <h4>Register Date</h4>
                        <span>20-5-2022</span>
                    </div>
                    <!-- End join Articles -->

            </section>
        <?php
    }

    function StructerStatistics() {
        ?>
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

            <div class="main-contanier">
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