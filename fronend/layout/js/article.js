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
    
    searchInput.addEventListener("keyup" , (e) => {
        getArticles(e.target.value);
    });


// Show scroll To Up Btn
    const upBtn = document.getElementById("up-btn");
    window.onscroll = function () {
        this.scrollY >= 600 ? upBtn.classList.add("show") : upBtn.classList.remove("show");
    }

    upBtn.onclick = function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }


// Search Categories
    const cats = document.querySelectorAll(".cats");
    const numberCats = Object.keys(cats).length;

    const input = document.getElementById("search-cat");

    input.addEventListener("keyup", (e)=> {
        let val = e.target.value.toLowerCase();
        cats.forEach((cat) => {
            let nameCat = cat.getAttribute("name-cat").toLowerCase();
            if (nameCat.search(val) == -1 ) {
                cat.closest("li").style.display = "none";
            } else {
                cat.closest("li").style.display = "block";
                cat.closest("li").style.borderBottom = "none";
            }
        });

        // Remove Padding Bottom
        const contanierCats = document.querySelector(".cats-contaniere");
        contanierCats.style.paddingBottom = "unset";

    });
