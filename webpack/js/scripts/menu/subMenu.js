"use strict";

export default function () {
    const listMenu = document.querySelectorAll(".c-submenu-trigger-wrapper");
    const subMenu = document.querySelectorAll(
        ".menu-mobile .c-main-menu__item.menu-item-has-children"
    );
    const closeMenu = document.querySelectorAll(".js-close-submenu");

    subMenu.forEach((menu, index) => {
        menu.addEventListener("click", (e) => {
            const isActive = listMenu[index].classList.contains("ativo");
            listMenu.forEach((item) => item.classList.remove("ativo"));
            if (!isActive) {
                listMenu[index].classList.add("ativo");
                e.preventDefault();
            }
        });
    });

    closeMenu.forEach((item, i) => {
        item.addEventListener("click", (e) => {
            e.stopPropagation();
            listMenu[i].classList.remove("ativo");
        });
    });
}
