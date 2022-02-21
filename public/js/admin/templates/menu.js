'use strict'

document.addEventListener("DOMContentLoaded", () => {

    if (screen.width === 414 && screen.height === 736) {
        console.log(screen.width + "*" + screen.height);
        let dashboard= document.querySelector(".dashboard");
        dashboard.remove();

        let menuLateralImg = document.querySelector(".menuLateral img");
        menuLateralImg.style.cursor = "pointer";
        let subMenuLateral = document.querySelector(".subMenuLateral");
        let menuSection = document.querySelector(".menuSection");

        menuLateralImg.addEventListener("click", () => {

            if (subMenuLateral.style.display === "none" && menuSection.style.display === "none") {
                subMenuLateral.style.display = "flex";
                menuSection.style.display = "block";

            } else {
                subMenuLateral.style.display = "none";
                menuSection.style.display = "none";
            }
        });

        let a = document.querySelectorAll(".subMenu a");


        a.forEach(function(item){
            console.log(item);
            /*item.textContent ="";*/
            item.childNodes[1].remove();
        });


    }
});