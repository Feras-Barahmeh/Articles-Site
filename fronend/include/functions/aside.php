<aside id="aside-index">
    <div class="logo">
        <a href="#"><span><?php echo $_SESSION['user'][0] ?></span><span><?php echo substr($_SESSION['user'], 1) ?></span></a>
    </div>

    <!-- Toggel Start -->
    <div class="nav-toggeler">
        <span></span>
    </div>

    <nav>
        <ul id="index-a">
            <li><a href="../../index.php" class="active"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="#"><i class="fa-solid fa-briefcase"></i>Portfolio</a></li>
            <li><a href="logout.php"><i class="fa-sharp fa-solid fa-arrow-right-to-bracket"></i>Logout</a></li>
        </ul>
    </nav>
</aside>