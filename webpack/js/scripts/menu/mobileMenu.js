"use strict";

export default function () {
    const hamburguer = document.querySelector(".hamburguer-menu");
    const menu = document.querySelector(".menu");
    hamburguer.addEventListener("click", () => {
        hamburguer.classList.toggle("active");
        menu.classList.toggle("active");
    });
}
