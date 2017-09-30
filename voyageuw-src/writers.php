<?php /* Template Name: Voyage UW For Writers Page */ ?>
<?php get_header(); ?>

<section id="writing-brief" class="py10">
    <div class="container">
        <div class="container-inner">
            <div class="col-full">
                <div class="measure center">
                    <div class="tc pb4">
                        <h2 class="h1 mt0">Travel Essay Proposals</h2>
                    </div>
                    <?php
                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post(); ?>
                                <p class="mt0 mb0 measure center">
                                    <?php echo wp_strip_all_tags( get_the_content() ); ?>
                                </p>
                            <?php
                            }
                        }
                    ?>
                    <div class="tc">
                        <a class="btn black bg-animate hover-bg-black hover-white mt6 hide-xs-down hide-xs hide-sm hide-md" href="#contact">Share your story &darr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="writing-clips" class="py10 bg-gray">
    <div class="container">
        <div class="container-inner">
            <div class="col-full">
                <div class="measure center tc pb2">
                    <h2 class="h1 mt0">Story Clips We’ve Previously Enjoyed</h2>
                </div>
            </div>
            <div class="flex flex-wrap justify-center">
                <div class="col-one-third mt8">
                    <h3 class="h2 mt0 mb1">A New Hope?</h3>
                    <div class="mb4">
                        Chetanya Robinson
                    </div>
                    <blockquote>
                        &ldquo;When I visited Luke Skywalker’s house in the summer of 2014, I was hit by a couple of surprises.&rdquo;
                    </blockquote>
                </div>
                <div class="col-one-third mt8">
                    <h3 class="h2 mt0 mb1">Rialto</h3>
                    <div class="mb4">
                        Daniel Green
                    </div>
                    <blockquote>
                        &ldquo;That’s when you smell the ocean. The salty sea air washes over you, relieving the taut muscles of a strung-out city face. My mother had always said that saltwater could heal anything, and while modern medicine may frown upon this claim, the scent of the ocean alone was enough to ease the stress throughout my body.&rdquo;
                    </blockquote>
                </div>
                <div class="col-one-third mt8">
                    <h3 class="h2 mt0 mb1">On Shaky Ground</h3>
                    <div class="mb4">
                        Julia Sanders
                    </div>
                    <blockquote>
                        &ldquo;Three months into an eight-month expedition in Nepal, Ian Bellows experienced what most travelers and climbers would consider a nightmare –– an earthquake.&rdquo;
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="writing-examples" class="py10 bg-blue">
    <div class="container">
        <div class="container-inner">
            <div class="col-full pb2 pb7-xs-up pb6-sm-up pb4-lg-up tc">
                <h2 class="h1 mt0 white">Examples from Issue #2</h2>
            </div>
            <div class="flex flex-wrap">
                <div class="col-one-half mtg">
                    <a href="<?php echo get_template_directory_uri(); ?>/images/travelessay_1.png">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/travelessay_1.png" alt="A travel essay example from Issue #1">
                    </a>
                </div>
                <div class="col-one-half mtg">
                    <a href="<?php echo get_template_directory_uri(); ?>/images/travelessay_2.png">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/travelessay_2.png" alt="A travel essay example from Issue #2">
                    </a>
                </div>
                <div class="col-one-half mtg">
                    <a href="<?php echo get_template_directory_uri(); ?>/images/travelessay_3.png">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/travelessay_3.png" alt="A travel essay example from Issue #1">
                    </a>
                </div>
                <div class="col-one-half mtg">
                    <a href="<?php echo get_template_directory_uri(); ?>/images/travelessay_4.png">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/travelessay_4.png" alt="A travel essay example from Issue #2">
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="contact" class="bg-gray">
    <div class="container">
        <div class="container-inner">
            <div class="col-full py10">
                <div class="measure center tc">
                    <div class="pb4">
                        <h2 class="h1 mt0">Submit a Travel Essay Proposal</h2>
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="39" title="Essays"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
