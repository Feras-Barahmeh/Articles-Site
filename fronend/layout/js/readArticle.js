
// Shoew Commint Box 
    const shareCommBtn = document.getElementById("add-comm-btn");
    const commBox = document.getElementById("comm-box");
    
    shareCommBtn.addEventListener("click", ()=> {
        if (commBox.classList.contains("hidden")) {
            commBox.classList.remove("hidden");
        } else {
            commBox.classList.add("hidden");
        }
    });

    // Read More 
    const readMoreBtn = document.getElementById("re-mo");
    const readMoreP = document.getElementById("read-more-p");

    readMoreBtn.addEventListener("click", ()=> {
        if (readMoreBtn.innerHTML == "Read Less...") {
            readMoreBtn.innerHTML = "Read More...";
        } else {
            readMoreBtn.innerHTML = "Read Less...";
        }

        if (readMoreP.classList.contains("hidden")) {
            readMoreP.classList.remove("hidden");
        } else {
            readMoreP.classList.add("hidden");
        }
    });


    // Add Sound Reaction Btns [Like | Love | Dislike | Save]

    var reactAudio = new Audio();
    reactAudio.src = "../../commonBetweenBackFront/sounds/reacts.mp3";

    const reactBtnsAudio = document.querySelectorAll(".react-btn");
    reactBtnsAudio.forEach((reactBtn) => {
        reactBtn.addEventListener("click", () => {
            reactAudio.play();
        });
    });

    let shareAudio =  new Audio();
    const shareComment = document.getElementById("share-comment");
    shareAudio.src = "../../commonBetweenBackFront/sounds/shareComment.mp3";
    shareComment.addEventListener("click", () => {
        shareAudio.play();
    });

    let addAudio =  new Audio();
    const addComment = document.getElementById("add-comm-btn");
    addAudio.src = "../../commonBetweenBackFront/sounds/dropdown.wav";
    addComment.addEventListener("click", () => {
        addAudio.play();
    });

    // Add Feadback Articles
        function setReaction(attributeBtn) {
            const xml = new XMLHttpRequest();

            xml.onreadystatechange = function () {
                if (xml.readyState === 4 && xml.status === 200) {
                    let returnVal = JSON.parse(xml.responseText);

                    const numberReactions = document.querySelectorAll(".num-reaction");

                    // Seet Numbers Reactions
                    numberReactions.forEach((numberReaction) => {
                        const getNumbers = returnVal.newCountReactions;

                        for (let key in getNumbers) {
                            if (key === numberReaction.getAttribute("type-react")) {
                                numberReaction.lastElementChild.innerHTML = getNumbers[key];
                            }
                        }
                    });

                }
            }

            xml.open("POST", "../ajaxPHPFilesArticles/ReactionArticles/addReactionsArt.php", false);
            xml.setRequestHeader (
                "Content-Type",
                "application/x-www-form-urlencoded"
            );
            xml.send(`idArticle=${attributeBtn[0]}&idUser=${attributeBtn[1]}&typeReact=${attributeBtn[2]}`);
        }

        function removeCurrentReaction() {
            const btnsReactions = document.querySelectorAll(".react-btn");
            btnsReactions.forEach(btn => {
                btn.firstElementChild.classList.remove("fa");
                btn.firstElementChild.classList.add("fa-regular");
            });
        }

        const reactBtns = document.querySelectorAll(".react-btn");

        reactBtns.forEach((reactBtn) => {
            reactBtn.addEventListener("click", () => {

                // Cliked Btn
                let icone = reactBtn.firstElementChild;

                if (! icone.classList.contains("fa")) {
                    removeCurrentReaction();
                    icone.classList.add("fa");
                    icone.classList.remove("fa-regular");
                } else {
                    icone.classList.remove("fa");
                    icone.classList.add("fa-regular");
                }


                setReaction( [
                            reactBtn.getAttribute("id-article"),
                            reactBtn.getAttribute("id_user"),
                            reactBtn.getAttribute("type-react"),
                        ], );

            });
        });


