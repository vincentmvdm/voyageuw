<?php get_header(); ?>


<div class="container">
	<div class="container-inner">
		<div class="col-full pt10 pb8">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post(); ?>
					<div class="measure center">
						<h1 class="mt0"><?php echo the_title(); ?></h1>
						<p class="mt2 mb0">By <?php the_author(); ?> &middot; <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></p>
					</div>
				<?php }
			}
			?>
		</div>
	</div>
</div>

<div class="container">
	<div class="container-inner">
		<div class="col-full mx0-xs-down">
			<div class="max-width-single center">
				<div class="aspect-ratio-3x2">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="placeholder">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="container-inner">
		<div class="col-full pt5 pb10">
			<div id="blog-post" class="measure center">
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); ?>
						<?php the_content(); ?>
					<?php }
				}
				?>
			</div>
			<div class="measure center mt6">
				<div class="dim">
					<div class="circle">
						<div class="h-100 flex justify-center items-center">
							<i class="fa fa-facebook" id="shareBtn"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
