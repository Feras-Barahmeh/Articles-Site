
// Start Dropdowmn
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
    }

// Search Article
    function FilterArticles() {
        let SearchValue = document.getElementById('SearchValue').value;
        let SerarchList = document.getElementsByClassName('box-article');
        
        for (let i of SerarchList) {
            if (i.childNodes[3].childNodes[1].innerHTML.search(SearchValue) == -1) {
                i.style.display = "none";
            } else {
                i.style.display = "block";
            }
        }
    }

// Serch In Articles At This Categoryes
    function FilterArticlesInThisCat() {
        let SearchValue = document.getElementById('SearchValue').value;
        let SearchList = document.getElementsByClassName('list-search');

        for (let li = 0; li < SearchList.length; li++) {
            if (SearchList[li].innerHTML.search(SearchValue) == -1) {
                SearchList[li].style.display = "none";
            } else {
                SearchList[li].style.display = "block";
            }
        }
    }



// Filter By Cat In Profile Page

    function fetchLettersWhenSearch() {
        let litters = document.getElementById("search-cats").value.toLowerCase();

        // Get Elemnts Has Name Careggory
        let categoriesName = document.querySelectorAll("#cat-name");
        
        for (let li of categoriesName) {
            if (li.innerHTML.toLocaleLowerCase().search(litters) == -1) {
                li.style.display = "none";
            } else {
                li.style.display = "block";
            }
        }
    }

    function creatImg(inClass, desine=null) {
        // Where We Set Img
        let contanier = document.getElementsByClassName(inClass);

        const image = document.createElement("img");
        image.src = "../commonBetweenBackFront/images/imagesProject/null_light.png";
        image.alt = "NULL Contant";
        image.classList.add(desine);
        contanier[0].appendChild(image);

    }

    function hiddenImage(inClass) {
        let contanier = document.getElementsByClassName(inClass);
    }


    function whenClickCategpry() {
        // Get ID Category
        let categoryID = event.target.getAttribute("idcat");

        // Get Name Articel
        let nameArticles = document.getElementsByClassName("name-articel");

        for (let nameArticle of nameArticles ) {
            if (nameArticle.getAttribute("idcat") !== categoryID) {
                nameArticle.style.display = "none";
            } else {
                nameArticle.style.display = "flex";
            }
        }

        // Desiply ul when choose category
        const showContent = document.getElementById("padding-dropdown");
        showContent.style.display = "none";

        // Add NULL image if No Article in This Category 
        // if (counter == -1 * (nameArticles.length)) {
        //     creatImg("articles", "null-img");
        // } else {
        //     hiddenImage("articles");
        // }

    }

    // Open ul when click
    function openList() {

        // Get Info Btn
        const btnShowUl = document.querySelector(".categoreis-dropdown");

        // Get Content btn
        const showContent = document.getElementById("padding-dropdown");

        // Change Display content
        if (showContent.style.display == "block") {
            showContent.style.display = "none";

            // Show caret-down icone
            btnShowUl.children[0].children[0].style.display = "inline-block";

            // hidden caret-up icone
            btnShowUl.children[0].children[1].style.display = "none";
        } else {
            showContent.style.display = "block";

            // Hidden caret-down icone
            btnShowUl.children[0].children[1].style.display = "inline-block";

            // Show caret-up icone
            btnShowUl.children[0].children[0].style.display = "none";
        }
    }


// Serch Language Tage In Edit Profile Page
