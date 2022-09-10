<?php
// Header Configration
    ob_start();
    session_start();
    $TITLE =  isset($_SESSION) && !empty($_SESSION) ? $_SESSION['user'] : "Undefined";
    $AllWidth = "null"; // To Set Width Nav 100%
    include ("init.php");


// Main Structers
    function MainStructer () {
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
                        <div class="name-user">Majd Barahmeh</div>
                        <div class="id-user"><span class="title">ID user : </span> <span>majd</span> </div>
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
                                                <span class="containt-reg-db">Feras</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <input type="text" name="" value="" class="snippet-input" placeholder="Name">
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
                                                <span class="containt-reg-db">male</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <select name="" id="" class="snippet-input">
                                                            <option value="">Gender</option>
                                                            <option value="">Mael</option>
                                                            <option value="">Femal</option>
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
                                                <span class="containt-reg-db">Location</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <input type="text" name="" value="" class="snippet-input" placeholder="Location">
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
                                                <span class="containt-reg-db">Birthday</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <input type="text" name="" value="" class="snippet-input" placeholder="Birthday">
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
                                                <span class="containt-reg-db">Brief</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <textarea name="" id=""  placeholder="Brief" cols="50" rows="5"></textarea>
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
                                                <span class="containt-reg-db">Website</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <input type="text" name="" value="" class="snippet-input" placeholder="Website">
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
                                                <span class="containt-reg-db">Githup</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <input type="text" name="" value="" class="snippet-input" placeholder="Githup">
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
                                                <span class="containt-reg-db">Twitter</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <input type="text" name="" value="" class="snippet-input" placeholder="Twitter">
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
                                                <span class="containt-reg-db">Linkedin</span>
                                                <!-- Start input Feils -->
                                                <div class="contanier-proccess hidden">
                                                    <div class="">
                                                        <input type="text" name="" value="" class="snippet-input" placeholder="Linkedin">
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
                                                    <span class="containt-reg-db">Education</span>
                                                    <!-- Start input Feils -->
                                                    <div class="contanier-proccess hidden">
                                                        <div class="">
                                                            <input type="text" name="" value="" class="snippet-input" placeholder="Education">
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
                                                    <span class="">Work</span>
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
                                                    <div class="">
                                                        <input type="text" name="" value="" class="snippet-input input-shills" placeholder="skills">
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