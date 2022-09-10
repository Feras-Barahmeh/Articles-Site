<?php
    ob_start();
    session_start();
    // include_once("fronend//login.php");

    function MetaHTML() {
        ?>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
    }

    function CSSFiles() {
        ?>
            <link rel="stylesheet" href="styels//main.css">
            <!-- <link rel="stylesheet" href="styels//firstTheam.css"  class="alternate-theam"> -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="stylesheet" href="styels//style-switcher.css">
            <!-- Theam Mode -->
            <link rel="stylesheet" href="styels//firstTheam.css" class="alternate-theam" title="color-1" disabled>
            <link rel="stylesheet" href="styels//secoundTheam.css" class="alternate-theam" title="color-2" >
        <?php
    }

    function JSFiles() {
        ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js" referrerpolicy="no-referrer"></script>
            <script src="styels//portfolio.js"></script>
        <?php
    }

    function LoginLisks() {
        ?>
            <li><a href="#"><i class="fa-solid fa-newspaper"></i>Articles</a></li>
            <li><a href="#"><i class="fa-solid fa-address-card"></i>Profile</a></li>
        <?php
    }

    function LoginOrLogoutLink() {
        
        if (isset($_SESSION['user']) && ! empty($_SESSION['user']) ) {
            ?>
                <li><a href="#"><i class="fa-solid fa-newspaper"></i>Articles</a></li>
                <li><a href="fronend//profile.php?user=<?php echo $_SESSION['user'] ?>"><i class="fa-solid fa-address-card"></i>Profile</a></li>
                <li><a href="fronend//logout.php"><i class="fa-sharp fa-solid fa-arrow-right-to-bracket"></i>Logout</a></li>
            <?php
        } else {
            ?>
                <li><a href="fronend//login.php"><i class="fa-sharp fa-solid fa-arrow-right-to-bracket"></i>Login</a></li>
            <?php
        }
    }

    function MainStructer() {
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <?php MetaHTML() ?>

                <title>Feras Barahmeh</title>

                <!-- Css File -->
                    <?php CSSFiles() ?>
            </head>
                <body> <!--  class="dark" -->
                    <!-- ======= Start  Main Contanier -->
                        <div class="main-container">
                            <!-- Aside Start  -->
                                <aside id="aside-index">
                                    <div class="logo">
                                        <a href="#"><span>F</span><span>eras</span></a>
                                    </div>

                                    <!-- Toggel Start -->
                                    <div class="nav-toggeler">
                                        <span></span>
                                    </div>

                                    <nav>
                                        <ul id="index-a">
                                            <li><a href="#home" class="active"><i class="fa-solid fa-house"></i>Home</a></li>
                                            <li><a href="#about"><i class="fa-solid fa-user"></i>About</a></li>
                                            <li><a href="#services"><i class="fa-solid fa-list"></i>Services</a></li>
                                            <li><a href="#portfolio"><i class="fa-solid fa-briefcase"></i>Portfolio</a></li>
                                            <li><a href="#contact"><i class="fa-solid fa-comments"></i>Contact</a></li>
                                            <?php  LoginOrLogoutLink();?>
                                            
                                        </ul>
                                    </nav>
                                </aside>
                            <!-- Aside End  -->

                            <!-- Main Content Start   -->
                                <div class="main-content">
                                    <!-- Start Home -->
                                        <section class="home section" id="home">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="home-info padd-15">
                                                        <h3 class="hello">Hello, my name is <span class="name">Feras Barahmeh</span></h3>
                                                        <h3 class="my-professions">I'm a <span class="typing">Backend Web Develoder</span></h3>
                                                        <p>
                                                            I'm Feras Barahmeh study Intelligent Systems Engineering At Tafila Technical University
                                                            Junior Backend Web Developer. Enthusiastic to Machine Learning, and many more..
                                                        </p>
                                                        <a href="#contact" class="btn hire-me">More About Me</a>
                                                    </div>
                                                    <!-- Me Pictuer -->
                                                    <div class="home-img">
                                                        <img src="images//me2.jpg" alt="My Pictuer">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    <!-- End Home -->

                                    <!-- Start About -->
                                        <section class="about section"  id="about">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="section-title padd-15">
                                                        <h2>About Me</h2>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="about-content padd-15">
                                                        <div class="row">
                                                            <div class="about-text padd-15">
                                                                <h3>I'm Feras Barahmeh and <span>Backend Web Develober</span></h3>
                                                                <p>
                                                                    Intelligent systems engineering student in TTU University, Junior Backend Web Developer. Enthusiastic to Machine Learning
                                                                    Very Good with (Data Structer, Algorithems, OOP) 
                                                                    Very Good Knowledge about ( PHP, Python)
                                                                    Familier with fundamentals (OS, C|C++)
                                                                    Junior Backend web Developer (Native PHP)🌐
                                                                    Apply SOLID Principle in my code
                                                                    I have problem solving skill 
                                                                    Knowledge about Git & Githup
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="personal-info padd-15">
                                                                <div class="row">
                                                                    <div class="info-item padd-15">
                                                                        <p>Birthday: <span>11 June 2002</span></p>
                                                                    </div>
                                                                    <div class="info-item padd-15">
                                                                        <p>Age: <span>20</span></p>
                                                                    </div>
                                                                    <div class="info-item padd-15">
                                                                        <p>Website: <span>www.ferasbarahmeh.com</span></p>
                                                                    </div>
                                                                    <div class="info-item padd-15">
                                                                        <p>Email: <span>f.f.b.feras@gmail.com</span></p>
                                                                    </div>
                                                                    <div class="info-item padd-15">
                                                                        <p>Degree: <span>BE</span></p>
                                                                    </div>
                                                                    <div class="info-item padd-15">
                                                                        <p>Phone: <span>0785102996</span></p>
                                                                    </div>
                                                                    <div class="info-item padd-15">
                                                                        <p>Cuntry: <span>Jordan</span></p>
                                                                    </div>
                                                                    <div class="info-item padd-15">
                                                                        <p>Freelancer: <span>Available</span></p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="buttons padd-15">
                                                                            <a href="#" class="btn">Downlode CV</a>
                                                                            <a href="#contact" class="btn hir-me">Work With Me</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="skilles padd-15">
                                                                <div class="row">
                                                                    <div class="skilles-item padd-15">
                                                                        <h5>CPP</h5>
                                                                        <div class="progress">
                                                                            <div class="progress-in" style="width: 76%;"></div>
                                                                            <div class="skille-percent">80%</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="skilles-item padd-15">
                                                                        <h5>PHP</h5>
                                                                        <div class="progress">
                                                                            <div class="progress-in" style="width: 76%;"></div>
                                                                            <div class="skille-percent">80%</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="skilles-item padd-15">
                                                                        <h5>Python</h5>
                                                                        <div class="progress">
                                                                            <div class="progress-in" style="width: 76%;"></div>
                                                                            <div class="skille-percent">80%</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="skilles-item padd-15">
                                                                        <h5>C</h5>
                                                                        <div class="progress">
                                                                            <div class="progress-in" style="width: 76%;"></div>
                                                                            <div class="skille-percent">80%</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="education padd-15">
                                                                <h3 class="title">Education</h3>
                                                                <div class="row">
                                                                    <div class="timeline-box padd-15">
                                                                        <div class="timeline shadow-dark">
                                                                            <!-- Timeline item -->
                                                                            <div class="timeline-item">
                                                                                <div class="circle-dot"></div>
                                                                                <h3 class="timeline-date">
                                                                                    <i class="fa fa-calendar"></i> 2013 - 2021
                                                                                </h3>
                                                                                <h4 class="timeline-title">Bakend</h4>
                                                                                <p class="timeline-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt expedita, temporibus saepe laboriosam eius cumque beatae exercitationem unde impedit perferendis aliquam non iste harum aut distinctio, omnis, quas sint veniam.</p>
                                                                            </div>
                                                                            <!-- Timeline item -->
                                                                            <div class="timeline-item">
                                                                                <div class="circle-dot"></div>
                                                                                <h3 class="timeline-date">
                                                                                    <i class="fa fa-calendar"></i> 2013 - 2021
                                                                                </h3>
                                                                                <h4 class="timeline-title">Bakend</h4>
                                                                                <p class="timeline-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt expedita, temporibus saepe laboriosam eius cumque beatae exercitationem unde impedit perferendis aliquam non iste harum aut distinctio, omnis, quas sint veniam.</p>
                                                                            </div>
                                                                            <!-- Timeline item -->
                                                                            <div class="timeline-item">
                                                                                <div class="circle-dot"></div>
                                                                                <h3 class="timeline-date">
                                                                                    <i class="fa fa-calendar"></i> 2013 - 2021
                                                                                </h3>
                                                                                <h4 class="timeline-title">Bakend</h4>
                                                                                <p class="timeline-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt expedita, temporibus saepe laboriosam eius cumque beatae exercitationem unde impedit perferendis aliquam non iste harum aut distinctio, omnis, quas sint veniam.</p>
                                                                            </div>
                                                                            <!-- Timeline item -->
                                                                            <div class="timeline-item">
                                                                                <div class="circle-dot"></div>
                                                                                <h3 class="timeline-date">
                                                                                    <i class="fa fa-calendar"></i> 2013 - 2021
                                                                                </h3>
                                                                                <h4 class="timeline-title">Bakend</h4>
                                                                                <p class="timeline-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt expedita, temporibus saepe laboriosam eius cumque beatae exercitationem unde impedit perferendis aliquam non iste harum aut distinctio, omnis, quas sint veniam.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="experience padd-15">
                                                                <h3 class="title">Experience</h3>
                                                                    <div class="row">
                                                                        <div class="timeline-box padd-15">
                                                                            <div class="timeline shadow-dark">
                                                                                <!-- Timeline item -->
                                                                                <div class="timeline-item">
                                                                                    <div class="circle-dot"></div>
                                                                                    <h3 class="timeline-date">
                                                                                        <i class="fa fa-calendar"></i> 2013 - 2021
                                                                                    </h3>
                                                                                    <h4 class="timeline-title">Bakend</h4>
                                                                                    <p class="timeline-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt expedita, temporibus saepe laboriosam eius cumque beatae exercitationem unde impedit perferendis aliquam non iste harum aut distinctio, omnis, quas sint veniam.</p>
                                                                                </div>
                                                                                <!-- Timeline item -->
                                                                                <div class="timeline-item">
                                                                                    <div class="circle-dot"></div>
                                                                                    <h3 class="timeline-date">
                                                                                        <i class="fa fa-calendar"></i> 2013 - 2021
                                                                                    </h3>
                                                                                    <h4 class="timeline-title">Bakend</h4>
                                                                                    <p class="timeline-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt expedita, temporibus saepe laboriosam eius cumque beatae exercitationem unde impedit perferendis aliquam non iste harum aut distinctio, omnis, quas sint veniam.</p>
                                                                                </div>
                                                                                <!-- Timeline item -->
                                                                                <div class="timeline-item">
                                                                                    <div class="circle-dot"></div>
                                                                                    <h3 class="timeline-date">
                                                                                        <i class="fa fa-calendar"></i> 2013 - 2021
                                                                                    </h3>
                                                                                    <h4 class="timeline-title">Bakend</h4>
                                                                                    <p class="timeline-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt expedita, temporibus saepe laboriosam eius cumque beatae exercitationem unde impedit perferendis aliquam non iste harum aut distinctio, omnis, quas sint veniam.</p>
                                                                                </div>
                                                                                <!-- Timeline item -->
                                                                                <div class="timeline-item">
                                                                                    <div class="circle-dot"></div>
                                                                                    <h3 class="timeline-date">
                                                                                        <i class="fa fa-calendar"></i> 2013 - 2021
                                                                                    </h3>
                                                                                    <h4 class="timeline-title">Bakend</h4>
                                                                                    <p class="timeline-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt expedita, temporibus saepe laboriosam eius cumque beatae exercitationem unde impedit perferendis aliquam non iste harum aut distinctio, omnis, quas sint veniam.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    <!-- End ُAbout -->

                                    <!-- Start  Services Section -->
                                    <section class="service section" id="services">
                                        <div class="container">
                                            <div class="row">
                                                <div class="section-title padd-15">
                                                    <h2>Services</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Start Service Item -->
                                                <div class="service-item padd-15">
                                                    <div class="service-item-inner">
                                                        <div class="icon"> <i class="fa fa-mobile-alt"></i> </div>
                                                        <h4>Backend Web Devalober</h4>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ipsum quia facilis.</p>
                                                    </div>
                                                </div>
                                                <!-- End Service Item -->

                                                <!-- Start Service Item -->
                                                <div class="service-item padd-15">
                                                    <div class="service-item-inner">
                                                        <div class="icon"> <i class="fa fa-laptop-code"></i> </div>
                                                        <h4>Backend Web Devalober</h4>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ipsum quia facilis.</p>
                                                    </div>
                                                </div>
                                                <!-- End Service Item -->

                                                <!-- Start Service Item -->
                                                <div class="service-item padd-15">
                                                    <div class="service-item-inner">
                                                        <div class="icon"> <i class="fa fa-palette"></i> </div>
                                                        <h4>Backend Web Devalober</h4>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ipsum quia facilis.</p>
                                                    </div>
                                                </div>
                                                <!-- End Service Item -->

                                                <!-- Start Service Item -->
                                                <div class="service-item padd-15">
                                                    <div class="service-item-inner">
                                                        <div class="icon"> <i class="fa fa-code"></i> </div>
                                                        <h4>Backend Web Devalober</h4>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ipsum quia facilis.</p>
                                                    </div>
                                                </div>
                                                <!-- End Service Item -->

                                                <!-- Start Service Item -->
                                                <div class="service-item padd-15">
                                                    <div class="service-item-inner">
                                                        <div class="icon"> <i class="fa fa-search"></i> </div>
                                                        <h4>Backend Web Devalober</h4>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ipsum quia facilis.</p>
                                                    </div>
                                                </div>
                                                <!-- End Service Item -->

                                                <!-- Start Service Item -->
                                                <div class="service-item padd-15">
                                                    <div class="service-item-inner">
                                                        <div class="icon"> <i class="fa fa-bullhorn"></i> </div>
                                                        <h4>Backend Web Devalober</h4>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ipsum quia facilis.</p>
                                                    </div>
                                                </div>
                                                <!-- End Service Item -->
                                            </div>
                                        </div>
                                    </section>
                                    <!-- End Services Section -->
                                <!-- Start Portfilio -->
                                    <section class="portfolio section" id="portfolio">
                                        <div class="container">
                                            <div class="row">
                                                <div class="section-title padd-15">
                                                    <h2>Projects</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="portfolio-heading padd-15">
                                                    <h2>My Last Projects</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Start portfolio Item -->
                                                <div class="portfolio-item padd-15">
                                                    <div class="portfolio-item-ineer shadow-dark">
                                                        <div class="portfolio-img">
                                                            <img src="images//myportpholo.png" alt="Picter Project">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End portfolio Item -->
                                                <!-- Start portfolio Item -->
                                                <div class="portfolio-item padd-15">
                                                    <div class="portfolio-item-ineer shadow-dark">
                                                        <div class="portfolio-img">
                                                            <img src="images//myportpholo.png" alt="Picter Project">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End portfolio Item -->
                                                <!-- Start portfolio Item -->
                                                <div class="portfolio-item padd-15">
                                                    <div class="portfolio-item-ineer shadow-dark">
                                                        <div class="portfolio-img">
                                                            <img src="images//myportpholo.png" alt="Picter Project">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End portfolio Item -->
                                                <!-- Start portfolio Item -->
                                                <div class="portfolio-item padd-15">
                                                    <div class="portfolio-item-ineer shadow-dark">
                                                        <div class="portfolio-img">
                                                            <img src="images//myportpholo.png" alt="Picter Project">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End portfolio Item -->
                                                <!-- Start portfolio Item -->
                                                <div class="portfolio-item padd-15">
                                                    <div class="portfolio-item-ineer shadow-dark">
                                                        <div class="portfolio-img">
                                                            <img src="images//myportpholo.png" alt="Picter Project">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End portfolio Item -->
                                            </div>
                                        </div>
                                    </section>
                                    <!-- End Portfilio -->

                                    <!-- Start Contact us  -->
                                    <section class="contact section" id="contact">
                                        <div class="contanier">
                                            <div class="row">
                                                <div class="section-title padd-15">
                                                    <h2>Contact Us</h2>
                                                </div>
                                            </div>
                                            <h3 class="contact-title">Have You Any Questions</h3>
                                            <h4 class="contact-sub-title">I'M At Your Services</h4>
                                            <div class="row">
                                                <!-- Start Contact Info Item -->
                                                <div class="contact-info-item padd-15">
                                                    <div class="icon"><i class="fa fa-phone"></i> </div>
                                                    <h4>Call Us On</h4>
                                                    <p>0785102996</p>
                                                </div>
                                                <!-- End Contact Info Item -->

                                                <!-- Start Contact Info Item -->
                                                <div class="contact-info-item padd-15">
                                                    <div class="icon"><i class="fa fa-envelope"></i> </div>
                                                    <h4>Email</h4>
                                                    <p>f.f.b.feras@gmail.com</p>
                                                </div>
                                                <!-- End Contact Info Item -->

                                                <!-- Start Contact Info Item -->
                                                <div class="contact-info-item padd-15">
                                                    <div class="icon"><i class="fa fa-globe-europe"></i> </div>
                                                    <h4>Website</h4>
                                                    <p>WWW.ferasBarahmeh.com</p>
                                                </div>
                                                <!-- End Contact Info Item -->
                                            </div>
                                            <h3 class="contact-title padd-15">SEND ME IN EMAIL</h3>
                                            <h4 class="contact-sub-title padd-15">I'M VERY RESPOSIVE TO MASSAGES</h4>
                                            <!-- Start Contact Form -->
                                            <div class="row">
                                                <div class="contact-form padd-15">
                                                    <div class="row">
                                                        <div class="form-item col-6 padd-15">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="name">
                                                            </div>
                                                        </div>

                                                        <div class="form-item col-6 padd-15">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="You Phone Number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-item col-12 padd-15">
                                                                <div class="form-group">
                                                                    <input name="" class="form-control" id="" placeholder="Subject">
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-item col-12 padd-15">
                                                                <div class="form-group">
                                                                    <textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Massage"></textarea>
                                                                </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-item col-12 padd-15">
                                                                <div class="form-group">
                                                                    <button type="subnit" class="btn">Send Masage</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Contact Form -->
                                        </div>
                                    </section>
                                    <!-- End Contact us  -->
                                </div>
                            <!-- Main Content End   -->
                        </div>
                    <!--  End  Main Contanier -->


                    <!-- Start Stayle Swircher  -->
                    <div class="style-switcher">
                        <div class="day-night s-icon">
                            <i class="fas "></i>
                        </div>
                        <div class="style-switcher-toggler s-icon">
                            <i class="fas fa-cog fa-spin"></i>
                        </div>
                        <h4>Them Color</h4>
                        <div class="colors">
                            <span class="color-1" onclick="setActive('color-1')"></span>
                            <span class="color-2" onclick="setActive('color-2')"></span>
                        </div>
                    </div>
                    <!-- End Stayle Swircher  -->

                    <!-- Js File -->
                    <?php JSFiles() ?>
                </body>
            </html>
        <?php
    }



// Main 
    MainStructer();
    ob_end_flush();