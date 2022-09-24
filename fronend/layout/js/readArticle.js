
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

                if (reactBtn.getAttribute("type-react") !== "save") {
                    // Cliked Btn
                    let icone = reactBtn.firstElementChild;

                    if (! icone.classList.contains("fa") ) {
                        removeCurrentReaction();
                        icone.classList.add("fa");
                        icone.classList.remove("fa-regular");
                    } else {
                        icone.classList.remove("fa");
                        icone.classList.add("fa-regular");
                    }
                } else {
                    let icone = reactBtn.firstElementChild;
                    icone.classList.toggle("fa");
                    icone.classList.toggle("fa-regular");
                }
                setReaction( [
                            reactBtn.getAttribute("id-article"),
                            reactBtn.getAttribute("id_user"),
                            reactBtn.getAttribute("type-react"),
                        ], );

            });
        });


    // Add Commment To Article

    function addCommentArticle(comment) {
        const xmlHR = new XMLHttpRequest();

        xmlHR.onreadystatechange = function () {
            if (xmlHR.readyState === 4 && xmlHR.status === 200) {
                console.log(xmlHR.responseText);
                if (JSON.stringify(comment).length === 0) {
                    console.log("Cant Send Empty Comment");
                }
            }
        }
        const prepareDataComment = document.getElementById("share-comment");

        xmlHR.open("POST", "../ajaxPHPFilesArticles/addCommentArticle/addComment.php", false);
        xmlHR.setRequestHeader (
            "Content-Type",
            "application/x-www-form-urlencoded"
        );
        xmlHR.send (`idArticle=${prepareDataComment.getAttribute("id-article")}&idUser=${prepareDataComment.getAttribute("id_user")}&comment=${comment}`);
    }

    const contentComment = document.getElementById("content-comment");
    const addCommentBtn = document.getElementById("share-comment");

    contentComment.addEventListener("keyup", (e)=> {
        comment = e.target.value;
    });

    addCommentBtn.addEventListener("click", () => {
        contentComment.value = "";
        contentComment.classList.add("hidden");
        addCommentArticle(comment);
        window.location.replace(window.location.pathname + window.location.search + window.location.hash);
    });
    // End Add Comment


    // Show Ul modify comment
    const iconModifyComment = document.querySelectorAll(".ellipsis-vertical");
    iconModifyComment.forEach((icone) => {
        icone.addEventListener("click", () => {
            if (icone.nextElementSibling.classList.contains("hidden")) {
                icone.nextElementSibling.classList.remove("hidden");
            } else {
                icone.nextElementSibling.classList.add("hidden");
            }
        });
    });

    // Edit And Delete Comment
    function hiddeUlOptions() {
        const ulOptions = document.getElementById("ul-comment-options");
        ulOptions.classList.add("hidden");
    }

    function liveChangeComment(newComment) {
        let priveComment = document.getElementById("comment-p");
        priveComment.innerHTML = "";
        priveComment.innerHTML = newComment
    }


    function doSelectedOption( targetFile, idComment, typeOparation, newComment=null) {
        const xmlRequest = new XMLHttpRequest();

        xmlRequest.onreadystatechange = function () {
            if (xmlRequest.readyState === 4 && xmlRequest.status === 200) {

                // If Opration Edit
                if (newComment != null) {
                    liveChangeComment(newComment);
                }

                // If Opration is Delete
                if (newComment == null) {
                    window.location.replace(window.location.pathname + window.location.search + window.location.hash);
                }
            }
        }

        xmlRequest.open("POST", "../ajaxPHPFilesArticles/editDeleteComment/" + targetFile, false);
        xmlRequest.setRequestHeader (
            "Content-Type",
            "application/x-www-form-urlencoded"
        );
        xmlRequest.send(`typeOparation=${typeOparation}&newComment=${newComment}&idComment=${idComment}`);
    }

    const deleteCommentBtn = document.querySelectorAll(".delete-comment");
    const editCommentBtns = document.querySelectorAll(".edit-comment");
    const priveComment = document.getElementById("comment-p");
    const containsEditComment  = document.getElementById("contaner-edit-comment");
    const saveEditBtn = document.getElementById("save-edit-comment");


    if (editCommentBtns !== null) {
        editCommentBtns.forEach((editCommentBtn) => {
            editCommentBtn.addEventListener("click", ()=> {
                // hidde Ul options list
                hiddeUlOptions();
        
                // Hidden Preve Contanet Comemnt
                // editCommentBtn.closest("comment-p").classList.add("hidden");
                priveComment.classList.add("hidden");
        
                // Show Edit Comment Texteara
                containsEditComment.classList.remove("hidden");
                saveEditBtn.classList.remove("hidden");
            });
        });
    }


    // Get New Comment
    let newComment = "";
    if (containsEditComment !== null) {
        containsEditComment.addEventListener("keyup", (e) => {
            newComment = e.target.value;
        });
    }

    if (saveEditBtn !== null ) {
        // Creat Requerst To Reaet Data When Click in edit comemnt btn
        saveEditBtn.addEventListener("click", () => {
            // ceck if New Comment Not Empty
            const errorMasBox = document.getElementById("error-mas");
            if (newComment.length == 0) {
                errorMasBox.classList.remove("hidden");
                errorMasBox.innerHTML = "No Change In Comment";
            } else {
            // If New Comment Valid 
                errorMasBox.classList.add("hidden");
                doSelectedOption( "editComment.php", saveEditBtn.getAttribute("id_comment"), "edit", newComment);
                // hidden Textarea edit comment & edit btn
                containsEditComment.classList.add("hidden");
                saveEditBtn.classList.add("hidden");
        
                // display new Comment
                priveComment.classList.remove("hidden");
            }
    
        });
    }

    if (deleteCommentBtn !== null) {
        deleteCommentBtn.addEventListener("click", () => {
            // Hidde ul Options
            hiddeUlOptions();
            doSelectedOption("deleteComment.php", deleteCommentBtn.getAttribute("id_comment"), "delete");
        }) ;
    }
