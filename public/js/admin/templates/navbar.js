'use strict'




document.addEventListener("DOMContentLoaded", () => {

    if (screen.width === 414 && screen.height === 736) {
        console.log(screen.width + "*" + screen.height);
        let containerLeft = document.querySelector(".containerLeft");
        containerLeft.remove();

        let subMenuH3 = document.querySelector(".subMenu a h3");
        subMenuH3.remove();

        let menu = document.querySelector(".container .verticalMenu");
        menu.style.display = "none";

        let subMenuParamsH3 = document.querySelector(".subMenuParams a h3");
        subMenuParamsH3.remove();

    }
});