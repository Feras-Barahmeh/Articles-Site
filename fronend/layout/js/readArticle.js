    // Shoew Commint Box 
    const shareCommBtn = document.getElementById("share-comm");
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

    const reactBtns = document.querySelectorAll(".react-btn");
    reactBtns.forEach((reactBtn) => {
        reactBtn.addEventListener("click", () => {
            reactAudio.play();
        });
    });

    // Add Reaction in DB
    function addReactionToDb(express, namearticle) {
        const xml = new XMLHttpRequest();
        
        xml.onreadystatechange = function () {
            if (xml.readyState === 4 && xml.status === 200) {
                let result = JSON.parse(this.responseText);

                const getClikedBtn = document.querySelector(`.${result.changeCountThisReaction}`).children[1];
                getClikedBtn.innerHTML = result.countReaction;

                // Fill Btn Reaction

            }
        };

        xml.open("POST", "../ajaxPHPFilesArticles/addReactions.php", false);
        xml.setRequestHeader (
            "Content-Type",
            "application/x-www-form-urlencoded"
        );
        xml.send(`typeReact=${express}&namearticle=${namearticle}`);
    }
    const toExpress = document.querySelectorAll(".react-btn ");

    toExpress.forEach((express) => {
        express.addEventListener("click", () => {
            addReactionToDb(express.getAttribute("description"), document.querySelector(".constanier-article").getAttribute("namearticle"));
        });
    });

    
