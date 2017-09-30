(function() {
    "use strict";

    window.addEventListener("load", function load(event){
        window.removeEventListener("load", load, false);
        document.getElementById('shareBtn').onclick = function() {
          FB.ui({
            method: 'share',
            display: 'popup',
            href: window.location.href,
          }, function(response){});
        }
    }, false);
})();
