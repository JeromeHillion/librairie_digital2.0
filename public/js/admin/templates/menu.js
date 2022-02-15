'use strict'

document.addEventListener("DOMContentLoaded", () => {

    if (screen.width === 414 && screen.height === 736) {
        console.log(screen.width + "*" + screen.height);

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