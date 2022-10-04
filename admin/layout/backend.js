// Start Articles
function hiddenAllUl(constanersUls, currentClickEvent) {
    constanersUls.forEach( constanerUls => {
        // Change arrowes direction
        if (currentClickEvent !== constanerUls) {
            if (constanerUls.querySelector("ul").classList.contains("active")) {
                constanerUls.querySelectorAll(".angle").forEach(arrow => {
                    if (arrow.classList.contains("fa-angle-up")) {
                        arrow.classList.remove("active");
                    } else {
                        arrow.classList.add("active");
                    }
            });

                // hidden opend ul
                constanerUls.querySelector("ul").classList.remove("active");
            }
        }

    });
}
function outClickHiddenUl(filterArticleBtn) {
    let ifDone ;
    document.addEventListener("click", (e) => {
        const ifDropdownBtn = e.target.matches("[btn-deopdown]") ;

        if (!ifDropdownBtn && ! e.target.matches(".content-minu .search-li") ) {
            filterArticleBtn.forEach(dropdown => {
                
                // Reset sutable angle
                if (dropdown.querySelector("ul").classList.contains("active")) {
                    dropdown.querySelectorAll(".angle").forEach(arrow => {
                        arrow.classList.toggle("active");
                    });
                }

                dropdown.querySelector("ul").classList.remove("active");
                ifDone = false;
            });
        } else {
            ifDone = true;
        }
    });

    return ifDone;
}
const filterArticleBtn = document.querySelectorAll(".dropdown-minu");

if (filterArticleBtn !== null) {
    filterArticleBtn.forEach(filterBtn => {

        // Hidden ul whene scroll
        window.addEventListener("scroll", () => {
            filterBtn.querySelector(".fa-angle-up").classList.remove("active");
            filterBtn.querySelector(".fa-angle-down").classList.add("active");
            filterBtn.querySelector("ul").classList.remove("active");
        });

        filterBtn.addEventListener ("click", (e) => {
            // hidden all opend list
            hiddenAllUl(filterArticleBtn, filterBtn);

            // Hidden Drobdown When click in random position in page
            outClickHiddenUl(filterArticleBtn);

            // Show Clicked dorbdown
            if (e.target.matches("[btn-deopdown]") )
                filterBtn.querySelector("ul").classList.toggle("active");

            // Chane angels
            const angels = filterBtn.querySelectorAll(".angle");
            angels.forEach(angle => {
                angle.classList.toggle("active");
            });


        });
    });
}

// Serach Article depnded title

const searchArticleInput = document.getElementById("search-article-name");
const articels = document.querySelectorAll(".article");

if (searchArticleInput !== null) {
    searchArticleInput.addEventListener("keyup", (e) => {
        articels.forEach(article => {
            if (article.querySelector("h4").innerHTML.toLowerCase().search(e.target.value.toLowerCase()) == -1) {
                article.style.opacity = "0";
                setTimeout (function () {
                    article.style.display = "none";
                }, 300); // to hidden smothe mode (time is a .3s time in css transion)
            } else {
                article.style.opacity = "1";
                setTimeout (function () {
                    article.style.display = "block";
                }, 300);
            }
        });
    });
}

// Filter Article by name in articels page
const inputSearch = document.querySelectorAll(".search-li");

inputSearch.forEach(inputSearch => {
    const lis = inputSearch.closest("ul").querySelectorAll("li:not(li:first-child)");

    inputSearch.addEventListener("keyup", (e) => {
        lis.forEach(li => {
            if (li.innerHTML.toLowerCase().search(e.target.value.toLowerCase()) === -1) {
                li.style.display = "none";
            } else {
                li.style.display = "block";
            }
        });
    });
});
// Filter Article by filters type

function filterByType(li, typeFilter) {

    // Reset angle
    /**
     * I used parent Elemenet in the event that change dropdown-minu name we will it causes problem 
     * but in parent element the ul rarely out in in this parent class
     */
    li.parentElement.parentElement.querySelector("button").querySelectorAll("i").forEach(angle => {
        angle.classList.toggle("active");
    });

    // Get All Articles
    articels.forEach(article => {

        // Get All Type Of Filter Depended to Class element name
        article.querySelectorAll(`.${typeFilter}`).forEach(content => {

            // get Value of type filter
            content.querySelectorAll(".target-type").forEach(target => {

                // Check if content li equal conteitn in article
                if (target.innerHTML !== li.innerHTML) {
                    target.closest(".article").classList.add("hidden")
                } else {
                    target.closest(".article").classList.remove("hidden");
                }
            });
        });
    });
}

// Confirem Delete Article
function removePuple(btn) {
    btn.parentElement.classList.add("hidden");
    document.getElementById("overlay").classList.add("hidden");
}
function ifOk(id, link=null) {
    const btn= document.getElementById(id);
    if (id === "btn-boxAlert") {
        btn.addEventListener("click", () => {
            removePuple(btn);
            // Direct to delete page
            location.href = location.pathname + link;
        });
    } 
}
function isCancel(id) {
    const btn= document.getElementById(id);
    if (id === "cancel") {
        btn.addEventListener("click", () => {
            removePuple(btn)
        });
    } 
}
function confirem(title, mas, link=null) {
    document.querySelector("body").innerHTML += `
                <div id="overlay" class="active"></div>
                <div id="boxAlert" >
                    <div class="contanier">
                        <h2 class="">${title}</h2>
                        <p>${mas}</p>
                        <button id="btn-boxAlert" type="button">OK</button>
                        <button id="cancel" type="button">cancel</button>
                    </div>
                </div>
    `;

    if (link !== null) {
        ifOk("btn-boxAlert", link)
        isCancel("cancel");
    } 
}