<?php
get_header();
?>

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

<?php 
if (have_posts()) :
	the_post();
?>

<div class="main-container">
	<div class="container1">
		<div class="box">
			<h1><?php echo the_title();?></h1>
	
			<?php echo the_content();?>
			<div class="clear"></div>
		</div>
		<div id="gallery" class="box">
            	<?php
					$img_urls = get_post_image_urls($post);
					if($img_urls) :
						foreach ($img_urls as $img_url) :
							echo '<li>';
						
				?>
					<a data-gal="prettyPhoto[gallery2]"
					href="<?php echo $img_url?>"><img src="<?php echo $img_url?>"/>
					</a>
				<?php 
							echo '</li>';
						endforeach;
						echo '</ul>';
					endif;
				?>
			<br class="clear" />
		</div>
	</div>
</div>

<?php 
endif;
get_footer();
?>