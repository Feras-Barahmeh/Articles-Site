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
    let ContantFilterByCats =  document.querySelector(".categoreis-dropdown");

    // Add Class on clicked li
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

    function CreateImgNull() {
        let Img = document.createElement("img");
        Img.src = '../commonBetweenBackFront/images/imagesProject/null_light.png';
        Img.alt = "NULL-Value";
        Img.className = "null-img";
        let ContanierImag = document.getElementById("if-no-val");
        ContanierImag.appendChild(Img);
    }

    function GetAllHasClickedClass() {
        let HasClicked = document.querySelectorAll('.clicked');
        console.log(HasClicked);
        for (let i of HasClicked)
            i.className = "";
    }

    function ShowDetermantArticles(catid) {
        let ArticelsNames = document.querySelectorAll(".name-articel"); let counter = 0;
        for (let ArticleName of ArticelsNames) {
            if (ArticleName.getAttribute('idcat') !== catid){
                ArticleName.style.display = "none";

            } else {
                ArticleName.style.display = "flex";
                counter++;
            }
        }
        if (counter == 0)  {
            CreateImgNull();
        }
    }

    function SetClickedClass() {
        document.addEventListener('click', function HandelClick(event){
            let li = event.target.parentElement;
            GetAllHasClickedClass();
            li.classList.add('clicked');
            if (li.hasAttribute) {
                ShowDetermantArticles(li.getAttribute('idcat'));
            }
        });
    }

// main
