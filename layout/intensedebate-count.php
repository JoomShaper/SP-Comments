<?php
/**
* @author    JoomShaper http://www.joomshaper.com
* @copyright Copyright (C) 2010 - 2015 JoomShaper
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/
//no direct access
defined('_JEXEC') or die('Restricted Access');

?>
<p class="sp-comments">
	<script type="text/javascript">
		var idcomments_acct = '<?php echo $this->params->get("intensedebate_acc"); ?>';
		var idcomments_post_id = '<?php echo md5( $url )?>';
		var idcomments_post_url = encodeURIComponent("<?php echo $url;?>");
	</script>
	<script type="text/javascript" src="//www.intensedebate.com/js/genericLinkWrapperV2.js"></script>
</p>