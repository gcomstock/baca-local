<?php get_header(); ?>

<?php
if (have_posts()):
	while (have_posts()): the_post(); ?>

	<div class="grid" id="aboutGrid">
		<div class="about">
			<div class="about-desktop">
				<?php the_post_thumbnail(); ?>
			</div><!-- /desktop -->
			<div class="about-mobile"></div><!-- /mobile -->
			<?php the_content(); ?>
		</div><!-- /wrapper-about -->
	</div><!-- /grid clearfix -->

<?php endwhile; endif; ?>
<?php get_footer(); ?>