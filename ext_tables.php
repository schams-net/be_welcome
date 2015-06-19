<?php
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

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$extPath    = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY);
$extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY);

// Avoid that this block is loaded in frontend or within upgrade wizards
if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'SchamsNet.BeWelcome',			// extension name
		'system',						// main module name
		'BeWelcome',					// sub module name
		'bottom',						// position
		array(
			'Welcome' =>	'show',
		),
		array(
			'access' =>		'user,group',
            'icon' =>		'EXT:' . $_EXTKEY . '/Resources/Public/Backend/Icons/16x16.png',
            'labels' =>		'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.be_welcome.xlf',
		)
    );
}