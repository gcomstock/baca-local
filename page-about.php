<?php get_header(); ?>

<?php
if (have_posts()):
	while (have_posts()): the_post(); ?>

	<div class="grid" id="aboutGrid">
		<div class="wrapper-about">
			<div class="about clearfix">
				<div class="bioName">
					<h1 class="michael">michael baca</h1>
					<h1 class="michael-mobile">about me</h1>
				</div><!-- /bioName -->
				<div class="bioLeft">
					<?php the_post_thumbnail(); ?>
					
					<?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt;				
					    if(!empty($get_description)){//If description is not empty show the div
					    echo '<p class="bioCredit">' . get_post(get_post_thumbnail_id())->post_excerpt . '</p>'; ?>
					 <?php } else { ?>
					  	<div class="nobioCredit"></div><!-- /nobioCredit -->
					<?php  }
					?>	
				</div><!-- /bioLeft -->
				<div class="bioRight">
					<?php the_content(); ?>
				</div><!-- /bioRight -->
			</div><!-- /about -->

			<hr class="aboutRow">

			<div class="row">
					<div class="col col-md-4">
						<div class="contact">
							<h1><?php the_field("contact") ?></h1>
							<?php the_field("contact_content"); ?>
						</div><!-- /contact -->
						
					</div><!-- /col1 -->

					<div class="col col-md-4">
						<div class="contact">
							<h1><?php the_field("find_me_on_the_internet"); ?></h1>
							<?php the_field('find_me_on_the_internet_content'); ?>
						</div><!-- /contact -->
					</div><!-- /col2 -->

					<div class="col col-md-4 colLast">
						<div class="contact">
							<h1>request work</h1>
							<p>Name:</p><input type="text">
							<p>Subject:</p><input type="text">
							<p>Description:</p><textarea name="description" id="description" cols="18" rows="4"></textarea>
						</div><!-- /contact -->
					</div><!-- /col3 -->
			</div><!-- /row -->
		</div><!-- /wrapper-about -->
	</div><!-- /grid clearfix -->

<?php endwhile; endif; ?>
<?php get_footer(); ?>