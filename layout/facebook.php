<?php
/**
* @author    JoomShaper http://www.joomshaper.com
* @copyright Copyright (C) 2010 - 2015 JoomShaper
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/
//no direct access
defined('_JEXEC') or die('Restricted Access');

if( $this->params->get('fb_appID') != '' ) {
	?>

	<div class="sp-comments-container">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/<?php echo $language; ?>/sdk.js#xfbml=1&appId=<?php echo $this->params->get('fb_appID'); ?>&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<div class="fb-comments" data-href="<?php echo $url; ?>" data-numposts="<?php echo $this->params->get('fb_cpp'); ?>" data-width="<?php echo $this->params->get('fb_width'); ?>" data-colorscheme="light"></div>
	</div>

	<?php
}