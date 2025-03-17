"use strict";

export default function () {
    const subMenu = document.querySelectorAll(
        ".c-footer-menu__main-item.menu-item-has-children"
    );

    // console.log(subMenu);

    subMenu.forEach((menu) => {
        menu.addEventListener("click", (e) => {
            // console.log('teste');
            const isActive = menu.classList.contains("ativo");
            subMenu.forEach((item) => item.classList.remove("ativo"));
            if (!isActive) {
                menu.classList.add("ativo");
                e.preventDefault();
            } else {
                menu.classList.remove("ativo");
                e.preventDefault();
            }
        });
    });
}