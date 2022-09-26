
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

        const ListsModify = document.querySelectorAll(".listModify");

        ListsModify.forEach(listModify => {
            listModify.classList.add("hidden");
        });
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
            }
        }

        xmlRequest.open("POST", "../ajaxPHPFilesArticles/editDeleteComment/" + targetFile, false);
        xmlRequest.setRequestHeader (
            "Content-Type",
            "application/x-www-form-urlencoded"
        );
        xmlRequest.send(`typeOparation=${typeOparation}&newComment=${newComment}&idComment=${idComment}`);
    }


    // Hidden List When Scroll

    document.addEventListener("scroll", () => {
            hiddeUlOptions();
    });


    // Starrt Edit And Delete Comment
    const ellipsisVertical = document.querySelectorAll(".ellipsis-vertical");

        ellipsisVertical.forEach(ellipsis => {
            ellipsis.addEventListener("click", () => {

                const optionsList = ellipsis.nextElementSibling;
                
                // Get Contanier Comment
                const grandfather = ellipsis.closest(".containet-comment");
                

                // Get Edit Btn
                const editCommentBtn = optionsList.querySelector("#edit-comment");
                editCommentBtn.addEventListener("click", () => {

                    // Hidden Ul List
                    optionsList.classList.add("hidden");

                    // Hidde Current Comment
                    const currentComment = grandfather.querySelector("#comment-p");
                    currentComment.classList.add("hidden");

                    // Show Edit Comment Box 
                    const editCommentBox = grandfather.querySelector("#contaner-edit-comment");
                    editCommentBox.classList.remove("hidden");

                    // Show Edit Comment Btn
                    const shareCommentBtn = grandfather.querySelector("#save-edit-comment");
                    shareCommentBtn.classList.remove("hidden");

                    // Show Cansle Edit Btn 
                    const cansleBtn = grandfather.querySelector("#cancel");
                    cansleBtn.classList.remove("hidden");
                    
                    // Hidden comment Edit Box When click Cansle
                            cansleBtn.addEventListener("click", () => {
                                // Show Current Comment
                                currentComment.classList.remove("hidden");

                                // Remove Comment Edit Box 
                                editCommentBox.classList.add("hidden");

                                // Remove Edit Comment Btn 
                                shareCommentBtn.classList.add("hidden");

                                // Remvoe Cansle Btn
                                cansleBtn.classList.add("hidden");
                            });
                });

            });
        });


        // Fetch New Comment From Box Edit Comment

        function changeComment(newComment, commentBox) {

            const errorMasBox = commentBox.querySelector("#error-mas");
            // console.log(errorMasBox);
            if (newComment.length == 0) {
                errorMasBox.classList.remove("hidden");
                errorMasBox.innerHTML = "No Change In Comment";
            }

            const saveEditBtn = commentBox.querySelector("#save-edit-comment");

            saveEditBtn.addEventListener("click", () => {
                errorMasBox.classList.add("hidden");
                doSelectedOption( "editComment.php", saveEditBtn.getAttribute("id_comment"), "edit", newComment);

                // hidden Textarea edit comment & edit btn
                commentBox.querySelector("#contaner-edit-comment").classList.add("hidden");
                saveEditBtn.classList.add("hidden");
    
                // display new Comment
                commentBox.querySelector("#comment-p").classList.remove("hidden");
                
                // hidden cansel btn
                commentBox.querySelector("#cancel").classList.add("hidden");

                // Live Chabge comment
                commentBox.querySelector("#comment-p").innerHTML = newComment;
            });
        }

        const textareasNewComment = document.querySelectorAll("#contaner-edit-comment");

        if (textareasNewComment !== null) {
            textareasNewComment.forEach((area) => {
                area.addEventListener("keyup", (e) => {
                    let newComment = e.target.value;
                    changeComment(newComment, area.closest(".containet-comment"));
                });
            });
        }


        // Start Delete Comment

        const deleteCommentBtn = document.querySelectorAll("#delete-comment");
        deleteCommentBtn.forEach((deleteBtn) => {
            deleteBtn.addEventListener("click", () => {
                doSelectedOption("deleteComment.php", deleteBtn.getAttribute("id_comment"), "delete");
                window.location.replace(window.location.pathname + window.location.search + window.location.hash);
            });
        });


        // Set Like In comment Article

        function addReactionComment(info, excutionFile) {
            const requestReactionComment = new XMLHttpRequest();
            requestReactionComment.onreadystatechange = function () {
                if (requestReactionComment.readyState === 4 && requestReactionComment.status === 200) {
                    console.log(requestReactionComment.responseText);
                }
            }

            requestReactionComment.open("POST", "../ajaxPHPFilesArticles/likeDislikeCommentArticles/" + excutionFile);
            requestReactionComment.setRequestHeader (
                "Content-Type",
                "application/x-www-form-urlencoded"
            );

            requestReactionComment.send(`idComment=${info.idComment}&idArticle=${info.idArticle}&idUser=${info.idUser}&typeReaction=${info.typeReaction}&actionType=${info.actionType}`);
        }

        const likes = document.querySelectorAll(".like-comment");

        likes.forEach(like => {
            like.addEventListener("click", () => {
                let info = new Object ();

                let icone = like.querySelector("i");
                let actionType = icone.classList.contains("fa") ? "unlike" : "like";
                const numContanier = like.lastElementChild;

                if (actionType === "like") {
                    // fill Like
                    icone.classList.toggle("fa-regular"); 
                    icone.classList.toggle("fa");

                    // Live Change Number
                    numContanier.innerHTML = Number(numContanier.innerHTML) + 1;

                    // Remove Dislike If Exist
                    const dislike = like.nextElementSibling;

                    if (dislike.firstElementChild.classList.contains("fa") ) {
                        dislike.firstElementChild.classList.remove("fa");
                        dislike.firstElementChild.classList.add("fa-regular");
                        dislike.lastElementChild.innerHTML = Number(like.lastElementChild.innerHTML) - 1 >= 0 ? Number(like.lastElementChild.innerHTML) - 1 : 0;
                    }


                } else {
                    // fill Like
                    icone.classList.toggle("fa-regular"); 
                    icone.classList.toggle("fa");

                    // Live Change Number
                    numContanier.innerHTML = Number(numContanier.innerHTML) - 1;
                }


                info = {
                    "idComment": like.getAttribute("id_comment"),
                    "idArticle" : like.getAttribute("id_article"),
                    "idUser" : like.getAttribute("id_user"),
                    "typeReaction" : "like",
                    "actionType" :actionType,
                };

                addReactionComment(info, "addLike.php");
            });
        });


        // Add Dislikes

        const dislikes = document.querySelectorAll(".dislike-comment");

        dislikes.forEach((dislike) => {
            dislike.addEventListener("click", ()=> {
                let info = new Object ();

                let icone = dislike.querySelector("i");
                let actionType = icone.classList.contains("fa") ? "undislike" : "dislike";
                const numContanier = dislike.lastElementChild;

                if (actionType === "dislike") {
                    // fill Like
                    icone.classList.toggle("fa-regular"); 
                    icone.classList.toggle("fa");

                    // Live Change Number
                    numContanier.innerHTML = Number(numContanier.innerHTML) + 1;

                    // Remove Dislike If Exist
                    const like = dislike.previousElementSibling;

                    if (like.firstElementChild.classList.contains("fa") ) {
                        like.firstElementChild.classList.remove("fa");
                        like.firstElementChild.classList.add("fa-regular");
                        like.lastElementChild.innerHTML = Number(like.lastElementChild.innerHTML) - 1 >= 0 ? Number(like.lastElementChild.innerHTML) - 1 : 0;
                    }


                } else {
                    // fill Like
                    icone.classList.toggle("fa-regular"); 
                    icone.classList.toggle("fa");

                    // Live Change Number
                    numContanier.innerHTML = Number(numContanier.innerHTML) - 1;
                }


                info = {
                    "idComment": dislike.getAttribute("id_comment"),
                    "idArticle" : dislike.getAttribute("id_article"),
                    "idUser" : dislike.getAttribute("id_user"),
                    "typeReaction" : "dislike",
                    "actionType" :actionType,
                };

                addReactionComment(info, "addDislike.php");
            });
        });
