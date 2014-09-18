<?php get_header();?>

<div class="main-container">
	<div id="nav-container">
		 <?php
			wp_nav_menu ( array (
					'theme_location' => 'telerk-top-menu',
					'container' => 'nav',
					'menu_class' => 'nav' 
			) )?>
		<div class="clear"></div>
	</div>
</div>

<div class="main-container">
	<div id="sub-headline">
		<div class="tagline_left">
			<p id="tagline2">
				Tel: 0897815506 | Mail: <a href="mailto:lider.dinamik@gmail.com">lider.dinamik@gmail.com</a>
			</p>
		</div>
		<br class="clear" />
	</div>
</div>

<div class="main-container">
	<div class="container1">
		<div class="box">
			<div class="content">
				<h1>Свържете се с нас</h1>

				<form action="#" method="post">
					<noscript>
						<p>
							<input type="hidden" name="nojs" id="nojs" />
						</p>
					</noscript>


					<br/>

					<p>
						<input type="text" name="name" id="name" value="" size="22" /> <label
							for="name"> <small>Name (required)</small>
						</label>
					</p>
					<p>
						<input type="text" name="email" id="email" value="" size="22" /> <label
							for="email"> <small>Mail (required)</small>
						</label>
					</p>
					<p>
						<textarea name="comments" id="comments" rows="10"></textarea>
						<label for="comments" style="display: none;"> <small>Comment
								(required)</small>
						</label>
					</p>
					<p>
						<input name="submit" type="submit" id="submit" value="Submit Form" />
						&nbsp; <input name="reset" type="reset" id="reset" tabindex="5"
							value="Reset Form" />
					</p>
				</form>

			</div>

			<div class="clear"></div>
		</div>
	</div>
</div>

<?php get_footer();?>