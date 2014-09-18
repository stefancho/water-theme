<?php get_header();?>

<div class="main-container">
	<div id="nav-container">
		 <?php 
		 	wp_nav_menu(array(
		 		'theme_location' => 'telerk-top-menu',
		 		'container' => 'nav',
		 		'menu_class' => 'nav'
		 	))
		 ?>
		<div class="clear"></div>
	</div>
</div>

<div class="main-container">
	<div class="container1">
		<h1>Завършени проекти</h1>
		<div class="box">
			<?php
			$post_query = new WP_Query ( array (
					'post_type' => 'post' 
			) );
			if ($post_query->have_posts ()) :
				while ( $post_query->have_posts () ) :
					$post_query->the_post ();

			?>
			<div class="portfolio">
				<div class="tagline_left">
					<h2><a href="<?php the_permalink();?>"><?php the_title();?>
					</a></h2>

					<?php the_content();?>

					<p>&nbsp;</p>
				</div>
				<?php
					$img_urls = get_post_image_urls($post);
					if(count($img_urls) > 0) :
				?>
				<div class="tagline_right">
					<a href="<?php the_permalink()?>">
						<img src="<?php echo $img_urls[0];?>"/>
					</a>
				</div>
				<?php endif;?>
				<div class="clear"></div>
			</div>
			<?php
					endwhile;
					endif;
					wp_reset_postdata();
			?>
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php get_footer();?>