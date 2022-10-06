// Show statistics user buttons
const btnsStatistics = document.getElementById("users-statistics");
if (btnsStatistics !== null ) {
    btnsStatistics.addEventListener("click", () => {
        const links = document.querySelector(".links");
        links.classList.toggle("show");
        // Change Angle Directory
        btnsStatistics.querySelectorAll("i").forEach(i => {
            i.classList.toggle("show");
        });
    });
}

// Sort Rows Table when Clikc td head
const tdsHead = document.querySelectorAll(".head-table-td");
const tdBody = document.querySelectorAll("tbody tr");
const tbody = document.getElementById("tBody");
function SetRanginkRowHead(rowsType) {
    let counter = 1;
    rowsType.forEach(td => {
        td.setAttribute("rank", counter);
        counter++;
    });
}
function SetRanginkRowBody() {
    let counter = 1;
    tdBody.forEach(trs => {
        const tds = trs.querySelectorAll("td");
        tds.forEach(td => {
            td.setAttribute("rank", counter);
            counter++;
        });
        counter = 1;
    });
}
function Sort(Type) {

}
// Set Rank Row
SetRanginkRowHead(tdsHead);
// Set Rank in td Tbody
SetRanginkRowBody();


let counterRows = 0;
if (tdsHead !== null ){
    tdsHead.forEach(tdHead => {
        tdHead.addEventListener("click", () => {


            const rankTd = tdHead.getAttribute("rank");

            let maxRows = new Array();

            tbody.querySelectorAll("tr").forEach(tr => {
                tr.querySelectorAll("td").forEach(row => {
                    if (row.getAttribute("rank") == rankTd) {
                        maxRows.push(row);
                    }
                });
            });



            maxRows.sort(function (a, b) {
                if (a < b )
                return -1;
                if (a > b)
                return 1;
                return - 1
            });

            // Remove All rows
            tdBody.forEach(tr => {
                tr.remove();
            });

            // Add Sorted Rows
            maxRows.forEach(t => {
                tbody.appendChild(t.closest("tr"));
            });
            
        });
    });
}

// Start Search users id user in show users page
const searchUser = document.getElementById("search-id-userName");
if (searchUser !== null) {
    searchUser.addEventListener("keyup", (e) => {
        const tdsUserName = tbody.querySelectorAll("tr [user-name]");

        // Search User Name
        tdsUserName.forEach(td => {

            if(td.innerHTML.toLocaleLowerCase().search(e.target.value.toLocaleLowerCase()) == -1) {
                td.closest("tr").classList.add("hidden");
            } else {
                td.closest("tr").classList.remove("hidden");
            }
        });
    });
}