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
                            Queries::FromTable("imageName", "users", "WHERE IdUser = {$_SESSION['IdUser']}", "fetch")['imageName'],
                            "profile-pictuer");
                ?>
                <div class="dropdown" id="deopdown-btn"><span>majd</span><i class="fa-sharp fa-solid fa-caret-down" id="down"></i><i class="fa-solid fa-caret-up" id="up"></i></div>
                <ul class="ul-dropdown" id="ul-dropdown">
                        <li><a href="#">Read Later</a></li>
                        <li><a href="#">Favarit Article</a></li>
                        <li><a href="editprofile.php?user=<?php echo $_SESSION['user'] ?>">Edit Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Membership request</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
            </div>

            <ul>
                <li><a href="../../index.php" class="active">Home</a></li>
                <li><a href="#" >Articles</a></li>
                <li><a href="#" >Problems</a></li>
                <li><a href="#" >Solve Bugs</a></li>
                <li><a href="#" >Queties</a></li>
                
            </ul>

        </div>
    </nav>