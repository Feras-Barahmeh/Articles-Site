<?php
// Global Defination 
    ob_start();
    session_start();
    $TITLE = "Dashbord";
    include('init.php');

// Start Fork Functions


function FilterDraftInput() {

    $title = filter_var($_POST["title-draft"], FILTER_UNSAFE_RAW);
    $content = filter_var($_POST["content-draft"], FILTER_DEFAULT);
    return [
        "titleDraft" => $title,
        "content" => $content,
    ];
}
function IfValidDraft($dataDraft) {
    $ifValid = true;
    if (Queries::IfExsist("title_draft", "quick_draft", $dataDraft["titleDraft"], "string") ) {
        $ifValid = false;
    }
    if (Queries::IfExsist("content_draft", "quick_draft", $dataDraft["content"], "string") ) {
        $ifValid = false;
    }
    if (empty($dataDraft['content'])) {
        $ifValid = false;
    }
    if (empty($dataDraft['titleDraft'])) {
        $ifValid = false;
    }

    return $ifValid;
}
function AddDraft() {

    if (isset($_POST["quick-draft"]) && !empty($_POST["quick-draft"])) {
        $dataDraft = FilterDraftInput();
        if (IfValidDraft($dataDraft)) {
            Queries::Insert("quick_draft", 
            ["id_user", "content_draft", "title_draft"], 
            [$_SESSION["IdUser"], "'" . $dataDraft["content"] . "'", "'" . $dataDraft["titleDraft"] . "'"]) ;
        }
    }
}

function Page() {
    AddDraft();
    ?>
        <!-- Start Main Page  -->
        <div class="dashbord flex">
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
                            <a class="flex f-al-ce p-10 mb-5 rad-5 fs-14" href="articlesV2.php">
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
                                <span class="hide-mobile">Files</span>
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
                    <h1 class="ml-20 mb-20 fs-20 relative">Dashbord</h1>
                    <div class="wrapper boxs-contanier grid gap-20">
                        <div class="welcome p-20 pb-5 rad-10  txt-c-mobile block-mobile">
                            <div class="layout-box flex f-sp-between p-20">
                                <div class="name">
                                    <h2 class="title-box m-0">welcome</h2>
                                    <p class="mt-5">Feras Barahmeh</p>
                                </div>
                                <img src="images/welcome.png" class="hide-mobile" alt="">
                            </div>
                            <img class="pictuer" src="images/Avatares/avatar-6.jpg" alt="">
                            <div class="body-box txt-cn flex p-20 mb-20 block-mobile gap-10">
                                <div class="">Feras <span class="block fs-14 mt-10 white-bg-color">Enginnering</span></div>
                                <div class="">10 <span class="block fs-14 mt-10 white-bg-color">Projects</span></div>
                                <div class="">$1000<span class="block fs-14 mt-10 white-bg-color">Salary</span></div>
                            </div>
                            <a href="profile.html" class="visit block fs-14 rad-5 w-fit mb-5 ptb-5 plr-10">Profile</a>
                        </div>

                        <!-- Start Quick draft -->
                        <div class="quick-draft p-20 pb-10 rad-10  txt-c-mobile block-mobile" id="quick-draft">
                            <h2 class="title-box m-0 mb-5">Quick Draft</h2>
                            <p class="black-txt-color">Write A Quick Draft</p>
                            <form  action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                                <input 
                                    class="ptb-5 plr-10 outline-none bor-no w-fu mb-20 gray-bg rad-5 " 
                                    name="title-draft" 
                                    id="title-draft"
                                    type="text" 
                                    required 
                                    placeholder="Title">
                                <textarea 
                                        class="w-fu no-resize outline-none bor-no p-20 gray-bg rad-3 server-txt-color "
                                        name="content-draft"
                                        required 
                                        cols="30" 
                                        rows="10" 
                                        placeholder="What You Thought"></textarea>
                                <input type="submit" id="quick-draft" name="quick-draft" value="Rember me pleas" class="btn-shape mt-15 fs-14 btn-shape-left">
                            </form>
                        </div>
                        <!-- End Quick draft -->

                        <!-- Start Targets -->
                        <div class="quick-draft p-20 pb-5 rad-10  txt-c-mobile block-mobile">
                            <h2 class="title-box m-0 mb-5">Yearly Target</h2>
                            <p class="black-txt-color">Targets for this year</p>
                            <div class="target-row m-5 center-ele ">
                                <div class="icone center-ele">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                </div>
                                <div class="content-target">
                                    <span class="heading-title txt-l block fs-14">Money</span>
                                    <span class="num fw-700 block txt-l mtb-5">$890.00</span>
                                    <div class="progress block relative mt-20">
                                        <div class="" style="width: 45%;">
                                            <span class="presenting">45%</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="target-row m-5 mt-10 center-ele ">
                                <div class="icone center-ele">
                                    <i class="fa-solid fa-code"></i>
                                </div>
                                <div class="content-target">
                                    <span class="heading-title block txt-l fs-14">Projects</span>
                                    <span class="num fw-700 txt-l  block mtb-5">5</span>
                                    <div class="progress relative block mt-20">
                                        <div class="" style="width: 55%;">
                                            <span class="presenting">55%</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="target-row m-5 mt-10 center-ele ">
                                <div class="icone center-ele">
                                    <i class="fa-solid fa-user-group"></i>
                                </div>
                                <div class="content-target">
                                    <span class="heading-title block txt-l fs-14">Team</span>
                                    <span class="num fw-700 block txt-l mtb-5">12</span>
                                    <div class="progress block relative mt-20">
                                        <div class="" style="width: 40%;">
                                            <span class="presenting">40%</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- End Targets -->

                        <!-- Start Last Artiles -->
                        <div class="last-articles p-20 rad-5">
                            <h4 class="title-box m-0 ">Last Articles</h4>
                            <div class="article flex f-al-ce mtb-15">
                                <img class="s-rec-img mr-10 rad-5" src="images/articels/news-01.png" alt="">
                                <div class=" flex flex-1 f-al-ce f-sp-between">
                                    <div class="data">
                                        <p class="title-article m-0 pb-5">Lorem ipsum dolor sit amet.</p>
                                        <span class="binft fs-14">Lorem ipsum dolor sit.</span>
                                    </div>
                                    <div class="date w-fit fs-10 p-5 rad-3 txt-cn">3 Day Ago</div>
                                </div>
                            </div>
                            <div class="article flex f-al-ce mtb-15">
                                <img class="s-rec-img mr-10 rad-5" src="images/articels/news-02.png" alt="">
                                <div class="flex flex-1 f-al-ce f-sp-between">
                                    <div class="data">
                                        <p class="title-article m-0 pb-5">Lorem ipsum dolor sit amet.</p>
                                        <span class="binft fs-14">Lorem ipsum dolor sit.</span>
                                    </div>
                                    <div class="date w-fit fs-10 p-5 rad-3 txt-cn">2 Day Ago</div>
                                </div>
                            </div>
                            <div class="article flex f-al-ce mtb-15">
                                <img class="s-rec-img mr-10 rad-5" src="images/articels/news-03.png" alt="">
                                <div class="flex flex-1 f-al-ce f-sp-between">
                                    <div class="data">
                                        <p class="title-article m-0 pb-5">Lorem ipsum dolor sit amet.</p>
                                        <span class="binft fs-14">Lorem ipsum dolor sit.</span>
                                    </div>
                                    <div class="date w-fit fs-10 p-5 rad-3 txt-cn">5 Day Ago</div>
                                </div>
                            </div>
                            <div class="article flex f-al-ce mtb-15">
                                <img class="s-rec-img mr-10 rad-5" src="images/articels/news-04.png" alt="">
                                <div class="flex flex-1 f-al-ce f-sp-between">
                                    <div class="data">
                                        <p class="title-article m-0 pb-5">Lorem ipsum dolor sit amet.</p>
                                        <span class="binft fs-14">Lorem ipsum dolor sit.</span>
                                    </div>
                                    <div class="date w-fit fs-10 p-5 rad-3 txt-cn">1 Day Ago</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Last Artiles -->

                        <!-- Start Statistics -->
                        <div class="statistics box-sh-op10-clwh p-20 rad-10" id="statistics">
                            <h2 class="title-box">General Statistics</h2>
                            <div class="boxs grid wrapper-150 gap-10 w-fu">
                                <div class="box p-10 center-ele sort-col">
                                    <div class="icone ">
                                        <i class="fa fa-user-group fa-lg color-skin"></i>
                                    </div>
                                    <div class="num txt-cn">
                                        <div class="mt-10 fs-20 fw-500"><a href="#">2000</a></div>
                                        <span class="bolck txt-cn fs-14">User</span>
                                    </div>
                                </div>
                                <div class="box p-10 center-ele sort-col">
                                    <div class="icone ">
                                        <i class="fa-solid fa-newspaper fa-lg color-skin"></i>
                                    </div>
                                    <div class="num txt-cn">
                                        <div class="mt-10 fs-20 fw-500"><a href="#">150</a></div>
                                        <span class="bolck txt-cn fs-14">Articles</Article></span>
                                    </div>
                                </div>
                                <div class="box p-10 center-ele sort-col">
                                    <div class="icone ">
                                        <i class="fa fa-clock fa-lg color-skin"></i>
                                    </div>
                                    <div class="num txt-cn">
                                        <div class="mt-10 fs-20 fw-500"><a href="#">0</a></div>
                                        <span class="bolck txt-cn fs-14">Pending Users</span>
                                    </div>
                                </div>
                                <div class="box p-10 center-ele sort-col">
                                    <div class="icone ">
                                        <i class="fa fa-tag fa-lg color-skin"></i>
                                    </div>
                                    <div class="num txt-cn">
                                        <div class="mt-10 fs-20 fw-500"><a href="#">15</a></div>
                                        <span class="bolck txt-cn fs-14">Felieds Articles</span>
                                    </div>
                                </div>
                                <div class="box p-10 center-ele sort-col">
                                    <div class="icone ">
                                        <i class="fa fa-key fa-lg color-skin"></i>
                                    </div>
                                    <div class="num txt-cn">
                                        <div class="mt-10 fs-20 fw-500"><a href="#">32</a></div>
                                        <span class="bolck txt-cn fs-14">Admins</span>
                                    </div>
                                </div>
                                <div class="box p-10 center-ele sort-col">
                                    <div class="icone">
                                        <i class="fa fa-x fa-lg color-skin"></i>
                                    </div>
                                    <div class="num txt-cn">
                                        <div class="mt-10 fs-20 fw-500"><a href="#">100</a></div>
                                        <span class="bolck txt-cn fs-14">Deleted Users</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Statistics -->

                        
                        <!-- Start Spesific Statistics -->
                        <div class="last-statistics p-20 ">
                            <h2 class="title-box">Last Statistics</h2>
                            <div class="flex mb-10">
                                <div class="img s-img mr-10"><img class="s-img" src="images/articels/news-04.png" alt="Article"></div>
                                <div class="detailes flex-1 flex sort-col">
                                    <div class="title-box mb-15 fs-20  txt-cn">Last Article</div>
                                    <div class="box-to between-ele">
                                        <div class="title-content">Lorem, ipsum dolor</div>
                                        <a href="#" class="read btn-shape">Go</a>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mb-10">
                                <div class="img s-img mr-10"><img class="s-img" src="images/articels/news-02.png" alt=""></div>
                                <div class="detailes flex-1 flex sort-col">
                                    <div class="title-box mb-15 fs-20  txt-cn">Last Feild</div>
                                    <div class="box-to between-ele">
                                        <div class="title-content">Lorem, ipsum dolor</div>
                                        <a href="#" class="read btn-shape">Go</a>
                                    </div>
                                </div>
                            </div>
                            <div class="flex f-al-ce mb-10">
                                <div class="img s-img mr-10"><img class="s-img" src="images/articels/news-01.png" alt=""></div>
                                <div class="detailes flex-1 flex sort-col">
                                    <div class="title-box mb-15 fs-20  txt-cn">Last Quick Draft</div>
                                    <div class="box-to f-al-ce between-ele">
                                        <div class="title-content">Lorem, ipsum dolor</div>
                                        <a href="#" class="read btn-shape">Go</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Spesific Statistics -->

                        
                        <!-- Start Spesific Statistics -->
                        <div class="top-search-keyword p-20">
                            <h2 class="title-box">Top Search Keyword</h2>
                            <div class="mb-15 heading-row flex between-ele">
                                <span class="fs-14">keyword</span>
                                <span class="fs-14">Search Count</span>
                            </div>
                            <div class="row mb-10 flex between-ele">
                                <span class="key">Js</span>
                                <span class="count">1000</span>
                            </div>
                            <div class="row mb-10 flex between-ele">
                                <span class="key">Python</span>
                                <span class="count">365</span>
                            </div>
                            <div class="row mb-10 flex between-ele">
                                <span class="key">C++</span>
                                <span class="count">250</span>
                            </div>
                        </div>
                        <!-- End Spesific Statistics -->

                        
                        <!-- Start Social Meadi Stats -->
                        <div class="social-links p-20">
                            <h2 class="title-box">Social Meadi Stats</h2>
                            <div class="row mb-10 flex blue">
                                <div class="app-icone mr-10 center-ele">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </div>
                                <div class="status flex flex-1 between-ele f-al-ce">
                                    <span class="followers fs-14"><span class="mr-10">90K</span> Follower</span>
                                    <div class="visite blue-btn"><a href="#">Follow</a></div>
                                </div>
                            </div>
                            <div class="row mb-10 flex blue">
                                <div class="app-icone mr-10 center-ele">
                                    <i class="fab fa-linkedin fa-lg"></i>
                                </div>
                                <div class="status flex flex-1 between-ele f-al-ce">
                                    <span class="followers fs-14"><span class="mr-10">500+</span> connections</span>
                                    <div class="visite github-btn blue-btn"><a href="#">connect</a></div>
                                </div>
                            </div>
                            <div class="row mb-10 flex black">
                                <div class="app-icone github  mr-10 center-ele">
                                    <i class="fa-brands fa-github fa-lg"></i>
                                </div>
                                <div class="status flex flex-1 between-ele f-al-ce">
                                    <span class="followers fs-14 txt-githup"><span class="mr-10 txt-githup">500+</span> followes</span>
                                    <div class="visite github-btn black-btn"><a href="#" class="txt-githup">followe</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- End Social Meadi Stats -->
                    </div>

                    <!-- Start Display Projects -->
                    <div class="show-projects p-20 box-sh-op10-clwh m-20">
                        <h2 class="mt-0">Projects</h2>
                        <div class="responsive-table">
                            <table class="w-fu fs-15">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Finsh Date</td>
                                        <td>Clinet</td>
                                        <td>Cost</td>
                                        <td>team</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>

                                <tbody id="tBody">
                                    <tr>
                                        <td>Portal Student</td>
                                        <td>5-9-2010</td>
                                        <td>TTU Universitu</td>
                                        <td>$30000</td>
                                        <td>
                                            <img class="rad-c" src="images/team/team-01.png" alt="">
                                            <img class="rad-c" src="images/team/team-02.png" alt="">
                                            <img class="rad-c" src="images/team/team-03.png" alt="">
                                            <img class="rad-c" src="images/team/team-04.png" alt="">
                                        </td>
                                        <td>Prepared</td>
                                    </tr>
                                    <tr>
                                        <td>Portal Student</td>
                                        <td>5-9-2010</td>
                                        <td>TTU Universitu</td>
                                        <td>$30000</td>
                                        <td>
                                            <img class="rad-c" src="images/team/team-01.png" alt="">
                                            <img class="rad-c" src="images/team/team-02.png" alt="">
                                            <img class="rad-c" src="images/team/team-03.png" alt="">
                                            <img class="rad-c" src="images/team/team-04.png" alt="">
                                        </td>
                                        <td>Prepared</td>
                                    </tr>
                                    <tr>
                                        <td>Portal Student</td>
                                        <td>5-9-2010</td>
                                        <td>TTU Universitu</td>
                                        <td>$30000</td>
                                        <td>
                                            <img class="rad-c" src="images/team/team-01.png" alt="">
                                            <img class="rad-c" src="images/team/team-02.png" alt="">
                                            <img class="rad-c" src="images/team/team-03.png" alt="">
                                            <img class="rad-c" src="images/team/team-04.png" alt="">
                                        </td>
                                        <td>Prepared</td>
                                    </tr>
                                    <tr>
                                        <td>Portal Student</td>
                                        <td>5-9-2010</td>
                                        <td>TTU Universitu</td>
                                        <td>$30000</td>
                                        <td>
                                            <img class="rad-c" src="images/team/team-02.png" alt="">
                                            <img class="rad-c" src="images/team/team-04.png" alt="">
                                            <img class="rad-c" src="images/team/team-03.png" alt="">
                                        </td>
                                        <td>Prepared</td>
                                    </tr>
                                    <tr>
                                        <td>Portal Student</td>
                                        <td>5-9-2010</td>
                                        <td>TTU Universitu</td>
                                        <td>$30000</td>
                                        <td>
                                            <img class="rad-c" src="images/team/team-01.png" alt="">
                                            <img class="rad-c" src="images/team/team-02.png" alt="">
                                            <img class="rad-c" src="images/team/team-03.png" alt="">
                                            <img class="rad-c" src="images/team/team-04.png" alt="">
                                        </td>
                                        <td>Prepared</td>
                                    </tr>
                                    <tr>
                                        <td>Portal Student</td>
                                        <td>5-9-2010</td>
                                        <td>TTU Universitu</td>
                                        <td>$30000</td>
                                        <td>
                                            <img class="rad-c" src="images/team/team-01.png" alt="">
                                            <img class="rad-c" src="images/team/team-02.png" alt="">
                                            <img class="rad-c" src="images/team/team-03.png" alt="">
                                            <img class="rad-c" src="images/team/team-04.png" alt="">
                                        </td>
                                        <td>Prepared</td>
                                    </tr>
                                    <tr>
                                        <td>Portal Student</td>
                                        <td>5-9-2010</td>
                                        <td>TTU Universitu</td>
                                        <td>$30000</td>
                                        <td>
                                            <img class="rad-c" src="images/team/team-01.png" alt="">
                                            <img class="rad-c" src="images/team/team-02.png" alt="">
                                            <img class="rad-c" src="images/team/team-03.png" alt="">
                                            <img class="rad-c" src="images/team/team-04.png" alt="">
                                        </td>
                                        <td>Prepared</td>
                                    </tr>
                                    <tr>
                                        <td>Portal Student</td>
                                        <td>5-9-2010</td>
                                        <td>TTU Universitu</td>
                                        <td>$30000</td>
                                        <td>
                                            <img class="rad-c" src="images/team/team-01.png" alt="">
                                            <img class="rad-c" src="images/team/team-02.png" alt="">
                                            <img class="rad-c" src="images/team/team-03.png" alt="">
                                            <img class="rad-c" src="images/team/team-04.png" alt="">
                                        </td>
                                        <td>Prepared</td>
                                    </tr>
                                    <tr>
                                        <td>Portal Student</td>
                                        <td>5-9-2010</td>
                                        <td>TTU Universitu</td>
                                        <td>$30000</td>
                                        <td>
                                            <img class="rad-c" src="images/team/team-01.png" alt="">
                                            <img class="rad-c" src="images/team/team-02.png" alt="">
                                            <img class="rad-c" src="images/team/team-03.png" alt="">
                                            <img class="rad-c" src="images/team/team-04.png" alt="">
                                        </td>
                                        <td>Prepared</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pointer m-20 center-ele" id="pointer-slide">
                                <span id="previous-btn" class="previous round btn-shape btn-shape-black  btn-shape-cl-w mr-10 inline-block"><i class="fa fa-arrow-left"></i></span>
                                <div class="count-slides flex " id="count-slides">
                                    <!-- Append Using js -->
                                </div>
                                <span id="next-btn" class="next round btn-shape btn-shape-black  btn-shape-cl-w ml-10"><i class="fa fa-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Display Projects -->
                </div>
            <!-- End Content -->
        </div>
        <!-- End Main Page  -->


    <?php
}



// Controller Part


    if (Sessions::IfSetSession() && Sessions::IfSetSessionDepValue('IdUser')) {
        $permission = Queries::FromTable('permission', 'users', "WHERE IdUser = " . Sessions::GetValueSessionDepKey('IdUser'), 'fetch')['permission'];

        if ($permission  == 1) {
            Page();
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