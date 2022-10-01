// remove Alter Massage
const removeAlterMassage = document.getElementById("X");

if (removeAlterMassage !== null) {
    removeAlterMassage.addEventListener("click", () => {
        removeAlterMassage.parentElement.style.display = "none";
    });
}

// Box Puple Box Massage

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

// End Puple Box Massage



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
// End Simple Alter Massage