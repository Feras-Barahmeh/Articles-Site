<?php
// Header Configration
    ob_start();
    session_start();
    $TITLE =  isset($_SESSION) && !empty($_SESSION) ? $_SESSION['user'] : "Undefined";
    $AllWidth = "null"; // To Set Width Nav 100%
    include ("init.php");

// Main Structers


    function MainStructer () {
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
                            <li class="active"><a href="#"><i class="fa-solid fa-gear"></i><span>Global Info</span></a></li>
                            <li><a href="#"><i class="fa-solid fa-gear"></i><span>Account</span></a></li>
                            <li><a href="#"><i class="fa-solid fa-bell"></i><span>Notification</span></a></li>

                        </ul>
                    </div>
                    <div class="section-edit">
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
                                                    <div class="">
                                                        <input 
                                                        type="text" 
                                                        name="name" 
                                                        value="<?php echo isset($user['fullName']) ? $user['fullName'] : "Your Full Name" ?>" 
                                                        class="snippet-input" 
                                                        placeholder="Name">
                                                        <div class="btns"><button class="save" name="save-edit" id="save-edit">Save</button><button class="cancel" id="cancel">Cancel</button></div>
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
                                                <span class="containt-reg-db"><?php echo $user['gender'] == "m" ? "Mael" : "Femal" ?></span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <select name="" id="" class="snippet-input">
                                                            <option value="<?php echo isset($user['gender']) && $user['gender'] == "m" ? "Mael" : "Femal" ?>"><?php echo $user['gender'] == "m" ? "Mael" : "Femal" ?></option>
                                                            <option value="m">Mael</option>
                                                            <option value="f">Femal</option>
                                                        </select>
                                                        <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                    <div class="">
                                                        <input type="text" name="" value="<?php echo isset($user['location']) ? $user['location'] : "City - Country"  ?>" class="snippet-input" placeholder="Location">
                                                        <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                    <div class="">
                                                        <input type="date" name="" value="<?php echo isset($user['age']) ? $user['age'] : "Your Barthday"  ?>" class="snippet-input" placeholder="Birthday">
                                                        <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                    <div class="">
                                                        <textarea name="" id=""  placeholder="Brief" cols="50" rows="5"><?php echo isset($user['aboutYou']) ? $user['aboutYou'] : "Brief To You"  ?></textarea>
                                                        <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                    <div class="">
                                                        <input type="text" name=""
                                                                value=""
                                                                class="snippet-input"
                                                                placeholder="<?php if ( ! isset($user['website']) ) echo  "Yore Site | Bloge" ?>">
                                                        <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                    <div class="">
                                                        <input type="text" name="" value="<?php if ( isset($user['githup']) ) echo  $user['githup']; ?>" class="snippet-input" placeholder="Githup">
                                                        <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                    <div class="">
                                                        <input type="text" name="" value="<?php if ( isset($user['twitter']) ) echo  $user['twitter']; ?>" class="snippet-input" placeholder="Twitter">
                                                        <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                    <div class="">
                                                        <input 
                                                        type="text" 
                                                        name="" 
                                                        value="<?php echo isset($user['linkedin']) ?  $user['linkedin'] : "Your Linkedin Account" ?>" 
                                                        class="snippet-input"
                                                        placeholder="Linkedin">
                                                        <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                        <div class="">
                                                            <input 
                                                            type="text" 
                                                            name="" value="<?php echo isset($user['education']) ?  $user['education'] : "Education" ?>" 
                                                            class="snippet-input" 
                                                            placeholder="Education">
                                                            <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                        <div class="">
                                                            <input type="text" name="" value="" class="snippet-input" placeholder="Work">
                                                            <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                                                <span class="containt-reg-db">skills</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="" id="">
                                                        <div id="tag-contanier">
                                                            <input type="text" name="" value="" id="skills" class="snippet-input input-shills" placeholder="skills">
                                                        </div>
                                                        <div class="btns"><span class="save">Save</span><span class="cancel">Cancel</span></div>
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
                </section>
            </div>
        <?php
    }

// Controller 
    MainStructer();

// Footer Configration
    include ($tpl . "footer.php");
    ?>
        <script src="layout/js/editprofile.js"></script>
    <?php
    ob_end_flush();