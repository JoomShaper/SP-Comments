<?php
/**
* @author    JoomShaper http://www.joomshaper.com
* @copyright Copyright (C) 2010 - 2015 JoomShaper
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/
//no direct access
defined('_JEXEC') or die('Restricted Access');

?>

<?php
	$doc = JFactory::getDocument();

	if(!defined('SP_COMMENTS_FACEBOOK_COUNT')) {

		$doc->addScript( '//connect.facebook.net/' . $language . '/all.js#xfbml=1&appId=' . $this->params->get('fb_appID') . '&version=v2.0' );

		define('SP_COMMENTS_FACEBOOK_COUNT', 1);

	}

?>

<p class="sp-comments">
	<a href="<?php echo $url; ?>"><?php echo JText::_('SPCOMMENTS_COMMENT'); ?> <fb:comments-count href=<?php echo $url; ?>></fb:comments-count></a>
</p>