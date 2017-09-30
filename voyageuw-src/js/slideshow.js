(function() {
    "use strict";

    var activeSlide;
    var nextSlide;
    var timeout = 10000;
    var timer = null;

    window.addEventListener("load", function load(event){
        window.removeEventListener("load", load, false);
        activeSlide = 0;
        nextSlide = 1;
        var pages = document.querySelectorAll("#hero-pagination li");
        for (var i = 0; i < pages.length; i++) {
            pages[i].onclick = (function(j) {
                return function() {
                    if (j !== activeSlide) {
                        clearTimeout(timer);
                        jQuery("#hero-slides li").stop(false, true, false);
                        nextSlide = j;
                        showSlide();
                    }
                }
            })(i);
        }
        timer = setTimeout(showSlide, timeout);
    }, false);

    function showSlide() {
        if (nextSlide === document.querySelectorAll("#hero-slides li").length) {
            nextSlide = 0;
        }
        jQuery("#hero-slides li:nth-child(" + (nextSlide + 1) + ")").css('visibility', 'visible');
        jQuery("#hero-slides li:nth-child(" + (activeSlide + 1) + ")").fadeTo(400, 0, function() {
            jQuery("#hero-slides li:nth-child(" + (activeSlide + 1) + ")").css('visibility', 'hidden');
            document.querySelector("#hero-pagination li:nth-child(" + (activeSlide + 1) + ")").style.opacity = 0.5;
        });
        document.querySelector("#hero-pagination li:nth-child(" + (nextSlide + 1) + ")").style.opacity = 1;
        jQuery("#hero-slides li:nth-child(" + (nextSlide + 1) + ")").fadeTo(400, 1, function() {
            activeSlide = nextSlide;
            nextSlide = activeSlide + 1;
            timer = setTimeout(showSlide, timeout);
        });
    }
})();
