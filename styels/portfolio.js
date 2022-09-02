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
