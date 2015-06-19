<?php
namespace SchamsNet\BeWelcome\ViewHelpers;
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

class AddPublicResourcesViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Be\AbstractBackendViewHelper {

	/**
	 * Constants
	 */
	const JQUERY_VERSION = '1.11.3';
	const IFRAME_RESIZER_VERSION = '2.8.6';

	/**
	 * [...]
	 *
	 * @return string
	 */
	public function render() {
		$doc = $this->getDocInstance();
		$pageRenderer = $doc->getPageRenderer();

		$extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('be_welcome');

		$pageRenderer->addCssFile($extRelPath . 'Resources/Public/Css/BeWelcome.css');

		$pageRenderer->addJsFile(
			$extRelPath . 'Resources/Public/JavaScript/jquery-' . self::JQUERY_VERSION . '.min.js',
			'text/javascript',	// type
			FALSE,				// compress
			FALSE,				// forceOnTop
			'',					// allWrap
			TRUE,				// excludeFromConcatenation
			'|'					// splitChar
		);

		$pageRenderer->addJsFile(
			$extRelPath . 'Resources/Public/JavaScript/iframeResizer-' . self::IFRAME_RESIZER_VERSION . '.min.js',
			'text/javascript',	// type
			FALSE,				// compress
			FALSE,				// forceOnTop
			'',					// allWrap
			TRUE,				// excludeFromConcatenation
			'|'					// splitChar
		);

		$pageRenderer->addJsFile(
			$extRelPath . 'Resources/Public/JavaScript/BeWelcome.js',
			'text/javascript',	// type
			FALSE,				// compress
			FALSE,				// forceOnTop
			'',					// allWrap
			TRUE,				// excludeFromConcatenation
			'|'					// splitChar
		);

		$output = $this->renderChildren();
		$output = $doc->startPage('title') . $output;
		$output.= $doc->endPage();

		return $output;
	}
}