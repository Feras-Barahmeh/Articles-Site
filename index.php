<?php

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
            <link rel="stylesheet" href="styels//colors.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
        <?php
    }

    function JSFiles() {
        ?>
            <script src="styels//portfolio.js"></script>
        <?php
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
                <body>
                    <!-- ======= Start  Main Contanier -->
                        <div class="main-container">
                            <!-- Aside Start  -->
                                <aside>
                                    <div class="logo">
                                        <a href="#"><span>F</span><span>eras</span></a>
                                    </div>

                                    <!-- Toggel Start -->
                                    <div class="nav-toggeler">
                                        <span></span>
                                    </div>

                                    <nav>
                                        <ul>
                                            <li><a href="#" class="active"><i class="fa-solid fa-house"></i>Home</a></li>
                                            <li><a href="#"><i class="fa-solid fa-user"></i>About</a></li>
                                            <li><a href="#"><i class="fa-solid fa-list"></i>Services</a></li>
                                            <li><a href="#"><i class="fa-solid fa-briefcase"></i>Portfolio</a></li>
                                            <li><a href="#"><i class="fa-solid fa-comments"></i>Contact</a></li>
                                        </ul>
                                    </nav>
                                </aside>
                            <!-- Aside End  -->

                            <!-- Main Content Start   -->
                                <div class="main-content">
                                    <!-- Start Home -->
                                        <section class="home section hidden">
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
                                        <section class="about section">
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
                                </div>
                            <!-- Main Content End   -->
                        </div>
                    <!-- ======= End  Main Contanier -->
                    <?php JSFiles() ?>
                </body>
            </html>
        <?php
    }



// Main 
    MainStructer();