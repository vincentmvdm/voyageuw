<?php get_header(); ?>

    <section id="introduction" class="py10">
        <div class="container">
            <div class="container-inner">
                <div class="col-full">
                    <div class="measure center tc">
                        <?php
                            if ( have_posts() ) {
                                while ( have_posts() ) {
                                    the_post(); ?>
                                    <h2 class="h1 mt0"><?php echo get_the_title(); ?></h2>
                                    <p class="mt4 mb0">
                                        <?php echo wp_strip_all_tags( get_the_content() ); ?>
                                    </p>
                                <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="recent-issues" class="bg-gray">
        <div class="container">
            <div class="container-inner">
                <div class="col-full pt10 pb2 tc">
                    <h2 class="h1 mt0">Recent Issues</h2>
                </div>
                <div class="flex flex-wrap justify-center">
                    <?php
                        $args = array( 'post_type' => 'voyageuw_issue', 'posts_per_page' => 3 );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="col-one-third mt8">
                                <div class="dim">
                                    <a href="<?php echo get_post_meta($loop->post->ID, '_voyageuw_issue_link', true); ?>">
                                        <img src="<?php echo esc_url( get_the_post_thumbnail_url($loop->post->ID) ); ?>" alt="<?php echo get_the_title(); ?>">
                                    </a>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    ?>
                </div>
                <div class="col-full py10 tc">
                    <a href="https://issuu.com/voyageuw" class="btn black bg-animate hover-bg-black hover-white">View all issues</a>
                </div>
            </div>
        </div>
    </section>

    <section id="recent-posts">
        <div class="container">
            <div class="container-inner">
                <div class="col-full pt10 pb2 tc">
                    <h2 class="h1 mt0">Recent Posts</h2>
                </div>
                <div class="flex flex-wrap justify-center">
                    <?php
                        $args = array('numberposts' => '3');
                        $recent_posts = wp_get_recent_posts($args);
                        foreach ($recent_posts as $recent) { ?>
                            <div class="col-one-third mt8">
                                <a href="<?php echo esc_url( get_permalink($recent['ID']) ); ?>">
                                    <article class="article">
                                        <div class="aspect-ratio-4x3">
                                            <img src="<?php echo esc_url( get_the_post_thumbnail_url($recent['ID']) ); ?>" alt="<?php echo $recent['post_title']; ?>">
                                        </div>
                                        <div class="tc">
                                            <h3 class="h2 mt6 mb2"><?php echo $recent['post_title']; ?></h3>
                                            <span class="article-author">By <?php echo get_the_author_meta('first_name', $recent['post_author']) . " " . get_the_author_meta('last_name', $recent['post_author']); ?> &middot; <?php echo human_time_diff( get_the_time('U', $recent['ID']), current_time('timestamp') ) . ' ago'; ?></span>
                                            <p class="mb0 mt4"><?php echo wp_trim_words($recent['post_content'], 16); ?></p>
                                        </div>
                                    </article>
                                </a>
                            </div>
                    <?php
                        }
                        wp_reset_query();
                    ?>
                </div>
                <div class="col-full py10 tc">
                    <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="btn black bg-animate hover-bg-black hover-white">View all articles</a>
                </div>
            </div>
        </div>
    </section>

    <section id="essays">
        <div class="flex flex-wrap justify-center">
            <div class="spread spread-left flex justify-center justify-end-lg-up bg-gray">
                <div class="spread-inner py10 tc">
                    <div class="measure center">
                        <h2 class="h1 mt0">Love writing?</h2>
                        <p class="mt4 mb0">
                            Mulling over the idea of writing about your most recent adventure? If mountains, forests, and bustling cities inspire you to pull out your pen and journal, then consider writing for us!
                        </p>
                    </div>
                    <a href="./submit-writing" class="btn black bg-animate hover-bg-black hover-white mt6">Share your story</a>
                </div>
            </div>
            <div class="spread spread-right flex justify-center justify-start-lg-up bg-blue">
                <div class="spread-inner py10 tc">
                    <div class="measure center">
                        <h2 class="h1 mt0 white">Love photography?</h2>
                        <p class="mt4 mb0 white">
                            From pristine landscapes to crowded squares and wild donkeys, a collection of photos can bring a story to life. We’d love to see the photos that we know you’re dying to share!
                        </p>
                    </div>
                    <a href="./submit-photos" class="btn btn-white white bg-animate hover-bg-white hover-black mt6">Share your story</a>
                </div>
            </div>
        </div>
    </section>

    <section id="instagram" class="bg-light-gray">
        <div class="container">
            <div class="container-inner">
                <div class="col-full pt10 pb2 pb7-xs-up pb6-sm-up pb4-lg-up tc">
                    <h2 class="h1 mt0">On Instagram</h2>
                    <p class="mt2 mb0">
                        Follow students adventures at <a href="https://www.instagram.com/voyage_uw/" class="link dim">@voyage_UW</a>. <br>Use <a href="https://www.instagram.com/explore/tags/voyageuw/" class="link dim">#VoyageUW</a> to be featured.
                    </p>
                </div>
                <div id="instagram-feed" class="flex flex-wrap justify-center">
                </div>
                <div class="col-full py10 tc">
                    <a href="https://www.instagram.com/voyage_uw/" class="btn black bg-animate hover-bg-black hover-white">View all photos</a>
                </div>
            </div>
        </div>
    </section>

    <section id="sponsors" class="bg-gray">
        <div class="container">
            <div class="container-inner">
                <div class="col-full pt10 pb2 pb7-xs-up pb6-sm-up pb4-lg-up tc">
                    <h2 class="h1 mt0">Our Sponsors</h2>
                </div>
                <div class="flex flex-wrap justify-center">
                    <?php
                        $args = array( 'post_type' => 'voyageuw_sponsor', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC');
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="col-one-fourth mtg">
                                <div class="aspect-ratio-2x1 sponsor">
                                    <a href="<?php echo get_post_meta($loop->post->ID, '_voyageuw_sponsor_website', true); ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="<?php echo get_the_title(); ?>">
                                    </a>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    ?>
                </div>
                <div class="col-full py10 tc">
                    <a href="/sponsor-us" class="btn black bg-animate hover-bg-black hover-white">Become a sponsor</a>
                </div>
            </div>
        </div>
    </section>

    <section id="newsletter" class="bg-blue py10">
        <div class="container">
            <div class="container-inner">
                <div class="col-full">
                    <div class="measure center tc pb4 pb8-sm-up">
                        <h2 class="h1 mt0 white">Want to follow our adventures?</h2>
                        <p class="mt2 mb0 white">Receive weekly newsletters from Voyage UW on Monday mornings.</p>
                    </div>
                    <div id="signup-area">
                        <form action="https://voyageuw.us14.list-manage.com/subscribe/post" method="POST">
                            <div class="flex flex-wrap justify-center">
                                <input type="hidden" name="u" value="0057c68f931cdb7f98a02e351">
                                <input type="hidden" name="id" value="3ab85478cc">
                                <input type="text" name="MERGE1" placeholder="Name" class="mt4 mt0-sm-up">
                                <input type="text" name="MERGE0" placeholder="E-mail" class="mt4 mt0-sm-up">
                                <input type="submit" class="btn btn-white white bg-animate hover-bg-white hover-black mt5 mt0-sm-up" value="Send me letters">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
