// Search Articles
    function getArticles(indicator) {
        let xml = new XMLHttpRequest();

        xml.onreadystatechange = function () {
            if (xml.readyState === 4 && xml.status === 200) {
                const ulTitle = document.getElementById("contaniert-art-tit");
                ulTitle.innerHTML = xml.responseText;
            }
        };

        xml.open("POST", "../ajaxPHPFilesArticles/searchArticle.php", true);
        xml.setRequestHeader (
            "Content-Type",
            "application/x-www-form-urlencoded"
        );
        xml.send(`indicator=${indicator}`);
    }

    const searchInput = document.getElementById("search-art");
    const searchBtn = document.getElementById("search-btn");
    
    searchInput.addEventListener("keypress" , (e) => {
        getArticles(e.target.value);
    });


// Show scroll To Up Btn
    const upBtn = document.getElementById("up-btn");
    window.onscroll = function () {
        this.scrollY >= 200 ? upBtn.classList.add("show") : upBtn.classList.remove("show");
    }

    upBtn.onclick = function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }