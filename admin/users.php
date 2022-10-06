<?php

// Start Gloabal Difination

    ob_start();
    session_start();
    $TITLE = 'users';
    include ('init.php');

    // Users
    include($FunUsers . 'user.php');
    include($FunUsers . 'queries.php');

// Stasrt Fork Functions

class EditInfoUser {

    public static function PrintLangs() {
        $handelFile = fopen("../commonBetweenBackFront/textfiles/lang.txt", 'r');
        $firstLine =   fgets($handelFile);

        fseek($handelFile, mb_strlen($firstLine . "\r\n", "8bit")-1); // Set Curcer in secound line

        $lines =  fread($handelFile, 1024); // Read All Lines in File

        $langs = explode("-", $lines);

        foreach($langs as $lang) {
        ?>
            <input type="checkbox" value="<?php echo $lang ?>" for="langs" name="langs[]" ><?php echo $lang ?></input>
        <?php }

    }

    public static function StructerEdit() {
        global $commfilesuploaded;
        $id = GetRequests::GetValueGet('IdUser');
        $values = Queries::FromTable('*', 'users', 'WHERE IdUser = ' .  $id, 'fetch');
        ?>
            <div class="img-user">
                <?php ShowImage::SetImg($commfilesuploaded . 'users//', NameImag::GetNameImgFromDB('imageName', 'users', "WHERE IdUser = " . GetRequests::GetValueGet("IdUser"))); ?>
            </div>

            <div class="contanier-form">
                <h3 class="h-title">Edit Profile</h3>
                <form id="edit-form" action="users.php?actionMember=edit&IdUser=<?php echo $id ?>&update" method="POST" class="form-edit" enctype="multipart/form-data">
                    <!-- Start User name -->
                        <div class="input-box">
                            <input type="text" name="userName" id="userName" value="<?php echo $values['userName'] ?>" class="input" autocomplete="off">
                            <label for="userName" class="label">user name</label>
                        </div>

                    <!-- password -->
                        <div class="input-box">
                            <input type="password" name="password" id="password" class="input" autocomplete="off">
                            <label for="password" class="label">password</label>
                        </div>
                    
                    <!-- Registerd Password -->
                        <div class="input-box" style="display: none;">
                            <input type="hidden" name="registerdPass" id="" value="<?php echo $values['password'] ?>" class="" autocomplete="off">
                        </div>

                    <!-- Email -->
                        <div class="input-box">
                            <input type="email" name="email" id="email" value="<?php echo $values['email'] ?>" class="input" autocomplete="off">
                            <label for="email" class="label">Email</label>
                        </div>

                    <!-- Longuage -->
                        <div class="input-box">
                            <input type="text" name="langs" id="langs" value="<?php echo $values['langs'] ?>" class="input" autocomplete="off">
                            <label for="langs" class="label">Longuage</label>
                        </div>

                    <!-- Tools -->
                        <div class="input-box">
                            <input type="text" name="tools" id="tools" value="<?php echo $values['tools'] ?>" class="input" autocomplete="off">
                            <label for="tools" class="label">Tools</label>
                        </div>

                    <!-- Image -->
                        <div class="input-box" >
                            <input type="file" name="imageName" class="input">
                        </div>

                    <!-- Full Name -->
                        <div class="input-box">
                            <input type="text" name="fullName" id="fullName" value="<?php echo $values['fullName'] ?>" class="input" autocomplete="off">
                            <label for="fullName" class="label">Full Name</label>
                        </div>

                    <!-- Age -->
                        <div class="input-box">
                            <input type="text" name="age" id="age" value="<?php echo $values['age'] ?>" class="input" autocomplete="off">
                            <label for="age" class="label">Age</label>
                        </div>

                    <!-- Permission -->
                        <div class="input-box">
                            <select name="permission" id="permission" class="select" required>
                                <option value="<?php echo $values['permission'] ?>">Same permission</option>
                                <option value="0">Member</option>
                                <option value="1">Admin</option>
                                <option value="2">Programer</option>
                            </select>
                        </div>

                    <!-- About You -->
                        <div class="input-box">
                            <textarea name="aboutYou" cols="36" rows="3" class="input"><?php echo $values['aboutYou'] ?></textarea>
                            <label for="aboutYou" class="label SpecialCase-label">About You</label>
                        </div>

                        <!-- Add Languages -->
                        <!-- <div class="input-box">
                            <div class="langs-tag">
                                <div class="content-langs">
                                    <ul id="langs-tage">
                                        <li>HtmL <i class="fa-sharp fa-solid fa-xmark"></i></li>
                                        <li>PHP <i class="fa-sharp fa-solid fa-xmark"></i></li>
                                        <li>cpp <i class="fa-sharp fa-solid fa-xmark"></i></li>
                                        <li>python <i class="fa-sharp fa-solid fa-xmark"></i></li>
                                        <input type="text" id="search-lang-tags" placeholder="search language">
                                    </ul>
                                </div>
                                <div class="detiles">
                                    <span>10 Language</span>
                                    <div class="btns"> <button id="add-lang" >Add</button> <button>Remove All</button></div>
                                </div>
                            </div>
                            <label for="langs" class="label">Longuage</label>
                        </div> -->

                    <!-- Submit Form -->
                    <input type="submit" name="submit" value="Save" class="btn-submit SpecialCase-btn-submit">
                </form>
            </div>
        <?php
    }


    public static function PrepareToEdit() {
        if ( IfChangs::ChangesFaild() ) {
            Update::Update();
        } 
    }
}

function controllerInsert() {
    $info = Users::Post();

    if(ValidationInputInsert::IfValid()) {

        if (! Queries::IfExsist('userName', 'users', $info['userName'])) {
            Insert::Insert();
        } else {
            GlobalFunctions::AlertMassage('This User Is Exist Alrasdy');
            GlobalFunctions::SitBackBtn();
        }
    }
}

function ControlleUpdate() {
    if (PostRequests::IfPOST()) {
        EditInfoUser::PrepareToEdit();

    } else {
        GlobalFunctions::AlertMassage("Can't Enter This Page Directry");
        
    }
}

function WhoShowed () {
    $WantShow = GetRequests::GetValueGet('show');
    $data = null;
    if ($WantShow  === "users")
        $data = Queries::FromTable("*", 'users', "WHERE permission = 0", 'fetchAll', 'IdUser');
    else if ($WantShow === 'admins')
        $data = Queries::FromTable("*", 'users', "WHERE permission = 1");
    else if ($WantShow === 'prog')
        $data = Queries::FromTable("*", 'users', "WHERE permission = 2");
    return $data;
}
function SetColoumByPermistionHeader() {
    $currentShowUser = GetRequests::GetValueGet("show");
    $permitiomUser = Queries::FromTable("permission", "users", "WHERE IdUser = " . $_SESSION["IdUser"], "fetch")["permission"];
    
    // Set All Permition to admin (Leader)
    if ($permitiomUser === 1 ) {
        ?>
            <td>Options</td>
            <td>password</td>
        <?php
    }

    if ($permitiomUser === 2 && $currentShowUser === "users") {
        ?>
            <td>Options</td>
            <td>password</td>
        <?php
    }

}
function SetColoumByPermistionTbody($info) {
    $currentShowUser = GetRequests::GetValueGet("show");
    $permitiomUser = Queries::FromTable("permission", "users", "WHERE IdUser = " . $_SESSION["IdUser"], "fetch")["permission"];
    

    // Set All Permition to admin (Leader)
    if ($permitiomUser === 1 ) {
        ?>
            <td>
                <a href="users.php?actionMember=edit&IdUser=<?php echo $info['IdUser'] ?>" class="process-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                <span class="process-btn"
                onclick="return confirem('Delete Article', 'Are you sure deleted', `users.php?show=<?php echo GetRequests::GetValueGet('show') ?>&IdUser=<?php echo $info['IdUser'] ?>&delete`)" ><i class="fa-solid fa-trash-can"></i></span>
            </td>
            <td class="long-text"><?php echo $info['password'] ?></td>
        <?php
    }

    // Get Permitions Col-leader To Users just
    if ($permitiomUser === 2 && $currentShowUser === "users") {
        ?>
            <td>
                <a href="users.php?actionMember=edit&IdUser=<?php echo $info['IdUser'] ?>" class="process-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                <span class="process-btn"
                onclick="return confirem('Delete Article', 'Are you sure deleted', `users.php?show=<?php echo GetRequests::GetValueGet('show') ?>&IdUser=<?php echo $info['IdUser'] ?>&delete`)" ><i class="fa-solid fa-trash-can"></i></span>
            </td>
            <td class="long-text"><?php echo $info['password'] ?></td>
        <?php
    }
}
function SetNamePermission($permission) {
    if ($permission === 1) {
        echo "Leader";
    } elseif ($permission === 2) {
        echo "Co-Leader";
    } else {
        echo "Member";
    }
}
function PrintDataUser() {
    $data = WhoShowed();
    global $commfilesuploaded;

    foreach ($data as $info) {
        ?>
            <tr>
                <td><?php echo $info['IdUser'] ?></td>
                <td class=""><?php ShowImage::SetImg($commfilesuploaded. 'users/', $info['imageName'], "vs-img") ?></td>
                <td><?php echo $info['userName'] ?></td>
                <td><?php echo $info['email'] ?></td>
                <td><?php echo $info['aboutYou'] ?></td>
                <td><?php SetNamePermission($info['permission']) ?></td>
                <td><?php echo $info['langs'] ?></td>
                <td><?php echo $info['tools'] ?></td>
                <td><?php echo $info['age'] ?></td>
                <td><?php echo $info['dataRegister'] ?></td>
                <?php SetColoumByPermistionTbody($info) ?>
            </tr>
        <?php
    }
}
function IfInsert() {
    if (isset($_POST['submit'])) {
        controllerInsert();
    }
}
function IfUpdate() {
    if (isset($_POST['submit'])) {
        ControlleUpdate();
    }
}
function IfDelete() {
    if ( GetRequests::IfSetValue('delete')) {
        if(Queries::Delete('users', " IdUser = " . GetRequests::GetValueGet('IdUser'))) {
            $showValu = GetRequests::GetValueGet("show");
            header("Location: users.php?show=" . $showValu );
            ?>
                <div id="alert-mass" class="mass success">
                    <div class="content-mass">
                        <p>Success Delete Article</p>
                        <span id="X-success"><i class="fa-solid fa-x"></i></span>
                    </div>
                </div>
            <?php
        } else {
            $showValu = GetRequests::GetValueGet("show");
            header("Location: users.php?show=" . $showValu );
            ?>
                <div id="alert-mass" class="mass danger">
                    <div class="content-mass">
                        <p>unSuccess Delete Article</p>
                        <span id="X-falid"><i class="fa-solid fa-x"></i></span>
                    </div>
                </div>
            <?php
        }
    } 
}

function AddStructure() {
    ?>
        <div class="contanier-form">
            <h1 class="h-title">Add User</h1>
            <form action="users.php?actionMember=add&insert" method="POST" class="form" enctype="multipart/form-data">
                <!-- User Name -->
                    <div class="input-box">
                        <input type="text" name="userName" id="userName" class="input" required="" autocomplete="off">
                        <label for="userName" class="label">User Name</label>
                    </div>

                <!-- Password -->
                    <div class="input-box">
                        <input type="password" name="password" id="password"  class="input" required="" autocomplete="off">
                        <label for="password" class="label">password</label>
                    </div>

                <!-- Email -->
                    <div class="input-box">
                        <input type="email" name="email" id="email"  class="input" required="" autocomplete="off">
                        <label for="email" class="label">Email</label>
                    </div>

                <!-- Full Name -->
                    <div class="input-box">
                        <input type="text" name="fullName" id="fullName"  class="input" required="" autocomplete="off">
                        <label for="fullName" class="label">Full Name</label>
                    </div>

                <!-- Pictuer -->
                    <div class="input-box">
                        <input type="file" name="imageName" id="imageName"  class="input" required="" autocomplete="no">
                    </div>

                <!-- Start permission -->
                    <div class="input-box">
                        <select name="permission" id="permission" class="select" required="" autocomplete="off">
                            <option value="0">Member</option>
                            <option value="1">Admin</option>
                            <option value="2">Programer</option>
                        </select>
                    </div>
                <input type="submit" name="submit" value="Add member" class="btn-shape">
            </form>
        </div>
    <?php
}

// End Fork Fucntions

// Main Function 
function StructerPage() {
    ?>
        <div class="dashbord flex">
            <?php AsideHeaderStructer() ?>
            <h2 class="title p-20">Users</h2>
            <div class="content-page">

                <header class="additions relative between-ele p-20">
                        <div class="input-search-contanier relative">
                            <i class="fa fa-magnifying-glass search-icon"></i>
                            <input type="search" name="" id="" class="search-input" placeholder="search User">
                        </div>
                        <button class="users-statistics relative" id="users-statistics">
                            <span class="angels">Statistics <i class="fa fa-angle-down ml-5 show"></i> <i class="fa fa-angle-up ml-5"></i></span>
                            <ul class="links box-sh-op10-clwh relative"> <!-- opacity-low hidden -->
                                <li>
                                    <a href="users.php?show=users" class="header-users-btn">
                                        <div class="number-users add-btn">
                                            <div class="between-ele ptb-5 plr-10 rad-5">
                                                <span class="mr-10"><i class="fa fa-user mr-10"></i> Users: </span> <span class="num"><?php echo  Queries::Counter("IdUser", 'users', "Where permission = 0") ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="users.php?show=admins" class="header-users-btn">
                                        <div class="number-admins add-btn">
                                            <div class="between-ele ptb-5 plr-10 rad-5">
                                                <span class="mr-10"><i class="fa-solid fa-lock mr-10"></i> Admins: </span> <span class="num"><?php echo  Queries::Counter("IdUser", 'users', "Where permission = 1") ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="users.php?show=prog" class="header-users-btn">
                                        <div class="number-admins add-btn">
                                            <div class="betweem-ele ptb-5 plr-10 rad-5">
                                                <span class="mr-10"><i class="fa-solid fa-laptop mr-10"></i>Programmers: </span> <span class="num"><?php echo  Queries::Counter("IdUser", 'users', "Where permission = 2") ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="users.php?actionMember=add" class="header-users-btn cursor-pointer ptb-5 plr-10 rad-5"><i class="fa-solid fa-plus mr-10"></i>Add member</a>
                                </li>
                            </ul>
                        </button>

                </header>
                
                <!-- Start Display Projects -->
                <div class="show-projects p-20 box-sh-op10-clwh m-20">
                    <h2 class="mt-0">Users</h2>
                    <div class="responsive-table">
                        <table class="w-fu fs-15">
                            <thead>
                                <tr>
                                    <td class="cursor-pointer">ID</td>
                                    <td class="cursor-pointer">image</td>
                                    <td class="cursor-pointer">User Name</td>
                                    <td class="cursor-pointer">email</td>
                                    <td class="cursor-pointer">aboutYou</td>
                                    <td class="cursor-pointer">permission</td>
                                    <td class="cursor-pointer">langs</td>
                                    <td class="cursor-pointer">tools</td>
                                    <td class="cursor-pointer">age</td>
                                    <td class="cursor-pointer">dataRegister</td>
                                    <!-- Options Password -->
                                    <?php SetColoumByPermistionHeader() ?>
                                </tr>
                            </thead>

                            <tbody id="tBody">
                                <?php PrintDataUser() ?>
                            </tbody>
                        </table>
                        <div class="pointer partition-table-bar m-20 center-ele" id="pointer-slide">
                            <span id="previous-btn" class="previous round btn-shape btn-shape-black  btn-shape-cl-w mr-10 inline-block"><i class="fa fa-arrow-left"></i></span>
                            <div class="count-slides flex " id="count-slides">
                                <!-- Append Using js -->
                            </div>
                            <span id="next-btn" class="next round btn-shape btn-shape-black  btn-shape-cl-w ml-10"><i class="fa fa-arrow-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 
}


// Start controlled Function
    function ControlledFunction() {
        switch (GetRequests::GetValueGet('actionMember')) {

            case 'add':
                AddStructure();
                IfInsert();
                break;

            case 'edit':
                EditInfoUser::StructerEdit();
                IfUpdate();
                break;

            default:
                IfDelete();
                StructerPage();
                break;
        }
    }


// Root file
    ControlledFunction();
    include ($tpl . 'footer.php');
    ?>
        <script type="text/javascript" src="layout/users.js"></script>
    <?php 
    ob_end_flush();