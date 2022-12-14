<?php 
    require_once "../commonBetweenBackFront\php\images.php";
?>
    <!-- This If Statment To Set Width Nav 100% if You need it (Declaration AllWidth Var in page) -->
    <nav class="nav-front  <?php if (isset($AllWidth)) echo "width" ?>">
        <div class="contaner-navigation-bar <?php if (isset($AllWidth)) echo "width-nav"; ?>">
            <div class="contanier-options">
                <?php

                    ShowImage::SetImg(
                            "../../commonBetweenBackFront/uploaded/users/", 
                            Queries::FromTable("imageName", "users", "WHERE IdUser = {$_COOKIE['IdUser']}", "fetch")['imageName'],
                            "profile-pictuer");
                ?>
                <div class="dropdown" id="deopdown-btn"><span><?php echo $_COOKIE["userName"] ?></span><i class="fa-sharp fa-solid fa-caret-down" id="down"></i><i class="fa-solid fa-caret-up" id="up"></i></div>
                <ul class="ul-dropdown" id="ul-dropdown">
                        <li><a href="#">Read Later</a></li>
                        <li><a href="#">Favarit Article</a></li>
                        <li><a href="editprofile.php?user=<?php echo $_COOKIE['userName'] ?>">Edit Profile</a></li>
                        <li><a href="profile.php?user=<?php echo $_COOKIE['userName'] ?>">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Membership request</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
            </div>

            <ul>
                <li><a href="../../index.php" class="active li-nav">Home</a></li>
                <li><a class="li-nav" href="..//articles.php" >Articles</a></li>
                <li><a class="li-nav" href="#" >Problems</a></li>
                <li><a class="li-nav" href="#" >Solve Bugs</a></li>
                <li><a class="li-nav" href="#" >Queties</a></li>
            </ul>

        </div>
    </nav>