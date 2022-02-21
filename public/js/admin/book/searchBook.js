'use strict'

let spanError = document.getElementById('error');
let name = document.getElementById('name');
let searchForm = document.getElementById('search');

document.addEventListener("DOMContentLoaded", () => {
    name.value = "";
    searchForm.addEventListener("submit", (event) => {
        event.preventDefault();

        if (name.value === "") {
            spanError.innerText = "Le champs est vide !";
            error();
        } else {
            searchForm.submit();
        }

    });
    if (screen.width === 414 && screen.height === 736) {
        console.log(screen.width + "*" + screen.height);
        let menuLateral  = document.querySelector(".menuLateral");
        let container  = document.querySelector(".container");
        let menuHorizontal = document.querySelector(".menuHorizontal");
        menuHorizontal.insertBefore(menuLateral, container.nextSibling);
        container.append(menuLateral);
        let search = document.querySelector(".search");
        container.insertBefore(menuLateral, search);

        let tableTh = document.querySelectorAll('table tr th');
        tableTh.forEach(function (item) {

            switch (item.innerText) {
                case 'ISBN':
                    item.remove();
                    break;
                case 'Date de publication':
                    item.remove();
                    break;
            }

        });

        let tbodyTd = document.querySelectorAll('table tr td');
        tbodyTd.forEach(function (item) {

            console.log(item);

            switch (item.className) {
                case "isbn":
                    item.remove();
                    break;
                case "publication":
                    item.remove();
                    break;
            }
        });

    }
});

function error() {
    name.style.border = "solid 2px #B3261E";
    spanError.style.color = "#B3261E";
    spanError.style.display = "block";
}

