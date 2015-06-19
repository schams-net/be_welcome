# Backend Welcome Screen

TYPO3 extension to display the content of a website in an iframe in the backend.

## Getting Started

### Content Server

The **Content Server** is the source of information you want to show to your users in the TYPO3 backend.
This can be a simple (static) website or a sophisticated web application for example.
Keep in mind, that the information on this side is usually a publicly available resource (don't publish secrets).

As a simple example, create a static HTML page (maybe with some styles, texts, etc.).

Also include JavaScript file [iframeResizer.contentWindow.min.js](https://raw.github.com/davidjbradshaw/iframe-resizer/master/js/iframeResizer.contentWindow.min.js).
This file allows the iframe to be resized automatically. See http://davidjbradshaw.github.io/iframe-resizer for further details.

Store the static HTML page on a publicly available web server. We assume, you can access the site by **http://example.com/mycontent.html**

### TYPO3 Instance

Install the extension **be_welcome** using TYPO3's Extension Manager.

Go to the extension configuration, enter the website URI, e.g. **http://example.com/mycontent.html** and reload the backend.

A new menu item "Welcome Screen" appears in module "SYSTEM".
Accessing this should show the content you created before.

### Configure as Start Screen

In the TYPO3 backend, go to your user settings and switch to tab "Startup".
Select "SYSTEM -> Welcome Screen" and save your new configuration.