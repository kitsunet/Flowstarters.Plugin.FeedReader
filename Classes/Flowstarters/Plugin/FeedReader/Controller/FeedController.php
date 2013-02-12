<?php
namespace Flowstarters\Plugin\FeedReader\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package                          *
 * "Flowstarters.Plugin.FeedReader".                                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use TYPO3\Flow\Http\Uri;
use Flowstarters\Plugin\FeedReader\Domain\Model as Model;

/**
 * The feed controller for the FeedReader package
 *
 * @Flow\Scope("singleton")
 */
class FeedController extends ActionController {

	/**
	 *
	 */
	public function listAction() {
		$possibleFeedUrl = $this->getFeedUrlFromPluginArguments();
		if (!($possibleFeedUrl instanceof Uri)) {
			return $possibleFeedUrl;
		}

		$items = array();
		$simplePieObject = $this->createSimplePieObject($possibleFeedUrl->__toString());
		foreach ($simplePieObject->get_items() as $item) {
			$temporaryItem = new Model\FeedItem();
			$temporaryItem->populateFromSimplePieItem($item);
			$items[] = $temporaryItem;
		}

		$this->view->assign('items', $items);
	}

	/**
	 * @return string|\TYPO3\Flow\Http\Uri
	 */
	protected function getFeedUrlFromPluginArguments() {
		$pluginArguments = $this->request->getPluginArguments();
		if (!isset($pluginArguments['feedUrl']) || $pluginArguments['feedUrl'] === '') {
			return 'Missing a feed URL. Please enter one in the inspector.';
		} else {
			try {
				$feedUrl = new Uri($pluginArguments['feedUrl']);
			} catch (\InvalidArgumentException $exception) {
				return 'The parsing the feed URL failed with (' . $exception->getCode() . '): ' . $exception->getMessage();
			}
		}

		return $feedUrl;
	}

	/**
	 * @param string $feedUrl
	 * @return \SimplePie
	 */
	protected function createSimplePieObject($feedUrl) {
		$simplePie = new \SimplePie();
		$simplePie->set_feed_url($feedUrl);
		$simplePie->enable_cache(FALSE);
		$simplePie->init();

		return $simplePie;
	}
}

?>