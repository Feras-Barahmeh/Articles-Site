// Start Functions
function hiddenWhenScroll(elementTarget) {
    window.addEventListener("scroll", ()=> {
        if (! elementTarget.classList.contains("hidden")) {
            elementTarget.classList.add("hidden");
        }
    });
}
// End Functions

// Start Dropdown minu
const dropdownBtn = document.getElementById("dropdoen-btn");
const list = document.getElementById("list-dropdown");

hiddenWhenScroll(list);
if(dropdownBtn !== null) {
    dropdownBtn.addEventListener("click", () => {
        list.classList.toggle("hidden");
        const iconsUpDown = document.querySelectorAll(".deopdown-btn i");
        iconsUpDown.forEach(icone => {
            icone.classList.toggle("hidden");
        });
    });
}

// Start partition Table

const table = document.getElementById("tBody");
if (table !== null) {
        
    const rows = table.querySelectorAll("tr");
    let rowsCount =  rows.length;
    const nextBtn = document.getElementById("next-btn");
    const prevBtn = document.getElementById("previous-btn");

    const countRowaShow = 4;
    if (rowsCount < 4) {
        document.querySelector(".pointer").classList.add("hidden");
    }

    function creatNodeNumber (number) {
        const span = document.createElement("span");
        span.classList.add("number-slide");
        span.classList.add("inline-block");
        span.classList.add("center-ele");
        span.classList.add("rad-c");
        span.classList.add("cursor-pointer");
        span.innerHTML = number;
        return span;
    }
    function unClickable() {
        const prevBtn = document.getElementById("first-node");
        const nextBtn = document.getElementById("last-node");

        if (prevBtn !== null && nextBtn !== null) {
                
            if (prevBtn.classList.contains("btn-active")) {
                const previous  = document.getElementById("previous-btn");
                previous.style.cursor = "no-drop";
                previous.style.opacity = ".4";
            }

            if (nextBtn.classList.contains("btn-active")) {
                const next = document.getElementById("next-btn");
                next.style.cursor = "no-drop";
                next.style.opacity = ".4";
            }
        }
    }
    function numberSlidesTable (rowsCount, countShowRows) {
        const countSlides = document.getElementById("count-slides");
        let counter = 0,
            numberNode = 0;
        for(let i = 1; i <= rowsCount; i++)  {
            if (countShowRows === counter) {
                numberNode += 1;
                const div = creatNodeNumber(numberNode);
                numberNode === 1 ? div.classList.add("btn-active") : "";
                numberNode === 1 ? div.setAttribute("id", "first-node") : "";
                countSlides.append(div);
                counter = 0;
            }

            if (counter < countShowRows && i === rowsCount) {
                numberNode += 1;
                const div = creatNodeNumber(numberNode);
                i === 1 ? div.classList.add("btn-active") : "";
                i === 1 ? div.setAttribute("id", "first-node") : "";
                i === rowsCount ? div.setAttribute("id", "last-node") : "";
                countSlides.append(div);
                counter = 0;
            } 
            counter++;

        }
    }

    numberSlidesTable(rowsCount, countRowaShow);
    unClickable();

    function setIdRowes(rows, numRowsInSlide) {
        let counter = 1;
        const rowsCount = rows.length;
        let pointerRows = 1;
        for (const row in rows) {
            if (Object.hasOwnProperty.call(rows, row)) {
                const element = rows[row];
                rows[row].setAttribute("class", counter);
                if (pointerRows === numRowsInSlide) {
                    counter++;
                    pointerRows = 0;
                }
                pointerRows++;
            }
        }
    }

    setIdRowes(rows, countRowaShow);

    function hiddenAnSelectedSlides(numberSLide = 1) {
        const showSlide = document.querySelectorAll("tbody tr");
        const activeNode = document.querySelector(".btn-active");

        for (const slide in showSlide) {
            if (Object.hasOwnProperty.call(showSlide, slide)) {
                const tr = showSlide[slide];
                if( ! tr.classList.contains(numberSLide)) {
                    tr.classList.add("hidden");
                } else {
                    tr.classList.remove("hidden");
                }
            }
        }
    }

    // Hidden Un selected Slides
    hiddenAnSelectedSlides()

    // add Event in Nods Contanies nubmer Sildes
    function removeActiveFromNods () {
        document.querySelector(".btn-active").classList.remove("btn-active");
        
    }
    function editPrevNextBtn(currentNode) {
        const prev = document.getElementById("previous-btn");
        const next = document.getElementById("next-btn");

        if (currentNode.getAttribute("id") !== "first-node" && currentNode.classList.contains("btn-active")) {
            prev.style.cursor = "pointer";
            prev.style.opacity = "1";
        } else {
            prev.style.cursor = "no-drop";
            prev.style.opacity = ".4";
            prev.addEventListener("click", (e) => {
                e.preventDefault();
            });
        }
        if (currentNode.getAttribute("id") === "last-node" && currentNode.classList.contains("btn-active")) {
            next.style.cursor = "no-drop";
            next.style.opacity = ".4";
        } else {
            next.style.cursor = "pointer";
            next.style.opacity = "1";
            prev.addEventListener("click", (e) => {
                e.preventDefault();
            });
        }

        
    }
    const nodeNumberSlides = document.querySelectorAll(".number-slide");

    if (nodeNumberSlides !== null){
        nodeNumberSlides.forEach((node) => {
            node.addEventListener("click", ()=> {
                removeActiveFromNods();
                editPrevNextBtn(node);
                node.classList.add("btn-active");
                hiddenAnSelectedSlides(node.innerHTML);
                editPrevNextBtn(node);
            });
        });
        
    }

    // Click next 

    const lastNode = document.getElementById("last-node");

    if (nextBtn !== null) {
        nextBtn.addEventListener("click", ()=> {
            const currentActiveNode = document.querySelector(".btn-active");
            const numberCurrentNode = Number(currentActiveNode.innerHTML) + 1;
        
            if (numberCurrentNode  !== lastNode.innerHTML) {
                const newCurrentNode = currentActiveNode.nextElementSibling;
                if (newCurrentNode !== null ) {
                    removeActiveFromNods();
                    newCurrentNode.classList.add("btn-active");
                    hiddenAnSelectedSlides(numberCurrentNode);
                    editPrevNextBtn(newCurrentNode);
        
                }
            }
        });
    }

    // Click Prev
    const firstNode = document.getElementById("first-node");

    if (prevBtn !== null) {
        prevBtn.addEventListener("click", () => {
            const currentActiveNode = document.querySelector(".btn-active");
            const numberCurrentNode = Number(currentActiveNode.innerHTML) - 1;
        
            if (numberCurrentNode !== firstNode.innerHTML) {
                const newCurrentNode = currentActiveNode.previousElementSibling;
                if (newCurrentNode !== null) {
                    removeActiveFromNods();
                    newCurrentNode.classList.add("btn-active");
                    hiddenAnSelectedSlides(numberCurrentNode);
                    editPrevNextBtn(newCurrentNode);
                }
            }
        });
    }
}

// End partition Table

// Start Quick Draft
function actionProcessDraft(idDraft, currentStatusDraft, typeRequest) {
    let xml = new XMLHttpRequest();

    xml.onreadystatechange = function () {
        if (xml.status === 200 && xml.readyState === 4) {
            // console.log(xml.responseText);
            document.querySelector("body").innerHTML += `${xml.responseText}`;

            // Remove Masage When Click X 
            const mass = document.getElementById("del-mass");
            if (mass !== null) {
                mass.addEventListener("click", () => {
                    mass.closest("#alert-mass").remove();
                });
            }
        }
    }

    xml.open("POST", "ajaxsFiles/drafts/excutionDraft.php");
    xml.setRequestHeader (
        "Content-Type",
        "application/x-www-form-urlencoded",
    );
    xml.send(`id_draft=${idDraft}&current_Status=${currentStatusDraft}&typeRequest=${typeRequest}`);
    xml.abort();
}
function fillCheckBox(checkBoxDraft) {
    // Update in database
    let currentStatus = checkBoxDraft.classList.contains("fa-check") == false ? 0 : 1;
    actionProcessDraft(checkBoxDraft.getAttribute("id_draft"), currentStatus, "chngeStatusDraft");
}


// Delete Draft
const delDraftBtn = document.querySelectorAll(".delete-draft");
if (delDraftBtn !== null ) {
    delDraftBtn.forEach(delBtn => {
        delBtn.addEventListener("click", () => {
            actionProcessDraft(delBtn.getAttribute("id_draft"), null, "delete");
    
            const parentLi = delBtn.closest("ul");
            delBtn.closest(".draft").remove();
    
            // If No Found Drafts
            if (parentLi.children.length == 0) {
                parentLi.innerHTML = `<div class="alter info m-20 p-15">No Drafts Yet</div>`;
            }
        });
    });
}

// Delete All Drafts
const clearDraftsBtn = document.getElementById("clear-drafts");
if (clearDraftsBtn !== null) { 
    clearDraftsBtn.addEventListener("click", () => {
        document.querySelector("body").innerHTML += `
        <div id="overlay" class="active"></div>
        <div id="boxAlert" >
            <div class="contanier">
                <h2 class="">Confirem Massage</h2>
                <p>Are you sure Delete All Drafts ??</p>
                <button id="btn-boxAlert" type="button">OK</button>
                <button id="no-btn" type="button">No</button>
            </div>
        </div>`;

        // If User sure Delete massages
        const okBtn = document.getElementById("btn-boxAlert");
        okBtn.addEventListener("click", () => {
            okBtn.closest("#boxAlert").remove();
            document.getElementById("overlay").remove();
            actionProcessDraft(null, null, "deleteAll");

            document.getElementById("listdrafts").innerHTML = `<div class="alter info m-20 p-15">No Drafts Yet</div>`;
        });

        // User dosen't need delete drafts
        const noBtn = document.getElementById("no-btn");
        noBtn.addEventListener("click", () => {
            noBtn.closest("#boxAlert").remove();
            document.getElementById("overlay").remove();
        });
    });

}

// Show content draft
const drafts = document.querySelectorAll(".draft");
if (drafts !== null) {
    drafts.forEach(draft => {
        draft.addEventListener("click", () => {
            draft.lastElementChild.classList.toggle("hidden");
            // switch arrow
            const angles = draft.firstElementChild.querySelectorAll(".angle");
            angles.forEach(angle => {
                angle.classList.toggle("hidden");
            });
        });
    });
}

const checkBoxsDraft = document.querySelectorAll(".check-box-draft");

if (checkBoxsDraft !== null) {
    // Fill box when click
    checkBoxsDraft.forEach(checkBoxDraft => {
        checkBoxDraft.addEventListener("click", () => {
            checkBoxDraft.classList.toggle("fa-check");

            checkBoxDraft.closest(".draft").lastElementChild.classList.toggle("hidden");
            fillCheckBox(checkBoxDraft);
        });
    });
}