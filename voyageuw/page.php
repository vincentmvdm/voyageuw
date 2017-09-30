<?php get_header(); ?>

<div class="container">
	<div class="container-inner">
		<div class="col-full">
			<div class="measure center">
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); ?>
						<?php the_content(); ?>
					<?php }
				}
				?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
