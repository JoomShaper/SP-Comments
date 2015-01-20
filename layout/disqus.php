<?php
/**
* @author    JoomShaper http://www.joomshaper.com
* @copyright Copyright (C) 2010 - 2015 JoomShaper
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/

//no direct access
defined('_JEXEC') or die('Restricted Access');

if( $this->params->get('disqus_subdomain')!='' ) {

	$lang = explode('-', $language);

	?>

	<div class="sp-comments-container">
		<div id="disqus_thread"></div>
	</div>
	
	<script type="text/javascript">

	<?php
	$devmode = $this->params->get('disqus_devmode'); /*return the boolean*/
	if ($devmode) {
		echo 'var disqus_developer = "1";';
	}
	?>

	var disqus_url= "<?php echo $url; ?>";
	var disqus_identifier = "<?php echo md5($url); ?>";
	var disqus_config = function () {
		this.language = "<?php echo $lang[0]; ?>"; /*Detect Language*/
	};

	var disqus_shortname = '<?php echo $this->params->get("disqus_subdomain"); ?>';
	(function() {
		var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

	<?php

}