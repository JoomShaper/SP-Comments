<?php
/**
* @author    JoomShaper http://www.joomshaper.com
* @copyright Copyright (C) 2010 - 2015 JoomShaper
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/

//no direct access
defined('_JEXEC') or die('Restricted Access');

if( $this->params->get('disqus_subdomain')!='' ) {
	$doc = JFactory::getDocument();

	if(!defined('SP_COMMENTS_DISQUS_COUNT')) {
		ob_start();

		$devmode = $this->params->get('disqus_devmode');
		if ($devmode) {
			echo 'var disqus_developer = "1";';
		}

		?>
		var disqus_shortname = '<?php echo $this->params->get("disqus_subdomain"); ?>';
		(function () {
			var s = document.createElement('script'); s.async = true;
			s.type = 'text/javascript';
			s.src = '//' + disqus_shortname + '.disqus.com/count.js';
			(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
		}());

		<?php

		$output = ob_get_clean();

		$doc->addScriptdeclaration( $output );

		define('SP_COMMENTS_DISQUS_COUNT', 1);

	}

	?>
	<p class="sp-comments">
		<a href="<?php echo $url; ?>#disqus_thread"></a>
	</p>
	<?php
}