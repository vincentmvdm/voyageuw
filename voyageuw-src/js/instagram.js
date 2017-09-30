(function() {
    "use strict";

    var userFeed = new Instafeed({
        get: 'user',
        limit: '8',
        userId: '2328679425',
        resolution: 'standard_resolution',
        sort: 'most-recent',
        target: 'instagram-feed',
        accessToken: '2328679425.1677ed0.0dc9210f0aa24c2abc96d7d4c9b7433e',
        template: '<div class="col-one-fourth mtg"><a href="{{link}}"><div class="aspect-ratio-1x1"><div class="no-spotlight"><img src="{{image}}" alt="An Instagram post by Voyage UW" /></div></div></a></div>'
    });
    userFeed.run();
})();
