<?php

// Start Gloabal Difination

use function PHPSTORM_META\map;

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
    private static function IfNull($var, $alliesText) {
        if (empty($var)) {
            echo $alliesText;
        } else {
            echo $var;
        }
    }
    private static function PrintTechnicals () {
        $techs = self::GetTechnicals();
        foreach ($techs as $tech) {
            ?>
                <option id="skile-name" value="<?php echo $tech ?>"><?php echo $tech ?></option>
            <?php
        }

    }
    private static function GetTechnicals () {
        $handelFile = fopen("../commonBetweenBackFront/textfiles/technical.txt", "r");

        // Get First Line
        $firstLine = fgets($handelFile);
        
        // Set cursore after first line
        fseek($handelFile, mb_strlen($firstLine . "\r\n", "8bit") - 1);

        // Read Lines
        $lines = fread($handelFile, 1024);

        // Split - from technials
        $tech = explode('-', $lines);

        return $tech;

    }
    protected static function BasicInformation($user) {
        $idUser = GetRequests::GetValueGet("IdUser");
        ?>
                <!-- Start Basic Info -->
                    <div class="basic-info mt-20">
                        <h3 class="title">Basic Info</h3>
                        <!-- Start Name -->
                            <div class="contanier-feild mtb-15 p-10 rad-5">
                                <div class="row-feild flex">
                                    <div class="name-feild">Name</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php echo $user['fullName'] ?></span>
                                        <!-- Start input Feils -->
                                            <div class="contanier-proccess kick-out">
                                                <div class="contanier-input">
                                                    <input
                                                    value="<?php echo $user['fullName'] ?>"
                                                    name-col-db="fullName"
                                                    id_user="<?php echo $idUser ?>"
                                                    type="text"
                                                    class="snippet-input"
                                                    placeholder="Your Full Name">
                                                    <div class="error-mas kick-out"></div>
                                                    <div class="btns">
                                                            <button class="save" name="save-edit" id="save-edit">Update</button>
                                                            <button class="cancel" id="cancel">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="edit-btn">Edit</span>
                                </div>
                            </div>
                        <!-- End name -->

                        <!-- Start Gender -->
                            <div class="contanier-feild mtb-15 p-10 rad-5">
                                <div class="row-feild flex">
                                    <div class="name-feild">Gender</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><?php self::IfNull( $user["gender"], "Your gender" ) ?></span>
                                        <!-- Start input Feils -->
                                            <div class="contanier-proccess kick-out">
                                                <div class="contanier-input">
                                                    <select 
                                                            name-col-db="gender"
                                                            id_user="<?php echo $idUser ?>"
                                                            class="snippet-input">
                                                        <option value="<?php echo $user["gender"] ?>"><?php self::IfNull($user["gender"], "Gender")?></option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>

                                                    <div class="error-mas kick-out"></div>
                                                    <div class="btns">
                                                            <button class="save" name="save-edit" id="save-edit">Update</button>
                                                            <button class="cancel" id="cancel">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="edit-btn">Edit</span>
                                </div>
                            </div>
                        <!-- End Gender -->

                        <!-- Start Location -->
                        <div class="contanier-feild mtb-15 p-10 rad-5">
                            <div class="row-feild flex">
                                <div class="name-feild">Location</div>
                                <div class="content-feild">
                                    <span class="containt-reg-db"><?php self::IfNull($user["location"], "Location") ?></span>
                                    <!-- Start input Feils -->
                                        <div class="contanier-proccess kick-out">
                                            <div class="contanier-input">
                                                <input
                                                    value="<?php echo $user["location"] ?>"
                                                    name-col-db="location"
                                                    id_user="<?php echo $idUser ?>"
                                                    type="text"
                                                    class="snippet-input"
                                                    placeholder="Your Location">
                                                <div class="error-mas kick-out"></div>
                                                <div class="btns">
                                                        <button class="save" name="save-edit" id="save-edit">Update</button>
                                                        <button class="cancel" id="cancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Input Feils -->
                                </div>
                                <span class="edit-btn">Edit</span>
                            </div>
                        </div>
                        <!-- End Location -->

                        <!-- Start Salary -->
                        <div class="contanier-feild mtb-15 p-10 rad-5">
                            <div class="row-feild flex">
                                <div class="name-feild">Salary</div>
                                <div class="content-feild">
                                    <span class="containt-reg-db"><?php self::IfNull($user["salary"], "Salary") ?></span>
                                    <!-- Start input Feils -->
                                        <div class="contanier-proccess kick-out">
                                            <div class="contanier-input">
                                                <input
                                                    value="$<?php echo $user["salary"] ?>"
                                                    name-col-db="salary"
                                                    id_user="<?php echo $idUser ?>"
                                                    type="text"
                                                    class="snippet-input"
                                                    placeholder="$">
                                                <div class="error-mas kick-out"></div>
                                                <div class="btns">
                                                        <button class="save" name="save-edit" id="save-edit">Update</button>
                                                        <button class="cancel" id="cancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Input Feils -->
                                </div>
                                <span class="edit-btn">Edit</span>
                            </div>
                        </div>
                        <!-- End Salary -->

                        <!-- Start Birthday -->
                        <div class="contanier-feild mtb-15 p-10 rad-5">
                            <div class="row-feild flex">
                                <div class="name-feild">Birthday</div>
                                <div class="content-feild">
                                    <span class="containt-reg-db"><?php echo $user["age"] == "0000-00-00" ?  "Brthday" : $user["age"] ?></span>
                                    <!-- Start input Feils -->
                                        <div class="contanier-proccess kick-out">
                                            <div class="contanier-input">
                                                <input
                                                value="<?php echo $user["age"] == "0000-00-00" ?  date("Y-m-d") : $user["age"] ?>"
                                                name-col-db="age"
                                                id_user="<?php echo $idUser ?>"
                                                type="date"
                                                class="snippet-input"
                                                placeholder="Your Birthday">
                                                <div class="error-mas kick-out"></div>
                                                <div class="btns">
                                                        <button class="save" name="save-edit" id="save-edit">Update</button>
                                                        <button class="cancel" id="cancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Input Feils -->
                                </div>
                                <span class="edit-btn">Edit</span>
                            </div>
                        </div>
                        <!-- End Birthday -->

                        <!-- Start Brief -->
                        <div class="contanier-feild mtb-15 p-10 rad-5">
                            <div class="row-feild flex">
                                <div class="name-feild">Brief</div>
                                <div class="content-feild">
                                    <span class="containt-reg-db fs-14"><?php self::IfNull($user["aboutYou"], "Brif to You") ?></span>
                                    <!-- Start input Feils -->
                                        <div class="contanier-proccess kick-out">
                                            <div class="contanier-input">
                                                <textarea
                                                        value="<?php echo $user["aboutYou"] ?>"
                                                        name-col-db="aboutYou"
                                                        id_user="<?php echo $idUser ?>"
                                                        class="snippet-input" ><?php  echo $user["aboutYou"] ?></textarea>
                                                <div class="error-mas kick-out"></div>
                                                <div class="btns">
                                                        <button class="save" name="save-edit" id="save-edit">Update</button>
                                                        <button class="cancel" id="cancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Input Feils -->
                                </div>
                                <span class="edit-btn">Edit</span>
                            </div>
                        </div>
                        <!-- End Brief -->

                        <!-- Start Website -->
                            <div class="contanier-feild mtb-15 p-10 rad-5">
                                <div class="row-feild flex">
                                    <div class="name-feild">Website</div>
                                    <div class="content-feild">
                                        <span class="containt-reg-db"><a href="<?php echo $user["website"] ?>"><?php self::IfNull($user["website"], "Your Site") ?></a></span>
                                        <!-- Start input Feils -->
                                            <div class="contanier-proccess kick-out">
                                                <div class="contanier-input">
                                                    <input
                                                        value="<?php echo $user["website"] ?>"
                                                        name-col-db="website"
                                                        id_user="<?php echo $idUser ?>"
                                                        type="text"
                                                        class="snippet-input"
                                                        placeholder="Your Site">
                                                    <div class="error-mas kick-out"></div>
                                                    <div class="btns">
                                                            <button class="save" name="save-edit" id="save-edit">Update</button>
                                                            <button class="cancel" id="cancel">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- End Input Feils -->
                                    </div>
                                    <span class="edit-btn">Edit</span>
                                </div>
                            </div>
                    <!-- End Website -->

                    <!-- Start Githup -->
                        <div class="contanier-feild mtb-15 p-10 rad-5">
                            <div class="row-feild flex">
                                <div class="name-feild">Githup</div>
                                <div class="content-feild">
                                    <span class="containt-reg-db"><a href="<?php echo $user["githup"] ?>"><?php $val = explode("/", $user["githup"]); self::IfNull(end($val), "Githup Account"); ?></a></span>
                                    <!-- Start input Feils -->
                                        <div class="contanier-proccess kick-out">
                                            <div class="contanier-input">
                                                <input
                                                    value="https://github.com/<?php echo $user["githup"] ?>"
                                                    name-col-db="githup"
                                                    id_user="<?php echo $idUser ?>"
                                                type="text"
                                                class="snippet-input"
                                                placeholder="https://github.com/(GitHup user Name)">
                                                <div class="error-mas kick-out"></div>
                                                <div class="btns">
                                                        <button class="save" name="save-edit" id="save-edit">Update</button>
                                                        <button class="cancel" id="cancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Input Feils -->
                                </div>
                                <span class="edit-btn">Edit</span>
                            </div>
                        </div>
                    <!-- End Githup -->

                    <!-- Start Twitter -->
                        <div class="contanier-feild mtb-15 p-10 rad-5">
                            <div class="row-feild flex">
                                <div class="name-feild">Twitter</div>
                                <div class="content-feild">
                                    <span class="containt-reg-db"><a href="<?php echo $user["twitter"] ?>"><?php $val = explode("/", $user["twitter"]); self::IfNull(end($val), "https://twitter.com/"); ?></a></span>
                                    <!-- Start input Feils -->
                                        <div class="contanier-proccess kick-out">
                                            <div class="contanier-input">
                                                <input
                                                value="https://twitter.com/<?php echo $user["twitter"] ?>"
                                                name-col-db="twitter"
                                                id_user="<?php echo $idUser ?>"
                                                type="text"
                                                class="snippet-input"
                                                placeholder="https://twitter.com/(userName)">
                                                <div class="error-mas kick-out"></div>
                                                <div class="btns">
                                                        <button class="save" name="save-edit" id="save-edit">Update</button>
                                                        <button class="cancel" id="cancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Input Feils -->
                                </div>
                                <span class="edit-btn">Edit</span>
                            </div>
                        </div>
                    <!-- End Twitter -->

                    <!-- Start facebook -->
                        <div class="contanier-feild mtb-15 p-10 rad-5">
                            <div class="row-feild flex">
                                <div class="name-feild">Facebook</div>
                                <div class="content-feild">
                                    <span class="containt-reg-db"><a href="<?php echo $user["facebook"] ?>"><?php $val = explode("/", $user["facebook"]); self::IfNull(end($val), "https://www.facebook.com/"); ?></a></span>
                                    <!-- Start input Feils -->
                                        <div class="contanier-proccess kick-out">
                                            <div class="contanier-input">
                                                <input
                                                value="https://www.facebook.com/<?php echo $user["facebook"] ?>"
                                                name-col-db="facebook"
                                                id_user="<?php echo $idUser ?>"
                                                type="text"
                                                class="snippet-input"
                                                placeholder="https://www.facebook.com/(userName)">
                                                <div class="error-mas kick-out"></div>
                                                <div class="btns">
                                                        <button class="save" name="save-edit" id="save-edit">Update</button>
                                                        <button class="cancel" id="cancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Input Feils -->
                                </div>
                                <span class="edit-btn">Edit</span>
                            </div>
                        </div>
                    <!-- End facebook -->

                    <!-- Start Linkedin -->
                        <div class="contanier-feild mtb-15 p-10 rad-5">
                            <div class="row-feild flex">
                                <div class="name-feild">Linkedin</div>
                                <div class="content-feild">
                                    <span class="containt-reg-db"><a href="<?php echo $user["linkedin"] ?>"><?php $val = explode("/", $user["linkedin"]); self::IfNull(end($val), "https://www.linkedin.com/in/"); ?></a></span>
                                    <!-- Start input Feils -->
                                        <div class="contanier-proccess kick-out">
                                            <div class="contanier-input">
                                                <input
                                                value="https://www.linkedin.com/in/<?php echo $user["linkedin"] ?>"
                                                name-col-db="linkedin"
                                                id_user="<?php echo $idUser ?>"
                                                type="text"
                                                class="snippet-input"
                                                placeholder="Your Full Name">
                                                <div class="error-mas kick-out"></div>
                                                <div class="btns">
                                                        <button class="save" name="save-edit" id="save-edit">Update</button>
                                                        <button class="cancel" id="cancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Input Feils -->
                                </div>
                                <span class="edit-btn">Edit</span>
                            </div>
                        </div>
                    <!-- End Linkedin -->
        <?php
    }
    public static function ExperienceInformation ($values) {
        $idUser = GetRequests::GetValueGet("IdUser");
        ?>
            <div class="experience-info mt-20">
                <h3 class="title">Experience</h3>
                <!-- Start Education -->
                    <div class="contanier-feild mtb-15 p-10 rad-5">
                        <div class="row-feild flex">
                            <div class="name-feild">Education</div>
                            <div class="content-feild">
                                <span class="containt-reg-db"><?php self::IfNull( $values["education"], "Your Education") ?></span>
                                <!-- Start input Feils -->
                                    <div class="contanier-proccess kick-out">
                                        <div class="contanier-input">
                                            <textarea 
                                                    class="snippet-input"
                                                    value="<?php echo $values["education"] ?>"
                                                    placeholder="Your Education"
                                                    name-col-db="education"
                                                    id_user="<?php echo $idUser ?>"><?php echo $values["education"] ?></textarea>
                                            <div class="error-mas kick-out"></div>
                                            <div class="btns">
                                                    <button class="save" name="save-edit" id="save-edit">Update</button>
                                                    <button class="cancel" id="cancel">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Input Feils -->
                            </div>
                            <span class="edit-btn">Edit</span>
                        </div>
                    </div>
                <!-- End Education -->

                <!-- Start Work -->
                    <div class="contanier-feild mtb-15 p-10 rad-5">
                        <div class="row-feild flex">
                            <div class="name-feild">Work</div>
                            <div class="content-feild">
                                <span class="containt-reg-db"><?php self::IfNull( $values["work"], "Work Experience") ?></span>
                                <!-- Start input Feils -->
                                    <div class="contanier-proccess kick-out">
                                        <div class="contanier-input">
                                            <textarea 
                                                class="snippet-input"
                                                name-col-db="work"
                                                value="<?php echo $values["work"] ?>"
                                                id_user="<?php echo $idUser ?>"
                                                placeholder="Work Experience"><?php echo $values["work"] ?></textarea>
                                            <div class="error-mas kick-out"></div>
                                            <div class="btns">
                                                    <button class="save" name="save-edit" id="save-edit">Update</button>
                                                    <button class="cancel" id="cancel">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Input Feils -->
                            </div>
                            <span class="edit-btn">Edit</span>
                        </div>
                    </div>
                <!-- End Work -->
            </div>
        <?php
    }
    private  function GetNameSkiles() {
        $skiles = Queries::FromTable("name_technical", "technicals", "WHERE id_user = " . GetRequests::GetValueGet("IdUser"));
        return $skiles;
    }

    private function PrintSkiles($from="show") {

        $skiles = $this->GetNameSkiles();
        if ($skiles) {
            foreach($skiles as $skile) {
                foreach($skile as $key => $nameSkile) {
                    if (gettype($key) === "string" ) {
                        if ($from == "show") {
                            ?>
                                <div class="skile  mr-15">
                                    <div class="name-skile"><?php echo $nameSkile ?></div>
                                </div>
                            <?php
                        } elseif($from === "edit") {
                            ?>
                                <div class="skile flex f-al-ce mr-15">
                                    <div class="name-skile mr-15"><?php echo $nameSkile ?></div>
                                    <i class="fa fa-xmark" id="remove-skile"></i>
                                </div>
                            <?php
                        }
                    }
                }
            }
        } else {
            echo "No Skiles Yet";
        }

    }

    private function PrintPercentage () {
        $skiles = Queries::FromTable("*", "percentage", "INNER JOIN technicals on percentage.id_skile = technicals.id_technical AND technicals.id_user = " . GetRequests::GetValueGet("IdUser"));
        
        foreach($skiles as $skile) {
            ?>
                <div class="containt-reg-db">
                    <div class="skile mtb-15">
                        <span class="name-skile"><?php echo $skile["name_technical"] ?></span>
                        <input type="range" min="0" max="100" name="" id="percantage-bar" onchange="changePercentage(this   )"  value="<?php echo $skile["value_skile"] ?>">
                        <div class="percentage-container relative red-5">
                            <div class="percentage-circular rad-c center-ele relative"> 
                                <div class="value rad-c relative"><?php echo $skile["value_skile"] ?>%</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }



    public static function TechnicalSkills () {
        $idUser = GetRequests::GetValueGet("IdUser");
        
        ?>
            <div class="technical-skills-info mt-20">
                <h3 class="title">Skiles</h3>
                <!-- Start skills -->
                    <div class="contanier-feild mtb-15 p-10 rad-5">
                        <div class="row-feild flex">
                            <div class="name-feild">skills</div>
                            <div class="content-feild">
                                <div id="current-skiles" class="containt-reg-db flex">
                                    <!-- Show Skiles -->
                                    <?php (new self)->PrintSkiles("show"); ?>
                                </div>
                                <!-- Start input Feils -->
                                    <div class="contanier-proccess kick-out">
                                        <div class="contanier-input">
                                            <div class="contaner-skiels gap-10 f-wrap flex w-fu f-al-ce">
                                                <!-- Print Current Skiles if Exist -->
                                                <?php (new self) -> PrintSkiles("edit") ?>

                                                <input
                                                type="text"
                                                id="technical-input"
                                                class="add-skile-input block mb-15 mt-10"
                                                placeholder="Skiles">
                                            
                                            </div>
                                            <!-- Start Technicals -->
                                            <select name="" id="technical-list" class="hidden mt-15 mb-15 box-sh-op10-clwh">
                                                <option value="NULL" class="cursor-no-drop"><?php echo "Chosse From This Technicals" ?></option>
                                                <?php self::PrintTechnicals() ?>
                                            </select>
                                            <!-- End Technicals -->

                                            <div class="error-mas"></div>
                                            <div class="btns">
                                                    <button class="save" name="save-edit" id="save-edit-skiles" id_user="<?php echo $idUser ?>">Update</button>
                                                    <button class="cancel" id="cancel">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Input Feils -->
                            </div>
                            <span class="edit-btn">Edit</span>
                        </div>
                    </div>
                <!-- End skills -->

                <!-- Start percentage skills -->
                    <!-- <div class="percentage-skills contanier-feild mtb-15 p-10 rad-5">
                            <div class="header between-ele">
                                <div class="name-feild">percentage skills</div>
                                <span class="cursor-pointer" id="edit-percentage-skiles">Edit</span>
                            </div>

                            // Skiles
                            <div class="skiles-percentage kick-out">
                                <?php // (new self)->PrintPercentage() ?>
                                <div class="btns">
                                        <button class="save cursor-pointer" name="save-edit" id="save-percentage-skile">Update</button>
                                        <button class="cancel cursor-pointer" id="cansel-percentage-skile">Cancel</button>
                                </div>
                            </div>
                    </div> -->
                <!-- End percentage skills -->
            </div>
        <?php 
    }

    public static function EditStucter () {
        global $commfilesuploaded;
        $id = GetRequests::GetValueGet('IdUser');
        $values = Queries::FromTable('*', 'users', 'WHERE IdUser = ' .  $id, 'fetch');
        ?>
            <div class="dashbord flex">
                <?php AsideHeaderStructer() ?>
                <h1 class="title p-20"><i class="fa fa-edit mr-15"></i> Edit Profile</h1>
                <header class="layout-edit-profile relative flex p-20">
                    <div class="opacity"></div>
                    <div class="image relative">
                    <?php ShowImage::SetImg($commfilesuploaded . 'users//',
                                NameImag::GetNameImgFromDB('imageName', 'users', "WHERE IdUser = " . GetRequests::GetValueGet("IdUser")), "rad-c"); ?>
                        <div class="change-image"><i class="fa-solid fa-camera fa-lg"></i></div>
                    </div>
                    <div class="name flex sort-col">
                        <span class="name" id="name-user-layout"><?php echo $values["fullName"] ?></span>
                        <span class="id-name"><span>User Name: </span><span ><?php echo $values["userName"] ?></span></span>
                    </div>
                </header>
                <div class="edit-user-structer flex p-20">
                    <aside class="">
                        <ul>
                            <li class="active"><i class="fa-solid fa-microphone mr-15 ml-5"></i> Global Edit</li>
                            <li><i class="fa fa-gear mr-15 ml-5"></i> Advanice Edit</li>
                            <li><i class="fa-solid fa-diagram-project mr-15 ml-5"></i> Add Projects</li>
                        </ul>
                    </aside>
                    <section class="global-edit relative" id="global-info-section">
                        <!-- Start Basic Info -->
                            <?php self::BasicInformation($values) ?>
                        <!-- End Basic Info -->

                        <!-- Start Experience -->
                            <?php self::ExperienceInformation($values) ?>
                        <!-- End Experience -->
                        <!-- Start Technical Skills -->
                            <?php self::TechnicalSkills() ?>
                        <!-- End Technical Skills -->
                    </section>
                </div>
            </div>
        <?php 
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
                <span class="process-btn  cursor-pointer"
                onclick="return confirem('Delete Article', 'Are you sure deleted', `users.php?show=<?php echo GetRequests::GetValueGet('show') ?>&IdUser=<?php echo $info['IdUser'] ?>&delete`)" ><i class="fa-solid fa-trash-can"></i></span>
            </td>
            <td><?php echo $info['password'] ?></td>
        <?php
    }

    // Get Permitions Col-leader To Users just
    if ($permitiomUser === 2 && $currentShowUser === "users") {
        ?>
            <td>
                <a href="users.php?actionMember=edit&IdUser=<?php echo $info['IdUser'] ?>" class="process-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                <span class="process-btn cursor-pointer"
                onclick="return confirem('Delete Article', 'Are you sure deleted', `users.php?show=<?php echo GetRequests::GetValueGet('show') ?>&IdUser=<?php echo $info['IdUser'] ?>&delete`)" ><i class="fa-solid fa-trash-can"></i></span>
            </td>
            <td><?php echo $info['password'] ?></td>
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
                <td><?php ShowImage::SetImg($commfilesuploaded. 'users/', $info['imageName'], "vs-img") ?></td>
                <td user-name="<?php echo $info['userName'] ?>"><?php echo $info['userName'] ?></td>
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
function AddStructer() {
    ?>
        <div class="dashbord flex">
            <?php AsideHeaderStructer() ?>
            <h1 class="title p-20"><i class="fa fa-user mr-15"></i> Add User </h1>
            <div class="form-add-user p-20">
                <form action="users.php?actionMember=add&insert" method="POST" enctype="multipart/form-data">
                    <!-- User Name -->
                        <div class="relative">
                            <i class="fa fa-user"></i>
                            <input type="text" name="userName" id="userName" class="input-add-user" required="" autocomplete="off" placeholder="User Name">
                            <label for="userName" class="label">User Name</label>
                        </div>

                    <!-- Password -->
                        <div class="relative">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" id="password"  class="input-add-user" required="" autocomplete="off" placeholder="password">
                            <label for="password" class="label">password</label>
                        </div>

                    <!-- Email -->
                        <div class="relative">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" id="email"  class="input-add-user" required="" autocomplete="off" placeholder="Email">
                            <label for="email" class="label">Email</label>
                        </div>

                    <!-- Full Name -->
                        <div class="relative">
                            <i class="fa-solid fa-signature"></i>
                            <input type="text" name="fullName" id="fullName"  class="input-add-user" required="" autocomplete="off" placeholder="Full Name">
                            <label for="fullName" class="label">Full Name</label>
                        </div>

                    <!-- Pictuer -->
                        <div class="relative">
                            <i class="fa-solid fa-image-portrait"></i>
                            <input type="file" name="imageName" id="imageName"  class="input-add-user" required="" autocomplete="no">
                        </div>

                    <!-- Start permission -->
                        <div class="relative">
                            <i class="fa-solid fa-ranking-star"></i>
                            <select name="permission" id="permission" class="input-add-user" required="" autocomplete="off" placeholder="Rank">
                                <option value="0">Member</option>
                                <option value="1">Admin</option>
                                <option value="2">Programer</option>
                            </select>
                        </div>
                    <input type="submit" name="submit" value="Add member" class="btn-shape">
                </form>
            </div>
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
                            <input type="search" name="" id="search-id-userName" class="search-input" placeholder="Search User Name">
                        </div>
                        <button class="users-statistics relative" id="users-statistics">
                            <span class="angels">Statistics <i class="fa fa-angle-down ml-5 show"></i> <i class="fa fa-angle-up ml-5"></i></span>
                            <ul class="links box-sh-op10-clwh relative">
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
                                    <td class="cursor-pointer head-table-td">ID</td>
                                    <td class="cursor-pointer head-table-td">image</td>
                                    <td class="cursor-pointer head-table-td">User Name</td>
                                    <td class="cursor-pointer head-table-td">email</td>
                                    <td class="cursor-pointer head-table-td">aboutYou</td>
                                    <td class="cursor-pointer head-table-td">permission</td>
                                    <td class="cursor-pointer head-table-td">langs</td>
                                    <td class="cursor-pointer head-table-td">tools</td>
                                    <td class="cursor-pointer head-table-td">age</td>
                                    <td class="cursor-pointer head-table-td">dataRegister</td>
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
                AddStructer();
                IfInsert();
                break;

            case 'edit':
                EditInfoUser::EditStucter();
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