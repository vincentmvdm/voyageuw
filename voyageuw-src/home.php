<?php get_header(); ?>
<section id="blog-posts" class="py2">
	<div class="container">
		<div class="container-inner">
				<?php
				$counter = 0;
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); ?>
						<?php if ($counter !== 0) { ?>
							<div class="col-full">
								<hr>
							</div>
						<?php } ?>
						<?php $counter++; ?>
						<article class="dim py8">
							<div class="flex flex-wrap">
								<div class="col-one-half">
									<a href="<?php the_permalink(); ?>">
										<div class="aspect-ratio-3x2">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="placeholder">
										</div>
									</a>
								</div>
								<div class="col-one-half">
									<div class="h-100 flex-sm-up items-center">
										<a href="<?php the_permalink(); ?>">
											<div class="tc-xs-down">
												<h2 class="h1 mt6 mt0-sm-up mb2"><?php the_title(); ?></h3>
												<span class="article-author">By <?php the_author(); ?> &middot; <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
												<div class="measure">
													<p class="mt4 mb0">
														<?php echo get_the_excerpt(); ?>
													</p>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</article>

					<?php } ?>
					<div class="col-full pt2 pb8">
						<div class="flex justify-between">
							<div class="self-start"><?php next_posts_link( 'Older posts' ); ?></div>
							<div class="self-end"><?php previous_posts_link( 'Newer posts' ); ?></div>
						</div>
					</div>
				<?php
				}
				?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
