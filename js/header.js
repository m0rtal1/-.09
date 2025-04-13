document.addEventListener("DOMContentLoaded", () => {
    let lastScrollTop = 0;
    const header = document.querySelector(".header");

    if (!header) return;

    window.addEventListener("scroll", () => {
        let scrollTop = window.scrollY || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            header.classList.add("header--hidden");
        } else {
            header.classList.remove("header--hidden");
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const menu = document.querySelector(".menu");
    const menuShadow = document.querySelector(".menu__shadow");
    const menu_button = document.querySelector(".header__menu-button")

    function showMenu() {
        menu.classList.add("menu--visible");
    }

    function hideMenu() {
        menu.classList.remove("menu--visible");
    }

    menu_button.addEventListener("click", (e) => {
        e.stopPropagation();
        if (menu.classList.contains("menu--visible")) {
            hideMenu();
        } else {
            showMenu();
        }
    });

    document.addEventListener("click", (e) => {
        if (!menu.contains(e.target) && !menu_button.contains(e.target)) {
            hideMenu();
        }
    });

    menuShadow.addEventListener("click", hideMenu);
});