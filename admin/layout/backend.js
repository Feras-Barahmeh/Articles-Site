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