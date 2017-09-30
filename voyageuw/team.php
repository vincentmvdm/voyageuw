<?php /* Template Name: Voyage UW Team Page */ ?>
<?php get_header(); ?>

<section id="team-introduction">
    <div class="container">
        <div class="container-inner">
            <div class="col-full py10">
                <div class="measure center">
                    <?php
                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post(); ?>
                                <div class="pb4 tc">
                                    <h2 class="h1 mt0">We Create Voyage</h2>
                                </div>
                                <p class="my0 measure center">
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

<section id="team-overview" class="pt2 pb10 bg-gray">
    <div class="container">
        <div class="container-inner">
            <div class="flex flex-wrap">
                <?php
                $args = array( 'post_type' => 'voyageuw_member', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="col-one-third mt8">
                        <div class="aspect-ratio-1x1">
                            <img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="<?php echo get_the_title($loop->post->ID); ?>">
                        </div>
                        <h3 class="h2 mt4 mb1"><?php echo get_the_title($loop->post->ID); ?></h3>
                        <span><?php echo get_post_meta($loop->post->ID, '_voyageuw_member_position', true); ?></span>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
