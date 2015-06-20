<?php
namespace SchamsNet\BeWelcome\Controller;
/**
 * This file is part of the TYPO3 CMS Extension "Backend Welcome"
 * Extension author: Michael Schams - http://schams.net
 *
 * For copyright and license information, please read the LICENSE.txt
 * file distributed with this source code.
 *
 * @package		TYPO3
 * @subpackage	be_welcome
 * @author		Michael Schams <schams.net>
 * @link		http://schams.net
 */

use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class WelcomeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 *
	 */
	public $extKey = 'be_welcome';

	/**
	 *
	 */
	private $externalWebsiteUri = NULL;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
	}

	/**
	 * Initialize action
	 *
	 * @access public
	 * @return void
	 */
	public function initializeAction() {

		// extension configuration
		if( isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$this->extKey])
		 && is_string($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$this->extKey])
		 && !empty($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$this->extKey])) {

			$extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$this->extKey]);

			// extract external website URI from extension configuration
			if(is_array($extensionConfiguration) && array_key_exists('externalWebsiteUri', $extensionConfiguration)) {

				// remove illegal characters from a URL
				$externalWebsiteUri = filter_var($extensionConfiguration['externalWebsiteUri'], FILTER_SANITIZE_URL);

				// verify, if URL is valid
				if(filter_var($externalWebsiteUri, FILTER_VALIDATE_URL) !== FALSE) {
					$this->externalWebsiteUri = $externalWebsiteUri;
				}
			}
		}
	}

	/**
	 * Main action: Show standard information
	 *
	 * @access public
	 * @return void
	 */
	public function showAction() {

		// ...
		if(isset($this->externalWebsiteUri)) {
			$this->view->assign('external_website_uri', $this->externalWebsiteUri);
		}
	}
}
