'use strict'


document.addEventListener("DOMContentLoaded", () => {


    if (screen.width === 414 && screen.height === 736) {


        let menuLateral = document.querySelector(".menuLateral");
        let container = document.querySelector(".container");
        let menuHorizontal = document.querySelector(".menuHorizontal");
        menuHorizontal.insertBefore(menuLateral, container.nextSibling);
        container.append(menuLateral);
        let info = document.querySelector(".info");
        container.insertBefore(menuLateral, info);

    }
});


