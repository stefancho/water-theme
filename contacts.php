<?php
/*
 Template Name: contacts
*/

$yourEmail = "lider.dinamik@gmail.com"; // the email address you wish to receive these mails through
$yourWebsite = "liderdynamic.bg"; // the name of your website
$maxPoints = 4; // max points a person can hit before it refuses to submit - recommend 4
$requiredFields = "yourname,email,comments"; // names of the fields you'd like to be required as a minimum, separate each field with a comma


// DO NOT EDIT BELOW HERE
$error_msg = null;
$result = null;

$requiredFields = explode(",", $requiredFields);

function clean($data)
{
	$data = trim(stripslashes(strip_tags($data)));
	return $data;
}

function isBot()
{
	$bots = array("Indy", "Blaiz", "Java", "libwww-perl", "Python", "OutfoxBot", "User-Agent", "PycURL", "AlphaServer", "T8Abot", "Syntryx", "WinHttp", "WebBandit", "nicebot", "Teoma", "alexa", "froogle", "inktomi", "looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory", "Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot", "crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz");

	foreach ($bots as $bot)
		if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false)
			return true;

		if (empty($_SERVER['HTTP_USER_AGENT']) || $_SERVER['HTTP_USER_AGENT'] == " ")
			return true;

		return false;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isBot() !== false)
		$error_msg .= "No bots please! UA reported as: " . $_SERVER['HTTP_USER_AGENT'];

	// lets check a few things - not enough to trigger an error on their own, but worth assigning a spam score..
	// score quickly adds up therefore allowing genuine users with 'accidental' score through but cutting out real spam :)
	$points = (int)0;

	$badwords = array("adult", "beastial", "bestial", "blowjob", "clit", "cum", "cunilingus", "cunillingus", "cunnilingus", "cunt", "ejaculate", "fag", "felatio", "fellatio", "fuck", "fuk", "fuks", "gangbang", "gangbanged", "gangbangs", "hotsex", "hardcode", "jism", "jiz", "orgasim", "orgasims", "orgasm", "orgasms", "phonesex", "phuk", "phuq", "pussies", "pussy", "spunk", "xxx", "viagra", "phentermine", "tramadol", "adipex", "advai", "alprazolam", "ambien", "ambian", "amoxicillin", "antivert", "blackjack", "backgammon", "texas", "holdem", "poker", "carisoprodol", "ciara", "ciprofloxacin", "debt", "dating", "porn", "link=", "voyeur", "content-type", "bcc:", "cc:", "document.cookie", "onclick", "onload", "javascript");

	foreach ($badwords as $word)
		if (
				strpos(strtolower($_POST['comments']), $word) !== false ||
				strpos(strtolower($_POST['yourname']), $word) !== false
		)
			$points += 2;

		if (strpos($_POST['comments'], "http://") !== false || strpos($_POST['comments'], "www.") !== false)
			$points += 2;
		if (isset($_POST['nojs']))
			$points += 1;
		if (preg_match("/(<.*>)/i", $_POST['comments']))
			$points += 2;
		if (strlen($_POST['yourname']) < 3)
			$points += 1;
		if (strlen($_POST['comments']) < 15 || strlen($_POST['comments'] > 1500))
			$points += 2;
		// end score assignments

		foreach ($requiredFields as $field) {
			trim($_POST[$field]);

			if (!isset($_POST[$field]) || empty($_POST[$field]))
				$error_msg .= "Моля попълнете всички необходими полета.\r\n";
		}

		if (!preg_match("/^[a-zA-Z-'\s]*$/", stripslashes($_POST['yourname'])))
			$error_msg .= "The name field must not contain special characters.\r\n";
		if (!preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', strtolower($_POST['email'])))
			$error_msg .= "That is not a valid e-mail address.\r\n";
		if (!empty($_POST['url']) && !preg_match('/^(http|https):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i', $_POST['url']))
			$error_msg .= "Invalid website url.\r\n";
		if( function_exists('cptch_check_custom_form') && cptch_check_custom_form() !== true ) 
			$error_msg =  'Моля въведете числото';
		
		if ($error_msg == NULL && $points <= $maxPoints) {
			$subject = "Automatic Form Email";

			$message = "Този мейл е изпратено от сайта Ви: \n\n";
			foreach ($_POST as $key => $val) {
				$message .= ucwords($key) . ": " . clean($val) . "\r\n";
			}
			$message .= "\r\n";
			$message .= 'IP: ' . $_SERVER['REMOTE_ADDR'] . "\r\n";
			$message .= 'Browser: ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
			$message .= 'Points: ' . $points;

			if (strstr($_SERVER['SERVER_SOFTWARE'], "Win")) {
				$headers = "From: $yourEmail\n";
				$headers .= "Reply-To: {$_POST['email']}";
			} else {
				$headers = "From: $yourWebsite <$yourEmail>\n";
				$headers .= "Reply-To: {$_POST['email']}";
			}


			if (mail($yourEmail, $subject, $message, $headers)) 
			{
				$result = 'Съобщението ви беше одобрено за изпращане';
				$disable = true;	
			} else {

				$error_msg = 'Събщението ви няма да бъде изпратено. [' . $points . ']';
			}
		} else {
			if (empty($error_msg))
				$error_msg = 'Съобщението ви няма да бъде изпратено защото прилича на спам. [' . $points . ']';
		}
}
function get_data($var)
{
	if (isset($_POST[$var]))
		echo htmlspecialchars($_POST[$var]);
}
get_header();
?>

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
                <?php
                if ($error_msg != NULL) {
                    echo '<p class="error">ERROR: ' . nl2br($error_msg) . "</p>";
                }
                if ($result != NULL) {
                    echo '<p class="success">' . $result . "</p>";
                }
                ?>
				<form method="post">
					<noscript>
						<p>
							<input type="hidden" name="nojs" id="nojs" />
						</p>
					</noscript>


					<br />

					<p>
						<input type="text" name="yourname" id="yourname"
							value="<?php get_data("yourname"); ?>" size="22" /> <label
							for="yourname"> <small>Име (задължително)</small>
						</label>
					</p>
					<p>
						<input type="text" name="email" id="email"
							value="<?php get_data("email"); ?>" size="22" /> <label
							for="email"> <small>Мейл (задължително)</small>
						</label>
					</p>
					<p>
						<textarea name="comments" id="comments" rows="10"><?php get_data("comments"); ?></textarea>
						<label for="comments" style="display: none;"> <small>Съобщение
								(задължително)</small>
						</label>
					</p>
					<!-- captcha -->
					<p>
					<?php
					if (function_exists ( 'cptch_display_captcha_custom' )) {
						echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />";
						echo cptch_display_captcha_custom ();
					}
					?> 					
					</p>
					<br>
					<p>
						<input name="submit" type="submit" id="submit" value="Submit Form"
							<?php if (isset($disable) && $disable === true) echo ' disabled="disabled"'; ?> />
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