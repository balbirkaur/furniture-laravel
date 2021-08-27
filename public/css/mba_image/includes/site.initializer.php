<?
/*
	This file MUST be placed in the root directory for the website. This file should be the first set of code run.
*/
define('SITE_DOCUMENT_ROOT', (dirname(__FILE__) . DIRECTORY_SEPARATOR));
$site_url_root = dirname($_SERVER['PHP_SELF']);
define('SITE_URL_ROOT', ($site_url_root . ($site_url_root == DIRECTORY_SEPARATOR ? '' : DIRECTORY_SEPARATOR)));
require_once(SITE_DOCUMENT_ROOT . 'modules' . DIRECTORY_SEPARATOR . 'basic_system' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'SiteInitialize.class.php');
