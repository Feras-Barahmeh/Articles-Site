// Set Active Class In links [Main page]

    // Get All links
    const linksHome = document.querySelectorAll("#index-a li a");
    linksHome.forEach(link => {

        link.addEventListener("click", ()=>{
            // Add Class On Clicked Link
            link.classList.add("active");

            // Remove Class For Links Not Clicabel
            linksHome.forEach(e =>  {
                if (e.className.includes("active") && e !== link) {
                    e.classList.remove("active");
                }
            });
        });
    });



// Start Typeing
    var typed = new Typed(".typing", {
        strings: ["", "Backend Web Devalober", "Intelligent Systems Engineer"],
        typeSpeed: 100,
        BackSpeed: 60,
        loop: true,
    });



// Start Show Switcher
    const switcherSection = document.querySelector(".style-switcher-toggler");
    const contanierSwitcher = document.querySelector(".style-switcher").classList;

    switcherSection.addEventListener("click", ()=>{
        if (contanierSwitcher.contains("open")) {
            contanierSwitcher.remove("open");
        } else {
            contanierSwitcher.add("open");
        }
    });

// Hid switcher when scroller
    window.addEventListener("scroll", ()=> {
        if (contanierSwitcher.contains("open")) {
            contanierSwitcher.remove("open");
        }
    });

// Start Theam Colors

const alternateStyle = document.querySelectorAll(".alternate-theam");

function setActive(color) { 
    alternateStyle.forEach ((style) => {
        if (color === style.getAttribute("title")) {
            style.removeAttribute("disabled");
        } else {
            style.setAttribute("disabled", true);
        }
    });
}

// Theam Ligth Dark
const dayNight = document.querySelector(".day-night");
dayNight.addEventListener("click", ()=> {
    let darkIconeSunIcon = dayNight.querySelector('i').classList;
    darkIconeSunIcon.toggle("fa-sun");
    darkIconeSunIcon.toggle("fa-moon");
    document.body.classList.toggle("dark");
});

window.addEventListener("load", () => {
    let darkIconeSunIcon = dayNight.querySelector('i').classList;
    if (document.body.classList.contains("dark")) {
        darkIconeSunIcon.add("fa-sun");
    } else {
        darkIconeSunIcon.add("fa-moon");
    }
});


// Show Aside 

const toggel = document.querySelector(".nav-toggeler");

toggel.addEventListener("click", ()=>{
    let mainContant = document.querySelector(".main-content");
    let aside = document.getElementById("aside-index");

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