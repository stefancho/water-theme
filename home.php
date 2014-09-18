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
<div class="main-container">
	<div class="container1">
		<div id="mySlides">
			<div id="slide1">
				<img src="<?php echo get_template_directory_uri();?>/images/home-page.jpg" alt="liderdynamic home page" /> <span><b
					class="slideheading">Добре Дошли</b><br />Да Ви върви по вода!</span>
			</div>
		</div>

		<div id="myController">
			<span class="jFlowControl"></span> <span class="jFlowControl"></span>
			<span class="jFlowControl"></span>
		</div>
		
		<br /> <br />

		<article class="box" id="home_featured21">
			<div class="block">
				<h2>За нас</h2>
				<p>
					Фирма "Лидер Динамик" ЕООД е създадена през 2008 година с
					основен предмет на дейност изграждане на външни ВиК мрежи и съоръжения.
					Фирмата разполага със собствена техника, свързана с предмета на дейност. 
					Имаме множество завършени <a href="proekti">проекти</a> зад гърба си.
				</p>
			</div>
		

			<div class="block">
				<h2>Дейност</h2>
				<p>
					Изграждане на външни и магистрални  водопроводни и канализационни  мрежи и съоръжения,
 					помпени, пречиствателни и хидрофорни станции, водохващане и водоеми, вертикална планировка, груб строеж.
				</p>
			</div>
			
			<div class="block last">
				<h2>ВиК Услуги </h2>
				Изграждане на:
				<ul>
					<li>външни - площадкови, улични и магистрални  водопроводни и канализационни мрежи и съоръжения</li>
					<li>противопожарни водопроводи и инсталации</li>
					<li>напоителни системи и съоръжения</li>
					<li>инсталации за сгъстен въздух</li>
					<li>изкопно-насипни работи</li>
					<li>направа вертикална планировка</li>
				</ul>
			</div>
			<div class="clear"></div>
		</article>

	</div>

	<br />
	<br />

	<!-- 
	<div class="container2">
		<article id="home_featured2">
			<?php 
				if(have_posts()):
					while (have_posts()):
						the_post();
			?>
			<ul>
			
				<li>
					<div class="imgholder">
						<a href="images/slide1.jpg" data-gal="prettyPhoto[featured]"
							title="First Featured Title"><img src="<?php echo get_template_directory_uri();?>/images/featured1.jpg"
							width="275" height="145" alt="" /></a>
					</div>
					<h4><?php the_title();?></h4>

					<p><?php the_content();?></p>
				</li>
		
			</ul>
			<?php 
					endwhile;
					endif;
			?>

			<br class="clear" />
		</article>
	</div>
	 -->
</div>
<div class="main-container"></div>

<?php 
	get_footer();
?>
