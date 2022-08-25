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