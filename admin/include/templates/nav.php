<?php 
    function NavStructer() {
        global $commfilesImags;
        ?>
                <nav>
                    <div class="logo"><a href="index.php"><img src="<?php echo $commfilesImags ?>logos/logo3.jpg" alt="Logo"></a></div>
                    <div class="bar">
                        <ul>
                            <li><a href="#">Articles</a></li>
                            <li><a href="#">Users</a></li>
                            <li><a href="#">Admins</a></li>
                            <li><a href="#">massags</a></li>
                            <!-- <li><a href="#">Lorem ipsum</a></li> -->
                            <!-- <li><a href="#">Lorem ipsum</a></li> -->
                        </ul>
                    </div>

                    <img src="static/../<?php echo $commfilesImags?>imagesProject/defaultImg.jpg" alt="person pictuer" class="profile-pictuer">

                    <div class="label-dropdown">
                        <div class="pull-right">
                            <div class="dropdown label-dropdown">
                                <button onclick="myFunction()" class="dropbtn">
                                    Feras <i class="fa-solid fa-caret-down" aria-hidden="true"></i>
                                <div id="myDropdown" class="dropdown-content">
                                    <a href="#">Profile</a>
                                    <a href="#">setting</a>
                                    <a href="#">Edit Profile</a>
                                    <a href="dashbord.php">To Dashbord</a>
                                    <a href="#">promotion member</a>
                                    <a href="logout.php">logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

        <?php
    }

    NavStructer();