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
        const cross = document.querySelector("#alert-mass #del-mass");
        cross.addEventListener("click", ()=> {
            AlertMassage.remove();
        });

        // Set Color Masssage

        if (AlertMassage.classList.contains("danger")) {  // If Error
            AlertMassage.style.background = "#ff6c6c !important";
            AlertMassage.style.borderLeft = "5px solid #fc2222 !important";
            AlertMassage.children[0].children[1].style.background = "red !important";

        } else if (AlertMassage.classList.contains("done")) { // If Success
            AlertMassage.classList.add("success-mas");
            AlertMassage.style.background = "#93e468 !important";
            AlertMassage.style.borderLeft = "5px solid #48a903 !important";
            AlertMassage.children[0].children[1].style.background = "#48a903 !important";
        }
    }
// End Simple Alter Massage

// Remoe Alter
const xBtn = document.getElementById("X");
if (xBtn !== null) {
    xBtn.addEventListener("click", () => {
        xBtn.parentElement.classList.add("hidden");
    });
}

