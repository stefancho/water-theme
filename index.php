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
		<h1>Изминали проекти</h1>

		<div class="box">
			<?php 
				if(have_posts()):
					while (have_posts()):
						the_post();
			?>
			<div class="portfolio">
				<div class="tagline_left">
					<h2><?php the_title();?></h2>

					<?php the_content();?>

					<p>&nbsp;</p>
				</div>
				<div class="tagline_right">
					<a href="<?php echo get_template_directory_uri();?>/images/folio.jpg" data-gal="prettyPhoto" title="Title"><img
						src="<?php echo get_template_directory_uri();?>/images/folio.jpg" alt="" /></a>
				</div>
				<div class="clear"></div>
			</div>
			<?php 
					endwhile;
					endif;
			?>
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php get_footer();?>