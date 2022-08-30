


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

    // Show Ul when click
    let ContantFilterByCats =  document.querySelector(".categoreis-dropdown");
    ContantFilterByCats.addEventListener("click", 
        function (event) {
            var ul = document.getElementById("cats-page-profile");
            if (ul.style.display == "block") {
                ul.style.display = "none";
            } else {
                ul.style.display = "block";
            }
        }
    );

    // Show Determatin article by category
    function ShowDetermantArticles(catid) {
        let ArticelsNames = document.querySelectorAll(".name-articel"); 
        let CounterArticlesInCat = 0;
        for (let ArticleName of ArticelsNames) {
            if (ArticleName.getAttribute('idcat') !== catid){
                ArticleName.style.display = "none";
            } else {
                ArticleName.style.display = "flex";
                CounterArticlesInCat++;
            }
        }

        if (CounterArticlesInCat == 0)  {
            console.log("Not Found");
        }
    }

    function SetClickedClass() {
        document.addEventListener('click', function(event){
        let li = event.target;
        li.classList.add('clicked');
        if (li.hasAttribute) {
            ShowDetermantArticles(li.getAttribute('idcat'));
        }
    });
    }

// main
