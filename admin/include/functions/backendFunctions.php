<?php 


    class Printer {
        public static function PrintWriters() {
            $data = Queries::FromTable('IdUser, userName', 'users', "WHERE permission > 0");

            foreach($data as $info) {
            ?>
                <option value="<?php echo $info['IdUser'] ?>"><?php echo $info['userName'] ?></option>
            <?php 
            }
        }

        
        public static function PrintCatName() {
            $nameCats = Queries::FromTable("titleCategory", 'categories');
            foreach ($nameCats as $nameCat) {
            ?>
                <li class="showCat for-search"><a href="filterByCat.php?CatName=<?php  echo str_replace(" ", '-', $nameCat['titleCategory']) ?>" class="search-li"><?php  echo $nameCat['titleCategory'] ?></a>  </li> 
            <?php }
        }

    }


    function CountDraft() {
        $countDraft = Queries::Counter("id_draft", "quick_draft", "WHERE id_user = {$_SESSION['IdUser']} AND if_executed = 0");
        if ($countDraft > 0) {
                ?>
                    <span class="count-draft"><?php echo $countDraft ?></span>
                <?php
        }
    }

    function AsideHeaderStructer() {
        ?>

            <!-- Start Aside -->
                <aside class="sidebar relative p-20  box-sh-op10-clwh">
                    <h3 class="relative txt-cn mt-0">Feras <span class="last-name">Barahmeh</span></h3>
                    <ul>
                        <li>
                            <a class="active flex f-al-ce p-10 mb-5 rad-5 fs-14" href="dashbord.php">
                                <i class="fa fa-chart-bar fa-fw mr-10"></i>
                                <span class="hide-mobile">Dashbord</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex f-al-ce p-10 mb-5 rad-5 fs-14" href="settings.html">
                                <i class="fa-solid fa-gear fa-fw mr-10"></i>
                                <span class="hide-mobile">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex f-al-ce p-10 rad-5 mb-5 fs-14" href="profile.html">
                                <i class="fa fa-user fa-fw mr-10"></i>
                                <span class="hide-mobile">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex f-al-ce p-10 mb-5 rad-5 fs-14" href="projects.html">
                                <i class="fa fa-share-nodes fa-fw mr-10"></i>
                                <span class="hide-mobile">Projects</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex f-al-ce p-10 mb-5 rad-5 fs-14" href="articles.php">
                                <i class="fa-solid fa-newspaper  fa-fw mr-10"></i>
                                <span class="hide-mobile">Articles</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex f-al-ce p-10 mb-5 rad-5 fs-14" href="frinds.html">
                                <i class="fa fa-user-group fa-fw mr-10"></i>
                                <span class="hide-mobile">Frinds</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex f-al-ce p-10 mb-5 rad-5 fs-14" href="files.html">
                                <i class="fa fa-file fa-fw mr-10"></i>
                                <span class="hide-mobile">Felieds</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex f-al-ce p-10 mb-5 rad-5 fs-14" href="quickDraft.php">
                                <i class="fa fa-book mr-10 relative"><?php CountDraft() ?></i>
                                <span class="hide-mobile">quick Draft  </span>
                            </a>
                        </li>
                    </ul>
                </aside>
            <!-- End Aside -->

            <!-- Start Content -->
                <div class="content  over-h w-fu">
                    <!-- Start Head -->
                    <div class="head flex  p-15 between-ele box-sh-op10-clwh">
                        <div class="search relative">
                            <i class="fa fa-magnifying-glass"></i>
                            <input type="search" name="" id="" class="rad-5 box-sh-op10-clwh" placeholder="Type a keyword">
                        </div>
                        <div class="icone flex f-al-ce ">
                            <span class="notification relative">
                                <i class="fa fa-bell fa-lg"></i>
                            </span>
                            <div class="options-user">

                            <button id="dropdoen-btn" class="deopdown-btn relative ml-10 mr-10 p-10 rad-5 cursor-pointer">
                                    <span class="hide-mobile"><?php echo $_SESSION['adminName'] ?></span> 
                                    <i class="fa-solid fa-caret-down " aria-hidden="true"></i><i class="fa-solid fa-caret-up opacity-low" aria-hidden="true"></i>
                                    <ul id="list-dropdown" class="list-dropdown opacity-low">
                                        <li class="mb-10 p-5 w-fu mb-10 pb-10 rad-5">
                                            <a class="between-ele ptb-5 plr-10 rad-5" href="profile.php?<?php echo Sessions::GetValueSessionDepKey('adminName') ?>"><i class="fa-solid fa-user icone-drobdown" aria-hidden="true" ></i>Profile</a>
                                            
                                        </li>
                                        <li class="mb-10 p-5 w-fu mb-10 pb-10 rad-5">
                                            <a class="between-ele ptb-5 plr-10 rad-5" href="users.php?actionMember=edit&IdUser=<?php echo Sessions::GetValueSessionDepKey('IdUser') ?>"><i class="fa-solid fa-pen-to-square icone-drobdown" aria-hidden="true"></i>Edit Profile</a> 
                                        </li>
                                        <li class="mb-10 p-5 w-fu mb-10 pb-10 rad-5">
                                            <a class="between-ele ptb-5 plr-10 rad-5" href="dashbord.php"><i class="fa-solid fa-chart-line icone-drobdown" aria-hidden="true"></i>Dashbord</a>
                                        </li>
                                        <li class="mb-10 p-5 w-fu mb-10 pb-10 rad-5">
                                            <a class="between-ele ptb-5 plr-10 rad-5" href="#"><i class="fa-solid fa-ranking-star icone-drobdown" aria-hidden="true"></i>promotion</a> 
                                        </li>
                                        <li class="mb-10 p-5 w-fu mb-10 pb-10 rad-5">
                                            <a class="between-ele ptb-5 plr-10 rad-5" href="logout.php"><i class="fa-solid fa-right-from-bracket icone-drobdown" aria-hidden="true"></i>logout</a>
                                        </li>
                                    </ul>
                            </button>

                    </div>
                            <img class="vs-img rad-c mr-10 ml-10" src="images/Avatares/avatar-6.jpg" alt="">
                        </div>
                    </div>
                    <!-- End Head -->
        <?php
    }





