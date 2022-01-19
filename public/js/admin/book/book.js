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
        }

        else
        {
            searchForm.submit();
        }

    });

});

function error() {
    name.style.border = "solid 2px #B3261E";
    spanError.style.color = "#B3261E";
    spanError.style.display = "block";
}

