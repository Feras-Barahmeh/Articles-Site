

    // Confirem Delete Massage
    function Confirm() {
        return confirm("Are You Sure To Do This?");
    }



    // Search
    function filter() {
        var SearchValue = document.getElementById('SearchValue').value;
        var SearchList = document.getElementsByClassName('for-search');

        for (var i of SearchList) {
            if(i.innerHTML.search(SearchValue) == -1) {
                i.style.display = "none";
            } else {
                i.style.display = "block";
            }
        }
    }

    // remove Aleart massage
    // const X = document.getElementById("X");

    // function removeAleart() {
    //     const alertMassage = document.getElementsByClassName("alert");
    //     X.parentElement.remove();
    // }
