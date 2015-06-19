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

$.noConflict();
jQuery(document).ready(function( $ ) {
	$('iframe#BeWelcome').iFrameResize({
		enablePublicMethods: true,
		resizedCallback: function(messageData) {
			console.log('ID: ' + messageData.iframe.id + ', height: ' + messageData.height + ', width: ' + messageData.width + ', type: ' + messageData.type);
		},
		messageCallback: function(messageData) {
			console.log('ID: ' + messageData.iframe.id + ', message: ' + messageData.message);
			alert(messageData.message);
		},
		closedCallback: function(id) {
			console.log('Frame ID ' + messageData.iframe.id + ' removed from page');
		}
	});
});