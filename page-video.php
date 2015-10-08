<?php get_header(); ?>

	<div class="grid clearfix">

	<?php
	if (have_posts()):
		while (have_posts()): the_post(); ?>

		<?php
		$the_query = new WP_Query('category_name=video');
		while ( $the_query->have_posts() ) :
				$the_query->the_post(); ?>

			<?php $src = get_the_excerpt(); ?>

			<iframe src="<?php echo $src; ?>" width="2000" height="580" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

			<div class="vimeoVid">
				<h1><?php the_title(); ?></h1>
				<div class="vimeoDescription hideContent">
					<?php the_content(); ?>
				</div><!-- /vimeoDescription hideContent -->
				<div class="showMore">
					<hr>
					<p class="expand">Show More</p>
				</div><!-- /showMore -->
			</div><!-- /vimeoVid -->

		<?php
			endwhile;
			wp_reset_postdata();
		?>
			
		<?php endwhile;
			else: 
				echo '<p>No Content Found<p>';
			endif;
		?>

	</div><!-- /grid clearfix -->

<?php get_footer(); ?>