'use strict'

document.addEventListener("DOMContentLoaded", () => {
    let btnAdd = document.querySelector(".btnAdd");

    let formLabel = document.querySelectorAll("form label");
    let form = document.querySelector("form");
    formLabel.forEach(function (item) {

        btnAdd.addEventListener("click", function (event) {
            event.preventDefault();

            for (let i = 0; i < form.length; i++) {


                if (form[i].value === "") {
                    form[i].style.border = "solid 1px #B00020 ";

                } else {
                    form[i].style.border = "solid 1px #ccc ";
                    form.submit();
                }

            }


        });


    });
    if (screen.width === 414 && screen.height === 736) {
        let menuLateral = document.querySelector(".menuLateral");
        let container = document.querySelector(".container");
        let menuHorizontal = document.querySelector(".menuHorizontal");
        menuHorizontal.insertBefore(menuLateral, container.nextSibling);
        container.append(menuLateral);
        let exist = document.querySelector(".exist");
        container.insertBefore(menuLateral, exist);
    }

});



