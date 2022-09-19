// // Staert Set Theam
    const body = document.querySelector("body");
    const theamSit = localStorage.getItem("theam");
    body.removeAttribute("class");
    body.setAttribute("class", theamSit);
    
// // End Set Theam

// Start Navigation
    const lisNav = document.querySelectorAll(".li-nav");
    function removeActiveForAll() {
        lisNav.forEach((li) => {
            li.classList.remove("active");
        });
    }
    lisNav.forEach((liNav) => {

        liNav.addEventListener("click", () => {
            window.sessionStorage.setItem("activeLink", liNav.innerHTML);
            removeActiveForAll();
            liNav.classList.add("active");
        });
    });

    lisNav.forEach((a) => {
        if (a.innerHTML === window.localStorage.activeLink) {
            removeActiveForAll();
            a.classList.add("active");
        } else {
            removeActiveForAll();
        }
    });
// End Navigation


// Toggel Btn
    const toggelBurgerMinu = document.querySelector(".nav-toggeler");

    if (toggelBurgerMinu !== null) {
        toggelBurgerMinu.addEventListener("click", ()=>{
            let mainContant = document.querySelector(".contanier-profile");
            let aside = document.getElementById("aside-profile-page");

            if (aside.style.left === "-270px") {
                aside.style.left = "0";
                aside.style.width = "100%";
                mainContant.style.display = "none";
            } else {
                mainContant.style.display = "";
                aside.style.left = "-270px";
                aside.style.width = "270px";
            }
        });
    }


// Chosse Login Form Or Signup
    function showForm() {
        // Get Buttens
        const loginBtn = document.querySelector(".login-btn")
        const formLogin = document.getElementById("login-form");
        const formSingup = document.getElementById("singup-form");

        if (loginBtn.classList.contains("un-active-lgsin")) {
            if (formLogin.classList.contains("hidden")) {
                formLogin.classList.remove("hidden")
                formSingup.classList.add("hidden");

            } else {
                formLogin.classList.add("hidden");
                formSingup.classList.remove("hidden");
            }
        } else {
            if (formLogin.classList.contains("hidden")) {
                formLogin.classList.remove("hidden")
                formSingup.classList.add("hidden");
            } else {
                formLogin.classList.add("hidden")
                formSingup.classList.remove("hidden");
            }
        }
    }
    const regBtn = document.querySelectorAll(".reg-btn");

    const loginBtn = document.querySelector(".login-btn")
    const signupBtn = document.querySelector(".sigun-btn");
    if (signupBtn != null) {
        signupBtn.addEventListener("click", () => {
            let hasActiveSingup = signupBtn.classList;
            let hasActiveLogin = loginBtn.classList;

            if (hasActiveSingup.contains("un-active-lgsin")) { // Determent Btutton selected

                // if btn singup has un active class we will remove and add active class
                hasActiveSingup.remove("un-active-lgsin");
                hasActiveSingup.add("active-lgsin");

                // un active if in singup mean login btn is active we will set un active 
                hasActiveLogin.remove("active-lgsin");
                hasActiveLogin.add("un-active-lgsin");
                showForm();

            } else {
                // remove un active fron login
                hasActiveLogin.remove("un-active-lgsin");
                hasActiveLogin.add("active-lgsin");

                // remove active fron singup
                hasActiveSingup.remove("active-lgsin");
                hasActiveSingup.add("un-active-lgsin");
                showForm();
            }
        });
    }

    if (loginBtn !== null) {
        loginBtn.addEventListener("click", ()=> {
            let hasActiveSingup = signupBtn.classList;
            let hasActiveLogin = loginBtn.classList;
            if (hasActiveLogin.contains("active-lgsin")) { // Determent Btutton selected

            
                hasActiveLogin.remove("active-lgsin");
                hasActiveLogin.add("un-active-lgsin");
    
                hasActiveSingup.remove("un-active-lgsin");
                hasActiveSingup.add("active-lgsin");
    
                showForm();
    
            } else {
                hasActiveLogin.add("active-lgsin");
                hasActiveLogin.remove("un-active-lgsin");
                
                hasActiveSingup.add("un-active-lgsin");
                hasActiveSingup.remove("active-lgsin");
                showForm();
            }
        });
    }

// Start Validation input login page

// User name in login
    const userNameLogin = document.getElementById("usernamelogin");

    if (userNameLogin !== null) {
        userNameLogin.addEventListener("keyup", ()=>{
            if (userNameLogin.value.length <= 3 ) {
                userNameLogin.parentElement.children[1].classList.remove("hidden");
                userNameLogin.style.border = "1px solid red";
            } else {
                userNameLogin.parentElement.children[1].classList.add("hidden");
                userNameLogin.classList.add("success");
            }
        });
    }

// Password login
    const passwordLogin = document.getElementById("passwordlogin");

    if (passwordLogin !== null) {

        passwordLogin.addEventListener("keyup", ()=>{
            if (passwordLogin.value.length <= 3 ) {
                passwordLogin.parentElement.children[1].classList.remove("hidden")
            } else {
                passwordLogin.parentElement.children[1].classList.add("hidden")
                passwordLogin.classList.add("success");
            }
        });

    }

// user name singup
    const userNameSignup = document.getElementById("usernames");

    if (userNameSignup !== null ){ 
        userNameSignup.addEventListener("keyup", ()=>{
            if (userNameSignup.value.length <= 3 ) {
                userNameSignup.parentElement.children[1].classList.remove("hidden")
            } else {
                userNameSignup.parentElement.children[1].classList.add("hidden")
                userNameSignup.classList.add("success");
            }
        });
    }

// Password Singup
    const passwordSignup = document.getElementById("passwords");

    if (passwordSignup !== null) {
            
        passwordSignup.addEventListener("keyup", ()=>{
            if (passwordSignup.value.length <= 3 ) {
                passwordSignup.parentElement.children[1].classList.remove("hidden")
            } else {
                passwordSignup.parentElement.children[1].classList.add("hidden")
                passwordSignup.classList.add("success");
            }
        });
    }

// Email Singup
    const emailSignup = document.getElementById("emails");

    if (emailSignup !== null) {
        
        emailSignup.addEventListener("keyup", ()=>{
            if (emailSignup.value.length <= 3 ) {
                emailSignup.parentElement.children[1].classList.remove("hidden")
            } else {
                emailSignup.parentElement.children[1].classList.add("hidden")
                emailSignup.classList.add("success");
            }
        });
    }


// Full Name Singup
    const fullNameSignup = document.getElementById("fullnames");

    if (fullNameSignup !== null) {
        
        fullNameSignup.addEventListener("keyup", ()=>{
            if (fullNameSignup.value.length <= 3 ) {
                fullNameSignup.parentElement.children[1].classList.remove("hidden")
            } else {
                fullNameSignup.parentElement.children[1].classList.add("hidden")
                fullNameSignup.classList.add("success");
            }
        });
    }


// Show Aside when Click Toggeler
    const toggel = document.querySelector(".nav-toggeler");

    if (toggel !== null) {
        
        toggel.addEventListener("click", () =>{
            let aside = document.getElementById("login-aside");
            let mainContent= document.querySelector(".main-content");

            if (mainContent != null) {
                
                if (mainContent.style.display === "") {
                    mainContent.style.display = "none";
                    aside.style.left = 0;
                    aside.style.width = "100%";
                } else {
                    mainContent.style.display = "";
                    aside.style.left = "-250px";
                    aside.style.width = "250px";
                }
            }
        });
    }
    


// Box Alert

    // Hidden Box When click Ok
    const btnBox = document.getElementById("btn-boxAlert");

    if (btnBox !== null) {
        btnBox.addEventListener("click", function(){
            boxAlert.style.display = "none";
            const ovelay = document.getElementById("overlay");

            ovelay.classList.remove("active");
        });
    }

    // Select Position 
    function SetBoxAlert() {
        const boxAlert = document.getElementById("boxAlert");

        if (boxAlert !== null) {
            boxAlert.style.marginLeft = (window.innerHeight / 2) - (boxAlert.clientWidth / 2) + "px";
            boxAlert.style.marginTop = (window.innerHeight / 2) - (boxAlert.clientHeight / 2) + "px";

            const ovelay = document.getElementById("overlay");
            if (!ovelay.classList.contains("active")) {
                ovelay.classList.add("active");
            } 
        }
    }
    SetBoxAlert();

    window.addEventListener("resize", SetBoxAlert );

// End Alert Box



// Simple Alert Massage
    // Delete Alert
        const AlertMassage = document.getElementById("alert-mass");

        // If Massage dange exist
        if (AlertMassage !== null) {
            const cross = document.getElementById("del-mass");
            cross.addEventListener("click", ()=> {
                AlertMassage.style.display = "none";
            });

            // Set Color Masssage
            if (AlertMassage.classList.contains("danger")) {  // If Error
                AlertMassage.style.background = "#ff6c6c";
                AlertMassage.style.borderLeft = "5px solid #fc2222";
                AlertMassage.children[0].children[1].style.background = "red";

            } else if (AlertMassage.classList.contains("done")) { // If Success
                AlertMassage.style.background = "#93e468";
                AlertMassage.style.borderLeft = "5px solid #48a903";
                AlertMassage.children[0].children[1].style.background = "#48a903";
            }
        }

// Start  Profile
    // Drop down List
    const btnDropdown = document.getElementById("deopdown-btn");
    if (btnDropdown !== null) {
        // get Icons Up Down List

        btnDropdown.addEventListener("click", ()=>{
            const ul = document.getElementById("ul-dropdown");
            const up = document.getElementById("up");
            const down = document.getElementById("down");

            if (ul.style.display == "none") {
                // show list
                ul.style.display = "block";
                // Show Appropriate Icone
                up.style.display = "inline-block";
                down.style.display = "none";
            } else {
                // Disaple list
                ul.style.display = "none";
                
                // Show Appropriate Icone
                down.style.display = "inline-block";
                up.style.display = "none";
            }
        });
    }

    // Start Shrink Content
    function ShowArticles () {
        // Get Articles 
        let articlesContanier = document.getElementById("articles");
        // Get Icome up
        const up = document.getElementById("up-section");
        // Get Icone down
        const down = document.getElementById("down-section");

        if (articlesContanier.style.display == "block") {
            up.style.display = "none";
            down.style.display = "inline-block";
            articlesContanier.style.display = "none";
        } else {
            up.style.display = "inline-block";
            down.style.display = "none";
            articlesContanier.style.display = "block";
        }
    }

    function ShowComments () {
        let commetnsContanier = document.getElementById("comments");
        // Get Icome up
        const up = document.getElementById("up-section-comm");
        // Get Icone down
        const down = document.getElementById("down-section-comm");

        if (commetnsContanier.style.display == "block") {
            commetnsContanier.style.display = "none";
            up.style.display = "none";
            down.style.display = "inline-block";
        } else {
            commetnsContanier.style.display = "block";
            up.style.display = "inline-block";
            down.style.display = "none";
        }
    }

    function ShowQueueArticles() {
        let queueContanier = document.getElementById("queue-articles");
        // Get Icome up
        const up = document.getElementById("up-queue-articles");
        // Get Icone down
        const down = document.getElementById("down-queue-articles");

        if (queueContanier.style.display == "block") {
            queueContanier.style.display = "none";
            up.style.display = "none";
            down.style.display = "inline-block";
        } else {
            queueContanier.style.display = "block";
            up.style.display = "inline-block";
            down.style.display = "none";
        }
    }

    const liContent = document.querySelectorAll(".shrink-content");
    if (liContent !== null ) {
        liContent.forEach( (li)=>{
            li.addEventListener("click", ()=> {
                const id = li.getAttribute("id");

                if (id === "to-show-articls") {
                    ShowArticles();
                } else if (id === "to-show-comments") {
                    ShowComments();
                } else if (id === "to-queue-articles") {
                    ShowQueueArticles();
                }
            });
        });
    }
