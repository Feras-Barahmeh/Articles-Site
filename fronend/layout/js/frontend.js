// Chose Login Form Or Signup
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


// Start Validation input login page

// User name in login
const userNameLogin = document.getElementById("usernamelogin");

userNameLogin.addEventListener("keyup", ()=>{
    if (userNameLogin.value.length <= 3 ) {
        userNameLogin.parentElement.children[1].classList.remove("hidden")
    } else {
        userNameLogin.parentElement.children[1].classList.add("hidden");
        userNameLogin.classList.add("success");
    }
});

// Password login
const passwordLogin = document.getElementById("passwordlogin");

passwordLogin.addEventListener("keyup", ()=>{
    if (passwordLogin.value.length <= 3 ) {
        passwordLogin.parentElement.children[1].classList.remove("hidden")
    } else {
        passwordLogin.parentElement.children[1].classList.add("hidden")
        passwordLogin.classList.add("success");
    }
});


// user name singup
const userNameSignup = document.getElementById("usernames");

userNameSignup.addEventListener("keyup", ()=>{
    if (userNameSignup.value.length <= 3 ) {
        userNameSignup.parentElement.children[1].classList.remove("hidden")
    } else {
        userNameSignup.parentElement.children[1].classList.add("hidden")
        userNameSignup.classList.add("success");
    }
});

// Password Singup
const passwordSignup = document.getElementById("passwords");

passwordSignup.addEventListener("keyup", ()=>{
    if (passwordSignup.value.length <= 3 ) {
        passwordSignup.parentElement.children[1].classList.remove("hidden")
    } else {
        passwordSignup.parentElement.children[1].classList.add("hidden")
        passwordSignup.classList.add("success");
    }
});

// Email Singup
const emailSignup = document.getElementById("emails");

emailSignup.addEventListener("keyup", ()=>{
    if (emailSignup.value.length <= 3 ) {
        emailSignup.parentElement.children[1].classList.remove("hidden")
    } else {
        emailSignup.parentElement.children[1].classList.add("hidden")
        emailSignup.classList.add("success");
    }
});


// Full Name Singup
const fullNameSignup = document.getElementById("fullnames");

fullNameSignup.addEventListener("keyup", ()=>{
    if (fullNameSignup.value.length <= 3 ) {
        fullNameSignup.parentElement.children[1].classList.remove("hidden")
    } else {
        fullNameSignup.parentElement.children[1].classList.add("hidden")
        fullNameSignup.classList.add("success");
    }
});



// Show Aside when Click Toggeler
const toggel = document.querySelector(".nav-toggeler");


toggel.addEventListener("click", () =>{
    let aside = document.getElementById("login-aside");
    let mainContent= document.querySelector(".main-content");

    if (mainContent.style.display === "") {
        mainContent.style.display = "none";
        aside.style.left = 0;
        aside.style.width = "100%";
    } else {
        mainContent.style.display = "";
        aside.style.left = "-250px";
        aside.style.width = "250px";
    }

});