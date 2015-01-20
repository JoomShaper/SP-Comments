<?php
/**
* @package   SP Comments - Three in One comments plugin for Joomla by JoomShaper.com
* @author    JoomShaper http://www.joomshaper.com
* @copyright Copyright (C) 2010 - 2015 JoomShaper
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/

//no direct access
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.plugin.plugin');

class plgContentSPComments extends JPlugin {	

	protected $autoloadLanguage = true;

	/* function to work when preparing the content on frontpage or listing pages */
	function onContentAfterDisplay($context, &$article, &$params, $limitstart=0) {

		$app = JFactory::getApplication();
		$doc = JFactory::getDocument();
		$option = $app->input->getCmd('option', '');
		
		if ($app->isAdmin()) {
			return;
		}

		$language = $doc->language;

		if( $option == 'com_content' || $option = 'com_k2' ) {
			$view = JFactory::getApplication()->input->getString('view', '');
		} else {
			$view = 'unknown';
		}

		ob_start();

		if( $view == 'article' || $view == 'item' ) {

			if( !$this->inCategory($article, $this->params) ) return; /*Return if not in this category*/
			
			$url = $this->getUrl( $article );
			require_once __DIR__ . '/layout/' . $this->params->get('commenting_engine') . '.php';

		} else if ( $view == 'category' || $view == 'featured' || $view == 'itemlist' ) { /* Comments Count */

			if( !$this->inCategory($article, $this->params) ) return; /*Return if not in this category*/

			$url = $this->getUrl( $article );
			include __DIR__ . '/layout/' . $this->params->get('commenting_engine') . '-count.php';
		}

		return ob_get_clean();

	}


	function inCategory($article, $params) {
		$app = JFactory::getApplication();
		$option = $app->input->getCmd('option', '');


		$cats = $params->get('catids');

		if($option == "com_k2") {
			$cats = $params->get('k2catids');
		}

		if(in_array($article->catid, $cats)) {
			return true;
		}

		return false;
	}

	/* Get Article URL */
	function getUrl( $article ) {

		$app = JFactory::getApplication();
		$option     = $app->input->getCmd('option', '');

		if ($option == 'com_content') {
			$url 	=  JRoute::_(ContentHelperRoute::getArticleRoute($article->id . ':' . $article->alias, $article->catid, $article->language));
		} elseif($option == "com_k2") {
			$url 	= urldecode(JRoute::_(K2HelperRoute::getItemRoute($article->id.':'.urlencode($article->alias), $article->catid.':'.urlencode($article->category->alias))));
		}

		$root 			= JURI::base();
		$root 			= new JURI($root);
		$url 			= $root->getScheme() . '://' . $root->getHost() . $url;

		return $url;

	}

}