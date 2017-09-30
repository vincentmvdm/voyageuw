<?php /* Template Name: Voyage UW For Photographers Page */ ?>

<?php get_header(); ?>

<section id="photo-brief">
    <div class="container">
        <div class="container-inner">
            <div class="col-full py10">
                <div class="measure center tc pb4">
                    <h2 class="h1 mt0">Photo Essay Proposals</h2>
                </div>
                <div class="measure center">
                    <?php
                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post(); ?>
                                <p class="my0 measure center">
                                    <?php echo wp_strip_all_tags( get_the_content() ); ?>
                                </p>
                            <?php
                            }
                        }
                    ?>
                    <div class="tc">
                        <a class="btn black bg-animate hover-bg-black hover-white mt6 hide-xs-down hide-xs hide-sm hide-md" href="#contact">Share Your Story &darr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="photo-examples" class="py10 bg-blue">
    <div class="container">
        <div class="container-inner">
            <div class="col-full pb2 pb7-xs-up pb6-sm-up pb4-lg-up tc">
                <div class="measure center tc">
                    <h2 class="h1 mt0 white">Examples from Issue #2</h2>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="col-one-half mtg">
                    <a href="<?php echo get_template_directory_uri(); ?>/images/photoessay_1.png">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/photoessay_1.png" alt="A photo essay example from Issue #1">
                    </a>
                </div>
                <div class="col-one-half mtg">
                    <a href="<?php echo get_template_directory_uri(); ?>/images/photoessay_2.png">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/photoessay_2.png" alt="A photo essay example from Issue #1">
                    </a>
                </div>
                <div class="col-one-half mtg">
                    <a href="<?php echo get_template_directory_uri(); ?>/images/photoessay_3.png">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/photoessay_3.png" alt="A photo essay example from Issue #1">
                    </a>
                </div>
                <div class="col-one-half mtg">
                    <a href="<?php echo get_template_directory_uri(); ?>/images/photoessay_4.png">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/photoessay_4.png" alt="A photo essay example from Issue #1">
                    </a>
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
                        <h2 class="h1 mt0">Submit a Photo Essay Proposal</h2>
                    </div>
                    <?php echo do_shortcode("[contact-form-7 id='42' title='Photo Essays']"); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
