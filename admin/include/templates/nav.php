<?php 
    function NavStructer() {
        global $commfilesImags;
        global $commfilesuploaded;

        ?>
                <nav>
                    <div class="logo"><a href="dashbord.php"><img src="<?php echo $commfilesImags ?>logos/logo.jpg" alt="Logo"></a></div>
                    <div class="bar">
                        <ul>
                            <li><a href="categories.php">Categories</a></li>
                            <li><a href="users.php?show=users">Users</a></li>
                            <li><a href="users.php?show=admins">Admins</a></li>
                            <li><a href="articles.php">Articles</a></li>
                            <li><a href="#">Massags</a></li>
                            <li><a href="#">Quotes</a></li>
                        </ul>
                    </div>

                    <div class="options-user">
                        <?php Images::SetImg($commfilesuploaded.'users/', Images::GetNameImgFromDB('imageName', 'users', "Where IdUser = " .  Sessions::GetValueSessionDepKey('IdUser')), 'profile-pictuer') ?>

                        <div class="label-dropdown">
                            <div class="pull-right">
                                <div class="dropdown label-dropdown">
                                    <button onclick="myFunction()" class="dropbtn name-in-nav">
                                        <?php echo $_SESSION['adminName'] ?>  <i class="fa-solid fa-caret-down" aria-hidden="true"></i>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a href="#"><i class="fa-solid fa-user icone-drobdown" aria-hidden="true" ></i>Profile</a> <hr class="separetor-links">
                                        <a href="#"><i class="fa-solid fa-gear icone-drobdown" aria-hidden="true"></i>setting</a>  <hr class="separetor-links">
                                        <a href="users.php?actionMember=edit&IdUser=<?php echo Sessions::GetValueSessionDepKey('IdUser') ?>"><i class="fa-solid fa-pen-to-square icone-drobdown" aria-hidden="true"></i>Edit Profile</a>  <hr class="separetor-links">
                                        <a href="dashbord.php"><i class="fa-solid fa-chart-line icone-drobdown" aria-hidden="true"></i>To Dashbord</a>  <hr class="separetor-links">
                                        <a href="#"><i class="fa-solid fa-ranking-star icone-drobdown" aria-hidden="true"></i>promotion member</a>  <hr class="separetor-links">
                                        <a href="logout.php"><i class="fa-solid fa-right-from-bracket icone-drobdown" aria-hidden="true"></i> logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

        <?php
    }

    NavStructer();