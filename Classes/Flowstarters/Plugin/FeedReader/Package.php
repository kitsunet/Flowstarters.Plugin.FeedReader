<?php
namespace Flowstarters\Plugin\FeedReader;

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

use TYPO3\Flow\Package\Package as BasePackage;

/**
 * The Flowstarters.Plugin.FeedReader package
 */
class Package extends BasePackage {

	/**
	 * @param \TYPO3\Flow\Core\Bootstrap $bootstrap The current bootstrap
	 * @return void
	 */
	public function boot(\TYPO3\Flow\Core\Bootstrap $bootstrap) {
			// This is not nice, but Simplepie is not PSR-0 compatible and would break if we don't do it.
		require \TYPO3\Flow\Utility\Files::concatenatePaths(array(FLOW_PATH_PACKAGES, 'Libraries/simplepie/simplepie/autoloader.php'));
	}

}

?>