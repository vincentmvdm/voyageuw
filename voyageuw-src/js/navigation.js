(function() {
    "use strict";

    window.addEventListener("load", function load(event){
        window.removeEventListener("load", load, false);
        document.getElementById("nav-toggle").onclick = toggleNav;
    }, false);

    function toggleNav() {
        var navToggle = document.getElementById("nav-toggle");
        document.querySelector('body').classList.toggle("scroll-lock");
        document.getElementById('menu-primary-menu').classList.toggle("hide-xs-down");
        document.getElementById('menu-primary-menu').classList.toggle("hide-xs");
        document.getElementById('menu-primary-menu').classList.toggle("hide-sm");
        if (navToggle.innerHTML.trim() === "Menu") {
            navToggle.innerHTML = "Close Menu";
        } else if (navToggle.innerHTML.trim() === "Close Menu") {
            navToggle.innerHTML = "Menu";
        }
    }
})();
