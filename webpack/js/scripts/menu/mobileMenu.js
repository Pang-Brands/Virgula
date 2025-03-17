"use strict";

export default function () {
    const hamburguer = document.querySelector(".hamburguer-menu");
    const listSuMenu = document.querySelectorAll(".c-submenu-trigger-wrapper");
    const listMenu = document.querySelector(".menu-mobile");

    function adjustHeight() {
        const listMenu = document.querySelector(".menu-mobile");
        listMenu.style.height = window.innerHeight + "px";
    }

    hamburguer.addEventListener("click", () => {
        hamburguer.classList.toggle("close-menu");
        listMenu.classList.toggle("active");
        listSuMenu.forEach((menu) => menu.classList.remove("ativo"));

        if (listMenu.classList.contains("active")) {
            document.querySelector("html").style.overflowY = "hidden";
            window.addEventListener("resize", adjustHeight);
        } else {
            document.querySelector("html").style.overflowY = "inherit";
        }
    });
}
