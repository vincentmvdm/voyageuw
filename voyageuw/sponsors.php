<?php /* Template Name: Voyage UW Sponsor Page */ ?>
<?php get_header(); ?>

<section id="sponsor-introduction" class="py10">
    <div class="container">
        <div class="container-inner">
            <div class="col-full">
                <div class="measure center tc pb1">
                    <h2 class="h1 mt0">Sponsoring Voyage</h2>
                </div>
                <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post(); ?>
                            <div class="measure center">
                                <?php the_content(); ?>
                            </div>
                        <?php
                        }
                    }
                ?>
                <div class="pt5">
                    <div class="flex flex-wrap justify-center">
                        <div class="col-one-half">
                            <a href="/sponsorshippacket.pdf">
                                <div class="dim">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/scpacket-front.jpg" alt="Sponsorship Packet">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="py10 bg-gray">
    <div class="container">
        <div class="container-inner">
            <div class="col-full">
                <div class="measure center tc">
                    <div class="pb4">
                        <h2 class="h1 mt0">Contact Us</h2>
                    </div>
                    <?php echo do_shortcode("[contact-form-7 id='37' title='Sponsors']"); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
