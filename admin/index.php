<?php 
// Start Global Defination
    ob_start();
    $TITLE = "Dashbord";
    include('init.php');
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
                    <p>Members</p>
                </div>

                <div class="Pending Memeber status-card">
                    <span class="vertical-line">
                        <i class="fa-solid fa-lock-open" aria-hidden="true"></i>
                        <a href="#">12</a>
                    </span>
                    <p>Admins</p>
                </div>

                <div class="total-artical status-card">
                    <span class="vertical-line">
                        <i class="fa-solid fa-newspaper" aria-hidden="true"></i>
                        <a href="#">3</a>
                    </span>
                    <p>Articles</p>
                </div>

                <div class="comments status-card">
                    <span class="vertical-line">
                        <i class="fa-solid fa-comment"  aria-hidden="true"></i>
                        <a href="#">44</a>
                    </span>
                    <p>Comments</p>
                </div>
            </div>
        <?php
    }

    function SidBarStructer() {
        ?>
            <div class="contant-index">
                <div class="contant-sidbar">
                    <div class="name"><i class="fa fa-user" aria-hidden="true"></i> Feras</div>
                    <ul>
                        <li> <i class="fa-solid fa-house" aria-hidden="true"></i> <a href="#">Home</a></li> <hr>
                        <li> <i class="fa-solid fa-gears"  aria-hidden="true"></i> <a href="#">Setting App</a></li> <hr>
                        <li> <i class="fa-solid fa-newspaper" aria-hidden="true"></i><a href="#">Add Article</a></li> <hr>
                        <li> <i class="fa-solid fa-plus" aria-hidden="true"></i> <a href="users.php?actionMember=add">Add Member</a></li> <hr>
                    </ul>
                </div>
        <?php
    }

    function ControlePanel() {
        ?>
                <div class="controle-panel">


                </div>
            </div>
        <?php
    }

// End Fork Functions

    function BarStructer() { 
        StructerStatusCards();
        SidBarStructer();
        ControlePanel();
    }



// Controllar functions
    BarStructer();
    include($tpl . 'footer.php');
    ob_end_flush();
