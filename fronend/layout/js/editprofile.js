/// Start Clodal info

    // Show Input When Click Edit btn
        function removeHiddenClassContaniers() {
            // Get All Contanier Snippent input
            const contaniersInputs = document.querySelectorAll(".contanier-proccess");

            contaniersInputs.forEach((contanierInput) => {
                if (! contanierInput.classList.contains("hidden") ) {
                    contanierInput.classList.add("hidden");
                }
            });
        }

        function removeHiddenClassSpans() {
            // Get All span contain Info
            const contentSpans = document.querySelectorAll(".containt-reg-db");

            contentSpans.forEach((contentSpan) => {
                if (contentSpan.classList.contains("hidden") ) {
                    contentSpan.classList.remove("hidden");
                }
            });
        }

        // Core Code
            const editBtns = document.querySelectorAll(".editbtn");

            editBtns.forEach( (editbtn)=>{

                editbtn.addEventListener("click", ()=>{
                    const efictiveElement = editbtn.previousElementSibling.children;
                    // For Add class Hidden For All Contanier snippent input
                    removeHiddenClassContaniers();

                    // If No input files we will show the input
                    if (efictiveElement[0].classList.contains("hidden")) {
                        efictiveElement[0].classList.remove("hidden");
                        efictiveElement[1].classList.add("hidden");
                    } else {
                        // To Remove hidden Class For all spans Contain info
                        removeHiddenClassSpans();

                        // If set input files we will disaple the input
                        efictiveElement[0].classList.add("hidden");
                        efictiveElement[1].classList.remove("hidden");
                    }
                });
            });


            // When Clikc Cancel  Btn hidden form
            const cancelBtns = document.querySelectorAll(".cancel");

            if (cancelBtns !== null) {
                cancelBtns.forEach((cancelBtn) => {
                    cancelBtn.addEventListener("click", ()=> {
                        cancelBtn.closest(".contanier-proccess").classList.add("hidden")
                        cancelBtn.closest(".content-feild").firstElementChild.classList.toggle("hidden");
                    });
                });
            }

            // Creat Skille Tage
                function CreatTag(label) {
                    const div = document.createElement("div");
                    div.setAttribute("class", "tag");
                    const span = document.createElement("span");
                    span.innerHTML = label;
                    const closeBtn = document.createElement("i");

                    closeBtn.setAttribute("class", "fa fa-xmark");
                    closeBtn.setAttribute("data-tag", label);
                    div.appendChild(span);
                    div.appendChild(closeBtn);

                    return div;
                }

            // Creat Skille Tage
                function creatShowTag(label) {
                    const div = document.createElement("div");
                    div.setAttribute("class", "tag");
                    const span = document.createElement("span");
                    span.innerHTML = label;
                    
                    div.appendChild(span);

                    return div;
                }

                function remDublication() {
                    const alltags = document.querySelectorAll(".tag");
                    alltags.forEach((tag)=>{
                        tag.parentElement.removeChild(tag);
                    });
                }

                function addTags() {
                    remDublication();
                    tags.slice().reverse().forEach((tag)=> {
                        containerTags.prepend(CreatTag(tag));
                    });
                }

                function getTechnical() {
                    var xhr = new XMLHttpRequest();
                    var technicalAll = [];
                    xhr.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200) {
                            let technicals = this.responseText.split("-");
                            let techPure = technicals.slice(1, technicals.length);
                            for(let i = 0; i < techPure.length; i++) {

                                technicalAll.push(techPure[i].replace("\r\n", "").toLowerCase());
                                technicalAll.push(techPure[i].replace("\r\n", "").toUpperCase());
                            }
                        }

                    };
                    xhr.open("GET", "../../commonBetweenBackFront/textfiles/technical.txt", false);
                    xhr.send("");

                    return technicalAll;
                }

                const containerTags = document.getElementById("tag-contanier");
                const skille = document.getElementById("skills");
                var tags = [];

                const validTeqnical = getTechnical();

                // Fetch Words
                skille.addEventListener("keyup", (e)=> {
                    if (e.key === 'Enter' || e.keyCode === 13) {

                        let tag = e.target.value;

                        if (tag.length >= 1 && ! tags.includes(tag)) {

                            if (Object.values(validTeqnical).indexOf(tag) > -1) {
                                tags.push(tag);
                                skille.parentElement.lastElementChild.classList.add("hidden");
                            } else {
                                skille.parentElement.lastElementChild.classList.remove("hidden");
                            }
                        }
                        addTags();
                        tag = e.target.value = "";
                    }
                });

                // Remove Tags When Click X btn
                document.addEventListener("click", (e)=>{
                    if (e.target.tagName === "I") {
                        let data = e.target.getAttribute("data-tag")
                        const index = tags.indexOf(data);
                        tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
                        addTags();
                    }
                });

            // Controlle Save New Information

            // Send New Data to BackEnd
                function setPost(name, nameValu, idUser, caontanierData) {
                    let xmlHR = new XMLHttpRequest;

                    xmlHR.onload = function () {
                        if (this.readyState = 4 && this.status == 200) {
                            caontanierData.innerHTML = this.responseText;
                        }
                    };
                    xmlHR.open("POST", "../save edit/updateField.php", true);
                    xmlHR.setRequestHeader(
                        "Content-Type",
                        "application/x-www-form-urlencoded"
                    )
                    xmlHR.send(`${name}=${nameValu}&IdUser=${idUser}`);
                }

                
                const saveBtns = document.querySelectorAll(".save");

                saveBtns.forEach((saveBtn)=>{
                    saveBtn.addEventListener("click", function() {
                        const input = this.closest(".contanier-input").firstElementChild;

                        const nameInput = input.getAttribute("name");

                        saveBtn.closest(".contanier-proccess").classList.add("hidden")
                        saveBtn.closest(".content-feild").firstElementChild.classList.toggle("hidden");
                        setPost(nameInput, input.value, saveBtn.getAttribute("user-id"), input.closest(".content-feild").firstElementChild);
                    });
                });

                // Same Peossces To Skiles

                function removeRepatedTags() {
                    const contanierStruvterTags = document.getElementById("tag-contanier");
                    const getChileds = Object.values(contanierStruvterTags.children);

                    getChileds.forEach((tagChiled)=> {
                        if (tagChiled.classList.contains("tag")) {
                            tagChiled.remove();
                        }
                    });
                }

                function setSkilles(nameInputSkilles, tags, idUser, caontanierData) {
                    var xmlhttprequest = new XMLHttpRequest();

                    xmlhttprequest.onload = function () {
                        if (xmlhttprequest.status == 200 && xmlhttprequest.readyState == 4) {
                            let tagSkilles = this.responseText.split(",").reverse();
                            const stageData = document.getElementById("show-skilles-user");
                            console.log(stageData);
                            removeRepatedTags();
                            tagSkilles.forEach((tagSkille)=> {
                                if (tagSkille !== "") {
                                    caontanierData.prepend(CreatTag(tagSkille));
                                    stageData.prepend(creatShowTag(tagSkille));
                                }
                            });
                            
                        }
                    };


                            
                    

                    xmlhttprequest.open("POST", "../save edit/updateField.php", true);
                    xmlhttprequest.setRequestHeader (
                        "Content-Type",
                        "application/x-www-form-urlencoded"
                    );

                    xmlhttprequest.send(`${nameInputSkilles}=${[...tags]}&IdUser=${idUser}`)
                }

                const saveSkillesBtns = document.getElementById("save-skilles");

                // Get Old Skilles 
                let regVal = document.getElementById("regist-val").innerHTML;

                let purePrevSkilles = Object.values(regVal);
                let skilesPartion = []; let skil = "";

                purePrevSkilles.forEach((char) => {
                    if (char !== ",") {
                        skil += char;
                    } else {
                        skilesPartion.push(skil);
                        skil = "";
                    }
                });
                // To Add Last Value
                skilesPartion.push(skil);
                skil = "";

                tags = [...skilesPartion];

                saveSkillesBtns.addEventListener("click", ()=> {
                    const inputSkilles = saveSkillesBtns.closest(".contanier-input").firstElementChild;

                    let nameInputSkilles;

                    const toSelectInput = Object.values(inputSkilles.children);

                    toSelectInput.forEach((e)=>{
                        if (e.getAttribute("id") === "skills" ) {
                            nameInputSkilles = e.getAttribute("name");
                        }
                    });

                    saveSkillesBtns.closest(".contanier-proccess").classList.add("hidden")
                    saveSkillesBtns.closest(".content-feild").firstElementChild.classList.toggle("hidden");
                    setSkilles(nameInputSkilles, tags, saveSkillesBtns.getAttribute("user-id"), document.getElementById("tag-contanier"));
                });

// End Global INfo
/////////////////////////////////////////

// Start Acount Edit 
    function hiddenSections() {
        const containLevelsEdit = document.querySelectorAll(".cont-type-edit");
        containLevelsEdit.forEach((containLevelEdit) => { 
            containLevelEdit.classList.add("hidden");
        });
    }

    function removeActiveClass() {
        const liLevels = document.querySelectorAll(".level-edit");
        liLevels.forEach((li)=> {
            li.classList.remove("active");
        });
    }

    const basicInfo = document.getElementById("global-info-section");
    const accountSetting = document.getElementById("account-section");

    // Get Links Type Edit 
    const levelsEdit = document.querySelectorAll(".level-edit");

    levelsEdit.forEach((levelEdit)=>{
        levelEdit.addEventListener("click", () => {
            hiddenSections();
            let id = levelEdit.getAttribute("id" );
            if ( id === "global-info") {
                removeActiveClass();
                levelEdit.classList.toggle("active");
                basicInfo.classList.toggle("hidden");
            }

            if ( id === "account") {
                accountSetting.classList.remove("hidden");
                removeActiveClass();
                levelEdit.classList.toggle("active");

            }
        });
    });

// End Acount Edit