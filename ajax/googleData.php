<?Php
	$path = $_SERVER["DOCUMENT_ROOT"].'/libraries/';
	// Append the library path to existing paths
	$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $path);
	
	
	require_once 'Zend/Loader.php';
	Zend_Loader::loadClass('Zend_Gdata');
	Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
	Zend_Loader::loadClass('Zend_Gdata_Docs');
	 
	// User whose calendars you want to access
	include "googleLogin.inc";
    
    $service = Zend_Gdata_Docs::AUTH_SERVICE_NAME;
    $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
    $docs = new Zend_Gdata_Docs($client);
    $feed = $docs->getDocumentListFeed('http://docs.google.com/feeds/documents/private/full/-/spreadsheet');
    
    print_r($feed->entries);

