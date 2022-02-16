'use strict'

let timer = document.createElement("div");
let h2 = document.createElement("h2");
let h3 = document.createElement("h3");
let today = document.querySelector(".date");
let calendar = document.createElement("div");
let timerImg = document.createElement("img");
timerImg.src = '../../../public/css/admin/icones/lhorloge.png';
let date = new Date();
calendar.classList.add("calendar");
timer.classList.add("timer");
today.appendChild(calendar);
today.appendChild(timer);
timer.appendChild(timerImg);
let calendarImg = document.createElement("img");
calendarImg.src = '../../../public/css/admin/icones/variante-de-calendrier-de-bureau-de-printemps.png';
calendar.appendChild(calendarImg);
calendar.appendChild(h2);


document.addEventListener("DOMContentLoaded", () => {

    showDate();
    showTime();
    if (screen.width === 414 && screen.height === 736) {
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

        let tbodyTd = document.querySelectorAll('table tbody tr td');
        tbodyTd.forEach(function (item) {

            /*console.log(item);*/

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
