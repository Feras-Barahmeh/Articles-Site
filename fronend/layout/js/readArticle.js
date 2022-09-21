
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

                    numberReactions.forEach((showReactionsNubmber) => {
                        if (showReactionsNubmber.getAttribute("typeReact") === returnVal.typeReact) {
                            for (let i = 0; i < showReactionsNubmber.children.length; i++) {
                                if (showReactionsNubmber.children[i].classList.contains("num")) {
                                    showReactionsNubmber.children[i].innerHTML = returnVal.countReaction !== null ? returnVal.countReaction : 0;
                                }
                            }
                        }
                    });
                }
            }

            xml.open("POST", "../ajaxPHPFilesArticles/addReactionsArt.php", false);
            xml.setRequestHeader (
                "Content-Type",
                "application/x-www-form-urlencoded"
            );
            xml.send(`idArticle=${attributeBtn[0]}&idUser=${attributeBtn[1]}&typeReact=${attributeBtn[2]}`);
        }
        const reactBtns = document.querySelectorAll(".react-btn");
        reactBtns.forEach((reactBtn) => {
            reactBtn.addEventListener("click", () => {
                reactBtn.firstElementChild.classList.toggle("fa-regular");
                reactBtn.firstElementChild.classList.toggle("fa");

                setReaction( [
                            reactBtn.getAttribute("id-article"),
                            reactBtn.getAttribute("id_user"),
                            reactBtn.getAttribute("type-react"),
                        ]);
            });
        });


