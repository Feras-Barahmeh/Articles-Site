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