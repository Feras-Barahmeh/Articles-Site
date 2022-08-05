<?php 
// Start Global Defination
    ob_start();
    session_start();
    $TITLE = "Dashbord";
    include('init.php');
    SetNav();
// End Global Difination

// Start Fork Functions

    function StructerStatusCards() {
        ?>
            <div class="contant-status-cards">
                <div class="users-number status-card">
                    <span class="vertical-line"> 
                        <i class="fa-solid fa-users" aria-hidden="true"></i>
                        <a href="#">11</a>
                    </span>
                    <p class="indication-card">Members</p>
                </div>

                <div class="Pending Memeber status-card">
                    <span class="vertical-line">
                        <i class="fa-solid fa-lock-open" aria-hidden="true"></i>
                        <a href="#">12</a>
                    </span>
                    <p class="indication-card">Admins</p>
                </div>

                <div class="total-artical status-card">
                    <span class="vertical-line">
                        <i class="fa-solid fa-newspaper" aria-hidden="true"></i>
                        <a href="#">3</a>
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
        global $commfilesImags;
        ?>
            
                <aside class="contant-sidbar">
                    <!-- <h4 class="name"><i class="fa fa-user" aria-hidden="true"></i> Feras </h4> -->
                    <h4 class="name"> <img src="<?php echo $commfilesImags ?>/imagesProject/defaultImg.jpg" alt=""> Feras </h4>
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



// Controllar functions
    if ( ! Sessions::IfSetSession()) {
        header('Location: index.php');
        exit();
    }

    ControllerLayout();
    include($tpl . 'footer.php');
    ob_end_flush();
