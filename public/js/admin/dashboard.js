'use strict'

document.addEventListener("DOMContentLoaded", () => {

    let today = document.querySelector(".date");
    let calendar = document.createElement("div");
    let timer = document.createElement("div");
    calendar.classList.add("calendar");
    timer.classList.add("timer");
    today.appendChild(calendar);
    today.appendChild(timer);

    let h2 = document.createElement("h2");
    let h3 = document.createElement("h3");
    let date = new Date();
    let option = {weekday: "long", year: "numeric", month: "long", day: "numeric"};
    let calendarImg = document.createElement("img");
    calendarImg.src = '../../../public/css/admin/icones/variante-de-calendrier-de-bureau-de-printemps.png';
    h2.innerText = date.toLocaleDateString("fr-FR", option);
    calendar.appendChild(calendarImg);
    calendar.appendChild(h2);

    function showDate() {
        let date = new Date()


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
        setTimeout(showDate, 1000);
    }

    let timerImg = document.createElement("img");
    timerImg.src = '../../../public/css/admin/icones/lhorloge.png';
    timer.appendChild(timerImg);
    showDate();


    if (screen.width === 414 && screen.height === 736) {
        console.log(screen.width + "*" + screen.height);
        let containerLeft = document.querySelector(".containerLeft");
        containerLeft.remove();

        let h3 = document.querySelector(".subMenu a h3");
        h3.remove();

        let menu = document.querySelector(".container .verticalMenu");
        menu.style.display = "none";

        let subMenuParamsA = document.querySelector(".subMenuParams a");
        subMenuParamsA.textContent = "";

        let subMenuParamsImg = document.createElement("img");
        subMenuParamsImg.src = "../../../public/css/admin/icones/accueil.png";

        subMenuParamsA.append(subMenuParamsImg);


        let menuDeroulantImg = document.querySelector(".menuDeroulant img");
        menuDeroulantImg.style.cursor ="pointer";
        let verticalMenu = document.querySelector(".verticalMenu");
        let verticalMenuH2 = document.querySelector(".verticalMenu h2");
        verticalMenuH2.remove();

        menuDeroulantImg.addEventListener("click", () => {

            if (verticalMenu.style.display === "none")
            {
                verticalMenu.style.display = "block";
            }

            else
            {
                verticalMenu.style.display = "none";
            }
        });

    }
});