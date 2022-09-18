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