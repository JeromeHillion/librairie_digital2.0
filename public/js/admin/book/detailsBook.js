'use strict'




document.addEventListener("DOMContentLoaded", () => {


    if (screen.width === 414 && screen.height === 736) {


        let menuLateral  = document.querySelector(".menuLateral");
        let container  = document.querySelector(".container");
        let menuHorizontal = document.querySelector(".menuHorizontal");
        menuHorizontal.insertBefore(menuLateral, container.nextSibling);
        container.append(menuLateral);
        let info = document.querySelector(".info");
        container.insertBefore(menuLateral, info);



    }
});

function showDate() {
    let option = {weekday: "long", year: "numeric", month: "long", day: "numeric"};

    h2.innerText = date.toLocaleDateString("fr-FR", option);
}

function showTime() {
    let date = new Date();
    let h = date.getHours();
    let m = date.getMinutes();
    let s = date.getSeconds();
    if (h < 10) {
        h = '0' + h;
    }
    if (m < 10) {
        m = '0' + m;
    }
    if (s < 10) {
        s = '0' + s;
    }

    h3.innerText = h + ':' + m + ':' + s;

    timer.appendChild(h3);

    // rafraîchissement en millisecondes
    setTimeout(showTime, 1000);
}
