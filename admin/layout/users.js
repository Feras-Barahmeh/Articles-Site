// Show statistics user buttons
const btnsStatistics = document.getElementById("users-statistics");
if (btnsStatistics !== null ) {
    btnsStatistics.addEventListener("click", () => {
        const links = document.querySelector(".links");
        links.classList.toggle("show");
        // Change Angle Directory
        btnsStatistics.querySelectorAll("i").forEach(i => {
            i.classList.toggle("show");
        });
    });
}

// Sort Rows Table when Clikc td head
const tdsHead = document.querySelectorAll(".head-table-td");
const tdBody = document.querySelectorAll("tbody tr");
const tbody = document.getElementById("tBody");
function SetRanginkRowHead(rowsType) {
    let counter = 1;
    rowsType.forEach(td => {
        td.setAttribute("rank", counter);
        counter++;
    });
}
function SetRanginkRowBody() {
    let counter = 1;
    tdBody.forEach(trs => {
        const tds = trs.querySelectorAll("td");
        tds.forEach(td => {
            td.setAttribute("rank", counter);
            counter++;
        });
        counter = 1;
    });
}
function Sort(Type) {

}
// Set Rank Row
SetRanginkRowHead(tdsHead);
// Set Rank in td Tbody
SetRanginkRowBody();


let counterRows = 0;
if (tdsHead !== null ){
    tdsHead.forEach(tdHead => {
        tdHead.addEventListener("click", () => {


            const rankTd = tdHead.getAttribute("rank");

            let maxRows = new Array();

            tbody.querySelectorAll("tr").forEach(tr => {
                tr.querySelectorAll("td").forEach(row => {
                    if (row.getAttribute("rank") == rankTd) {
                        maxRows.push(row);
                    }
                });
            });



            maxRows.sort(function (a, b) {
                if (a < b )
                return -1;
                if (a > b)
                return 1;
                return - 1
            });

            // Remove All rows
            tdBody.forEach(tr => {
                tr.remove();
            });

            // Add Sorted Rows
            maxRows.forEach(t => {
                tbody.appendChild(t.closest("tr"));
            });
            
        });
    });
}

// Start Search users id user in show users page
const searchUser = document.getElementById("search-id-userName");
if (searchUser !== null) {
    searchUser.addEventListener("keyup", (e) => {
        const tdsUserName = tbody.querySelectorAll("tr [user-name]");

        // Search User Name
        tdsUserName.forEach(td => {

            if(td.innerHTML.toLocaleLowerCase().search(e.target.value.toLocaleLowerCase()) == -1) {
                td.closest("tr").classList.add("hidden");
            } else {
                td.closest("tr").classList.remove("hidden");
            }
        });
    });
}

// Start Edit Profile
function hiddenSnippetInputContaniers(snippetBtn) {
    document.querySelectorAll(".contanier-proccess").forEach(contanier => {
        if (contanier !== snippetBtn) {
            contanier.classList.add("kick-out");
        }
    });
    document.querySelectorAll(".containt-reg-db").forEach(contanier => {
        contanier.classList.remove("kick-out");
    });
}
const snippetEditBtns = document.querySelectorAll(".edit-btn");


if (snippetEditBtns !== null) {
    snippetEditBtns.forEach(snippetBtn => {
        snippetBtn.addEventListener("click", () => {
            const  target = snippetBtn.previousElementSibling.lastElementChild;
            const currentValue = snippetBtn.previousElementSibling.firstElementChild;

            // Hidden all current open
            hiddenSnippetInputContaniers(target);

            if (target.classList.contains("kick-out")) {
                target.classList.remove("kick-out");
                currentValue.classList.add("kick-out");
            } else {
                target.classList.add("kick-out");
                currentValue.classList.remove("kick-out");
            }
        });
    });
}

// hidden snippet target 
const canselBtn = document.querySelectorAll("#cancel");
if (canselBtn !== null) {
    canselBtn.forEach(btn => {
        btn.addEventListener("click", () => {
            hiddenSnippetInputContaniers();
            btn.closest(".contanier-proccess").classList.add("kick-out");
            btn.closest(".content-feild").firstElementChild.classList.remove("kick-out");
        });
    });
}

// Remove Skile
const removeSkileBtns = document.querySelectorAll("#remove-skile");
function removeSkiles() {
    let contantRemoved = null;
    if (removeSkileBtns !== null) {
        removeSkileBtns.forEach(removeSkileBtn => {
            removeSkileBtn.addEventListener("click", () => {
                removeSkileBtn.closest(".skile").remove();
            });
        });
    }
}

function creatSkileStructer(skile) {
    let div = document.createElement("div");
    div.classList.add("skile");
    div.classList.add("flex");
    div.classList.add("f-al-ce");
    div.classList.add("mr-15");

    let innerDiv = document.createElement("div");
    innerDiv.classList.add("name-skile");
    innerDiv.classList.add("mr-15");
    innerDiv.innerHTML = skile;

    let i = document.createElement("i");
    i.classList.add("fa");
    i.classList.add("fa-xmark");
    i.setAttribute("id", "remove-skile");

    // Add element to main div
    div.append(innerDiv);
    div.append(i);

    i.addEventListener("click", () => {
        div.remove();
    });

    return div;

}
function getCurrentTechs() {
    const containerSkilesStructer = document.querySelector(".containt-reg-db");
    const skiles = containerSkilesStructer.querySelectorAll(".skile");

    let nameSkiles = new Array();
    skiles.forEach(skile => {
        nameSkiles.push(skile.firstElementChild.innerHTML.trim("\n"));
    });

    return nameSkiles;
}

function getTechs() {
    const validSkiles = document.querySelectorAll("#skile-name");
    let skiles = new Array();
    validSkiles.forEach(skile => {
        skiles.push(skile.innerHTML.trim("\n").toLocaleLowerCase());
    });
    return skiles;
}
function getSkilesFromContanierSkiles() {
    let skile = [];

    containerSkilesStructer.querySelectorAll(".skile").forEach(skileBox => {
        skile.push(skileBox.querySelector(".name-skile").innerHTML);
    });
    return skile;
}
function suggistingTechs(massBox) {
    const addTechInput = document.getElementById("technical-input");
    const selection = document.getElementById("technical-list");
    const containerSkilesStructer = document.querySelector(".contaner-skiels");
    selection.addEventListener("change", () => {

        // If This technical Not Exist
        if (getSkilesFromContanierSkiles().includes(selection.value)) {
            containerSkilesStructer.prepend(creatSkileStructer(selection.value));
            addTechInput.innerHTML = "";
        } else {
            massBox.innerHTML = "This Technical Skile alrady exist";
            massBox.style.position = "relative";
            massBox.style.left = "0";
        }
    });

    return selection.value;
}

function ifExistTech(prevTech, currentTech, massBox) {

    if (! prevTech.includes(currentTech)) {
        massBox.innerHTML = "";
        massBox.style.position = "absolute";
        massBox.style.left = "103%";
        return true;
    } else {
        massBox.innerHTML = "This Technical Skile alrady exist";
        massBox.style.position = "relative";
        massBox.style.left = "0";
    }
}

const addTechInput = document.getElementById("technical-input");
const selection = document.getElementById("technical-list");
const validTechs = getTechs();
var containerSkilesStructer = document.querySelector(".contaner-skiels");
const registerTechinalsContanier = document.getElementById("current-skiles");

var lastTechnical = new Array();

if (addTechInput !== null) {
    addTechInput.addEventListener("keyup", (e) => {
        if(e.key === "Enter" || e.keyCode === 13) {

            const valueSkile = e.target.value.toLocaleLowerCase();
            if(! validTechs.includes(valueSkile)) {
                // selection
                selection.classList.remove("hidden");

                let errorBox = addTechInput.closest(".contanier-input").querySelector(".error-mas");

                if (ifExistTech(getSkilesFromContanierSkiles(), valueSkile, errorBox)) {
                    lastTechnical.push(suggistingTechs(errorBox));
                    addTechInput.value = "";
                }
            } else {
                if (ifExistTech(getSkilesFromContanierSkiles(), valueSkile, addTechInput.closest(".contanier-input").querySelector(".error-mas"))) {
                    containerSkilesStructer.prepend(creatSkileStructer(valueSkile));
                    lastTechnical.push(valueSkile);
                    e.target.value = "";
                }
            }
        } 
        removeSkiles();
    });
}

removeSkiles();

// Percantage Skiles
// Show Percantage When Click Edit
const editPercantage = document.getElementById("edit-percentage-skiles");

editPercantage.addEventListener("click", () => {
    document.querySelector(".skiles-percentage").classList.toggle("kick-out");
});

var percantageBars = document.querySelectorAll("#percantage-bar");
percantageBars.forEach(percantageBar => {
    let valueBox = 
        percantageBar.nextElementSibling.querySelector(".value");
    percantageBar.addEventListener("change", () => {
        // Set Value Percentage When Chage Range input
        valueBox.textContent = percantageBar.value + '%';

        // Change Circule
        let percentageCircular = percantageBar.nextElementSibling.querySelector(".percentage-circular");
        percentageCircular.style.background = `conic-gradient(
            var(--skin-color) ${percantageBar.value * 3.6 }deg,
            var(--skin-alt-color) ${percantageBar.value * 3.6 }deg
        )`;
    });
});

// Set Value input
percantageBars.forEach(percantageBar => {

    let valueBox = 
        percantageBar.nextElementSibling.querySelector(".value");
    const value = valueBox.innerHTML.split('%').join('');
    const rangeInput = valueBox.closest(".percentage-container").previousElementSibling;
    rangeInput.value = value;
});

// Set Animation Change Bar
percantageBars.forEach(percantageBar => {
    window.addEventListener("scroll", () => {
            if (window.innerHeight >= percantageBar.getBoundingClientRect().top) {
                let containerPercantage = percantageBar.nextElementSibling.querySelector(".percentage-circular");

                let valueBox = 
                    percantageBar.nextElementSibling.querySelector(".value");
                let persantageValue = 0;
                const endValue = percantageBar.value;
                const speed = 20;
        
                let animation = setInterval ( () => {
                    persantageValue++;
                    valueBox.textContent = persantageValue + '%';
        
                    containerPercantage.style.background = `conic-gradient(
                        var(--skin-color) ${persantageValue * 3.6 }deg,
                        var(--skin-alt-color) ${persantageValue * 3.6 }deg
                    )`;
                    if (persantageValue == endValue) {
                        clearInterval(animation);
                    }
                }, speed);
            }

    });
});

// API Edit Profile

function editUserFeild(targetFile, data, btn) {
    const xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (xml.status === 200 && xml.readyState === 4) {
            if (xml.responseText === "Done") {
                const showBox = btn.closest(".content-feild").querySelector(".containt-reg-db");

                // Hidden Edit Box
                const ContanierInput = btn.closest(".contanier-proccess");
                ContanierInput.classList.add("kick-out")

                // Change Live Value
                showBox.innerHTML = data.newValue.replace("\\'", "'");

                // Show Layout Box
                showBox.classList.remove("kick-out");

                // Live Change Full Name In Layout
                if (data.nameCol === "fullName") {
                    document.getElementById("name-user-layout").innerHTML = data.newValue;
                }
            }
        }
    };

    xml.open("POST", "ajaxsFiles/editProfiles/" + targetFile);
    xml.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
    );
    xml.send(`nameCol=${data.nameCol}&newValue=${data.newValue}&idUser=${data.idUser}`);
}

const saveEditBtns = document.querySelectorAll("#save-edit");

if (saveEditBtns !== null) {
    saveEditBtns.forEach(btn => {
        btn.addEventListener("click", () => {

            // Prepare Data
            const inputFeild = btn.parentElement.parentElement.firstElementChild;
            const idUser = inputFeild.getAttribute("id_user");
            const nameColDB = inputFeild.getAttribute("name-col-db");
            const newValue = inputFeild.value.replace("'", "\\'");

            editUserFeild("main.php", {
                nameCol : nameColDB,
                newValue : newValue,
                idUser : idUser,
            }, btn);
        });
    });
}