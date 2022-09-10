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