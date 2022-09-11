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

            const containerTags = document.getElementById("tag-contanier");
            const skille = document.getElementById("skills");
            var tags = [];

            // Fetch Words
            skille.addEventListener("keyup", (e)=> {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    let tag = e.target.value;
                    if (tag.length >= 1) {
                        tags.push(tag);
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
        