<?php 
// Global Defination 
    ob_start();
    session_start();
    $TITLE = "Dashbord";
    include('init.php');

// Start Fork Functions

    function StructerStatusCards() {
        ?>
            <div class="contant-status-cards">
                <div class="users-number status-card">
                    <span class="vertical-line"> 
                        <i class="fa-solid fa-users" aria-hidden="true"></i>
                        <a href="users.php"><?php echo Queries::Counter('IdUser', 'users' , "WHERE permission != 1") ?></a>
                    </span>
                    <p class="indication-card">Members</p>
                </div>

                <div class="Pending Memeber status-card">
                    <span class="vertical-line">
                    <i class="fa fa-user-plus"  aria-hidden="true"></i>
                        <a href="#">12</a>
                    </span>
                    <p class="indication-card">Pending Users</p>
                </div>

                <div class="total-artical status-card">
                    <span class="vertical-line">
                        <i class="fa-solid fa-newspaper" aria-hidden="true"></i>
                        <a href="articles.php">3</a>
                    </span>
                    <p class="indication-card">Articles</p>
                </div>

                <div class="comments status-card">
                    <span class="vertical-line">
                        <i class="fa-solid fa-comment"  aria-hidden="true"></i>
                        <a href="#">44</a>
                    </span>
                    <p class="indication-card">Comments</p>
                </div>
            </div>
        <?php
    }

    function SidBarStructer() {
        global $commfilesImags, $commfilesuploaded;
        $nameUser =  Queries::FromTable('userName', 'users', "WHERE IdUser = " . Sessions::GetValueSessionDepKey('IdUser'), 'fetch')['userName']
        ?>
            
                <aside class="contant-sidbar">

                    <h4 class="name"> <?php Images::SetImg($commfilesuploaded . 'users/', Images::GetNameImgFromDB('imageName', 'users', "Where IdUser = " .  Sessions::GetValueSessionDepKey('IdUser')), 'small-img'); echo $nameUser; ?>  </h4>
                    <ul>
                        <li> <i class="fa-solid fa-house" aria-hidden="true"></i> <a href="#">Home</a>  </li> <hr>
                        <li> <i class="fa-solid fa-gears"  aria-hidden="true"></i> <a href="#">Setting App</a>  </li> <hr>
                        <li> <i class="fa-solid fa-newspaper" aria-hidden="true"></i><a href="#">Add Article</a>  </li> <hr>
                        <li> <i class="fa-solid fa-plus" aria-hidden="true"></i> <a href="users.php?actionMember=add">Add Member</a></li>
                    </ul>

                    <!-- <img src="<?php echo $commfilesImags  ?>/imagesProject/defaultImg.jpg" alt="user img" class="img-user-aside"> -->
                    <img src="<?php echo $commfilesImags  ?>/logos/logo3.jpg" alt="user img" class="img-user-aside">
                </aside>
        <?php
    }

    function ControlePanel() {
        ?>
                <div class="statistics">
                </div>
            </div>
        <?php
    }

// End Fork Functions

// Start Main Function

    function ControllerLayout() { 
        ?>
        <div class="dashbord">
            <?php 
                SidBarStructer();
            ?>
            <section class="containt-section">
                <?php 
                    StructerStatusCards();
                    ControlePanel(); 
                ?>
            </section>
        </div>
        <?php
    }



// Controller Part


    if (Sessions::IfSetSession() && Sessions::IfSetSessionDepValue('IdUser')) {
        $permission = Queries::FromTable('permission', 'users', "WHERE IdUser = " . Sessions::GetValueSessionDepKey('IdUser'), 'fetch')['permission'];

        if ($permission  == 1) {
            SetNav();
            ControllerLayout();
        } else {
            GlobalFunctions::AlertMassage("Your Permission Don't Let You To Enter This Page");
            ?> <a href="index.php"  class="form-btn back-btn">Bake</a> <?php
        }

    } else {
        GlobalFunctions::AlertMassage("Can't Enter This Page Directry");
        ?> <a href="index.php"  class="form-btn back-btn">Bake</a> <?php
    }

    include($tpl . 'footer.php');
    ob_end_flush();


// End Global Difination