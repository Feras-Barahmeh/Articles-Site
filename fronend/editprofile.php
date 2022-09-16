<?php
// Header Configration
    ob_start();
    session_start();
    $TITLE =  isset($_SESSION) && !empty($_SESSION) ? $_SESSION['user'] : "Undefined";
    $AllWidth = "null"; // To Set Width Nav 100%
    include ("init.php");

// Main Structers

    function PrintSkilles($userTools) {
        $userTools = explode(",", $userTools);
        if ( ! empty($userTools)) {
            foreach ($userTools as $userTool) {
                ?>
                    <div class="tag"><span><?php echo $userTool ?></span><i class="fa fa-xmark" data-tag="<?php echo $userTool ?>"></i></div>
                <?php
            }
        } 
    }

    function showSkiles($tools) {
        $tools = explode(",", $tools);
        if ( ! empty($tools)) {
            foreach ($tools as $tool) {
                ?>
                    <div class="tag"><span><?php echo $tool ?></span></div>
                <?php
            }
        }  else {
            echo "Skiles";
        }
    }

    function basicInfoStructer($user) {
        ?>
            <div class="cont-type-edit" id="global-info-section">
                <!-- Start Basic Info -->
                    <div class="basic-info">
                        <h4 class="title">Basic Info</h4>
                        <!-- Start Name -->
                            <div class="contanier-feild">
                                <div class="row-feild">
                                    <div class="name-feild">Name</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php echo isset($user['fullName']) ? $user['fullName'] : "Your Full Name" ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <input
                                                type="text" 
                                                name="fullName" 
                                                value="<?php echo isset($user['fullName']) ? $user['fullName'] : "" ?>" 
                                                class="snippet-input" 
                                                placeholder="Your Full Name">
                                                <div class="error-mas hidden"></div>
                                                <div class="btns"><button class="save" name="save-edit" id="save-edit" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</button><button class="cancel" id="cancel">Cancel</button></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End name -->

                        <!-- Start Gender -->
                            <div class="contanier-feild">
                                
                                <div class="row-feild">
                                    <div class="name-feild">Gender</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php echo $user['gender'] == "male" ? "male" : "Female" ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <select name="gender" id="" class="snippet-input">
                                                    <option value="<?php echo isset($user['gender']) && $user['gender'] == "male" ? "Mael" : "Femal" ?>"><?php echo $user['gender'] == "male" ? "Mael" : "Femal" ?></option>
                                                    <option value="male">Mael</option>
                                                    <option value="female">Femal</option>
                                                </select>
                                                <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End Gender -->

                        <!-- Start Location -->
                            <div class="contanier-feild">
                                
                                <div class="row-feild">
                                    <div class="name-feild">Location</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php echo isset($user['location']) ? $user['location'] : "City - Country"  ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <input type="text" name="location" value="<?php echo isset($user['location']) ? $user['location'] : ""  ?>" class="snippet-input" placeholder="City - Country">
                                                <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End Location -->

                        <!-- Start Birthday -->
                            <div class="contanier-feild">
                                
                                <div class="row-feild">
                                    <div class="name-feild">Birthday</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php echo isset($user['age']) ? $user['age'] : "Your Barthday"  ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <input type="date" name="age" value="<?php echo isset($user['age']) ? $user['age'] : ""  ?>" class="snippet-input" placeholder="Your Barthday">
                                                <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End Birthday -->

                        <!-- Start Brief -->
                            <div class="contanier-feild">
                                
                                <div class="row-feild">
                                    <div class="name-feild">Brief</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php echo isset($user['aboutYou']) ? $user['aboutYou'] : "Brief To You"  ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <textarea name="aboutYou" id=""  placeholder="Brief To You" cols="50" rows="5"><?php echo isset($user['aboutYou']) ? $user['aboutYou'] : ""  ?></textarea>
                                                <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End Brief -->

                        <!-- Start Website -->
                            <div class="contanier-feild">
                                
                                <div class="row-feild">
                                    <div class="name-feild">Website</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php echo isset($user['website']) ? $user['website'] : "Your website | Blog" ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <input 
                                                        type="text" 
                                                        name="website"
                                                        value="<?php echo isset($user['website']) ? $user['website'] : "" ?>"
                                                        class="snippet-input"
                                                        placeholder="Your website | Blog">
                                                <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End Website -->

                        <!-- Start Githup -->
                            <div class="contanier-feild">
                                
                                <div class="row-feild">
                                    <div class="name-feild">Githup</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php if ( isset($user['githup']) ) echo  $user['githup']; ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <input type="text" name="githup" value="<?php if ( isset($user['githup']) ) echo  $user['githup']; ?>" class="snippet-input" placeholder="Your Githup Account">
                                                <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End Githup -->

                        <!-- Start Twitter -->
                            <div class="contanier-feild">
                                
                                <div class="row-feild">
                                    <div class="name-feild">Twitter</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php if ( isset($user['twitter']) ) echo  $user['twitter']; ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <input type="text" name="twitter" 
                                                value="<?php if ( isset($user['twitter']) ) echo  $user['twitter']; ?>" class="snippet-input" placeholder="Your Twitter Account">
                                                <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End Twitter -->

                        <!-- Start Linkedin -->
                            <div class="contanier-feild">
                                
                                <div class="row-feild">
                                    <div class="name-feild">Linkedin</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php echo isset($user['linkedin']) ?  $user['linkedin'] : "Your Linkedin Account" ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <input 
                                                type="text" 
                                                name="linkedin" 
                                                value="<?php echo isset($user['linkedin']) ?  $user['linkedin'] : "" ?>" 
                                                class="snippet-input"
                                                placeholder="Your Linkedin Account">
                                                <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End Linkedin -->
                    </div>
                <!-- End Basic Info -->

                <!-- Start Experience -->
                    <div class="Experience">
                        <h4>Experience</h4>
                            <!-- Start Education -->
                                <div class="contanier-feild">
                                    <div class="row-feild">
                                        <div class="name-feild">Education</div>
                                        <div class="content-feild">
                                            <span class="containt-reg-db"><?php echo isset($user['education']) ?  $user['education'] : "Education" ?></span>
                                            <!-- Start input Feils -->
                                            <div class="contanier-proccess hidden">
                                                <div class="contanier-input">
                                                    <textarea name="education" id="" cols="50" rows="5" placeholder="Education"><?php echo isset($user['education']) ?  $user['education'] : "" ?></textarea>
                                                    <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                                </div>
                                            </div>
                                            <!-- End Input Feils -->
                                        </div>
                                        <span class="editbtn">Edit</span>
                                    </div>
                                </div>
                        <!-- End Education -->

                        <!-- Start Work -->
                                <div class="contanier-feild">
                                    <div class="row-feild">
                                        <div class="name-feild">Work</div>
                                        <div class="content-feild">
                                            <span class=""><?php echo isset($user['work']) ?  $user['work'] : "Work At" ?></span>
                                            <!-- Start input Feils -->
                                            <div class="contanier-proccess hidden">
                                                <div class="contanier-input">
                                                    <!-- <input type="text" name="work" value="" class="snippet-input" placeholder="Work"> -->
                                                    <textarea name="work" class="" placeholder="Work" id="" cols="50" rows="5"><?php echo $user["work"] ?></textarea>
                                                    <div class="btns"><span class="save" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                                </div>
                                            </div>
                                            <!-- End Input Feils -->
                                        </div>
                                        <span class="editbtn">Edit</span>
                                    </div>
                                </div>
                        <!-- End Work -->
                    </div>
                <!-- End Experience -->

                <!-- Start Technical Skilles -->
                    <div class="technical-skills">
                        <h4>Technical Skills</h4>

                        <!-- Start skills -->
                            <div class="contanier-feild">
                                <div class="row-feild">
                                    <div class="name-feild">skills</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db" id="show-skilles-user"><?php showSkiles($user["tools"]) ?></span>
                                        <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input" id="">
                                                <div id="tag-contanier">
                                                    <?php PrintSkilles($user["tools"]) ?>
                                                    <input type="text" name="tools" value="" id="skills" class="snippet-input input-shills" placeholder="skills">
                                                    <div class="hidden" id="regist-val"><?php echo $user['tools'] ?></div>
                                                    <div class="error-mas hidden">Not Founded Technical</div>
                                                </div>
                                                <div class="btns"><span class="save-skille" id="save-skilles" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</span><span class="cancel">Cancel</span></div>
                                            </div>
                                        </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End skills -->
                    </div>
                <!-- End Technical Skilles -->
            </div>
        <?php
    }

    function  account($user) {
        ?>
            <div class="cont-type-edit hidden" id="account-section">
                <div class="account-info">
                    <h4>Account Information</h4>
                    <!-- Start User Name  -->
                        <div class="contanier-feild">
                            <div class="row-feild">
                                <div class="name-feild">userName</div>
                                <div class="content-feild">
                                    <span class="containt-reg-db"><?php echo $user['userName'] ?></span>
                                    <!-- Start input Feils -->
                                        <div class="contanier-proccess hidden">
                                            <div class="contanier-input">
                                                <input
                                                    type="text"
                                                    name="userName"
                                                    value="<?php echo $user['userName'] ?>"
                                                    class="snippet-input"
                                                    placeholder="username">
                                                <div class="error-mas hidden"></div>
                                                <div class="btns"><button class="save" name="save-edit" id="save-edit" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</button><button class="cancel" id="cancel">Cancel</button></div>
                                            </div>
                                        </div>
                                    <!-- End input Feils -->
                                </div>
                                <span class="editbtn">Edit</span>
                            </div>
                        </div>
                    <!-- End user Name -->

                    <!-- Start Email -->
                        <div class="contanier-feild">
                                <div class="row-feild">
                                    <div class="name-feild">Email</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php echo $user['email'] ?> <span class="privet">Privet</span></span>
                                        <!-- Start input Feils -->
                                            <div class="contanier-proccess hidden">
                                                <div class="contanier-input">
                                                    <input
                                                        type="text"
                                                        name="email"
                                                        value="<?php echo $user['email'] ?>"
                                                        class="snippet-input"
                                                        placeholder="Email">
                                                    <div class="error-mas hidden"></div>
                                                    <div class="btns"><button class="save" name="save-edit" id="save-edit" user-id = "<?php echo $_SESSION['IdUser'] ?>">Update</button><button class="cancel" id="cancel">Cancel</button></div>
                                                </div>
                                            </div>
                                        <!-- End input Feils -->
                                    </div>
                                    <span class="editbtn">Edit</span>
                                </div>
                            </div>
                        <!-- End Email -->

                    <!-- Start password -->
                        <div class="contanier-feild">
                                <div class="row-feild">
                                    <div class="name-feild">Password</div>
                                    <div class="content-feild">
                                        <a href="editpass.php" class="change-pass"><i class="fa-solid fa-pen-to-square"></i><span>Change Password</span></a>
                                    </div>
                                </div>
                            </div>
                        <!-- End password -->
                </div>

                <!-- Start Theam Account -->
                    <div class="theam-account">
                        <h4>Theam Account</h4>
                        <div class="contanier-feild">
                            <div class="row-feild">
                                <div class="name-feild">Theam</div>
                                <div class="content-feild theams">
                                    <span class="type-theam dark" id="dark"><i class="fa fa-moon"></i><span >Dark</span></span>
                                    <span class="type-theam light" id="light"><i class="fa fa-sun"></i><span >Light</span></span>
                                </div>
                            </div>
                        </div>

                    </div>
                <!-- End Theam Account -->

            </div>
        <?php
    }

    function globalInfo () {
        $user = Queries::FromTable("*", "users", "WHERE IdUser = {$_SESSION['IdUser']}", "fetch");
        ?>
            <div class="container-page">
                <div class="layout">
                    <div class="opacuty"></div>
                    <?php ShowImage::SetImg(
                                "../../commonBetweenBackFront/uploaded/users/", 
                                Queries::FromTable("imageName", "users", "WHERE IdUser = {$_SESSION['IdUser']}", "fetch")['imageName'],
                                "profile-pictuer"); 
                    ?>
                    <div class="name">
                        <div class="name-user"><?php echo $user['fullName'] ?></div>
                        <div class="id-user"><span class="title">ID user : </span> <span><?php echo $user['userName'] ?></span> </div>
                    </div>
                </div>

                <section class="container edit-section">
                    <div class="side-section-edit">
                        <ul class="sidebar">
                            <li id="global-info"    class="active level-edit" ><i class="fa-solid fa-microphone"></i><span>Global Info</span></li>
                            <li id="account"        class="level-edit"><i class="fa-solid fa-gear"></i><span>Account</span></li>
                            <!-- <li id="notification"   class="level-edit"><i class="fa-solid fa-bell"></i><span>Notification</span></li> -->
                        </ul>
                    </div>

                    <!-- Start Basic Info -->
                        <?php basicInfoStructer($user) ?>
                    <!-- End Basic Info -->

                    <!-- Start Acount Section  -->
                        <?php account($user) ?>
                    <!-- End Account Section -->
                </section>
            </div>
        <?php
    }

// Controller 
    globalInfo();

// Footer Configration
    include ($tpl . "footer.php");
    ?>
        <script src="layout/js/editprofile.js"></script>
    <?php
    ob_end_flush();