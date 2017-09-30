<?php if ( !is_home() && !is_single() ) { ?>

    <section id="hero">
        <?php if ( is_front_page() ) { ?>

            <ul id="hero-slides" class="h-100">
                <?php
                    $args = array( 'post_type' => 'voyageuw_slide', 'posts_per_page' => -1 );
                    $loop = new WP_Query( $args );
                    $slides = [];
                    $nSlides = 0;
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $slides[$nSlides] = [];
                        $slides[$nSlides]["title"] = $loop->post->post_title;
                        $slides[$nSlides]["description"] = $loop->post->post_content;
                        $slides[$nSlides]["link"] = get_post_meta( $loop->post->ID, '_voyageuw_slide_link', true );
                        $slides[$nSlides]["prompt"] = get_post_meta( $loop->post->ID, '_voyageuw_slide_prompt', true );
                        $slides[$nSlides]["thumbnail"] = get_the_post_thumbnail_url( $loop->post->ID );
                        $nSlides++;
                    endwhile;
                ?>

                <?php for ($i = 0; $i < $nSlides; $i++) { ?>

                    <li style="background: url('<?php echo $slides[$i]['thumbnail']; ?>') no-repeat center bottom;" class="flex">
                        <div class="scrim h-100">
                            <div class="container h-100">
                                <div class="container-inner h-100 flex justify-center items-center">
                                    <div class="col-full tc">
                                        <h1 class="h0 mt0"><?php echo $slides[$i]['title'] ?></h1>
                                        <a href="<?php echo $slides[$i]['link']; ?>" class="btn btn-primary mt6"><?php echo $slides[$i]['prompt']; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                <?php } ?>
            </ul>

            <ul id="hero-pagination">
                <?php for ($i = 0; $i < $nSlides; $i++) { ?>
                    <li class="pagination-item"></li>
                <?php } ?>
            </ul>

        <?php } else { ?>

            <ul id="hero-slides">
                <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post(); ?>

                            <li style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') no-repeat center bottom;" class="flex">
                                <div class="scrim h-100">
                                    <div class="container h-100">
                                        <div class="container-inner h-100 flex justify-center items-center">
                                            <div class="col-full tc">
                                                <h1 class="h0 mt0"><?php the_title(); ?></h1>
                                                <?php if ( is_page_template("writers.php") || is_page_template("photographers.php")) { ?>
                                                    <a class="btn btn-primary mt6" href="#contact">Share your story &darr;</a>
                                                <?php } else if (is_page_template("sponsors.php")){ ?>
                                                    <a class="btn btn-primary mt6" href="#contact">Contact us &darr;</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        <?php }
                    }
                ?>
            </ul>

        <?php } ?>

        <?php if ( is_page_template() ) { ?>
            <div class="flex flex-wrap justify-center hide-xs-down hide-xs hide-sm hide-md" id="hero-alt">
                <div class="spread spread-left flex justify-center justify-end-lg-up ">
                    <div class="spread-inner py12 tc flex items-center">
                        <div class="measure center">
                            <?php
                            if ( have_posts() ) {
                                while ( have_posts() ) {
                                    the_post();
                                    ?>
                                    <h1 class="h0 mt0">
                                        <?php the_title(); ?>
                                    </h1>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        ?>
                        <div class="spread spread-right flex justify-center justify-start-lg-up cover" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') center;">
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

        <?php } ?>

    </section>

<?php } ?>
