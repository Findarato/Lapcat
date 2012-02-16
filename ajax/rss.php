<?php
	// PHP Proxy
	// Loads a XML from any location. Used with Flash/Flex apps to bypass security restrictions
	// Author: Paulo Fierro
	// January 29, 2006
	// usage: proxy.php?url=http://mysite.com/myxml.xml
 
	$session = curl_init($_GET['url']); 	               // Open the Curl session
	$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
	curl_setopt($session, CURLOPT_HEADER, false); 	       // Don't return HTTP headers
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);   // Do return the contents of the call
	curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($session, CURLOPT_VERBOSE, true);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_USERAGENT, $agent);
	$xml = curl_exec($session); 	                       // Make the call
	header("Content-Type: text/xml");                      // Set the content type appropriately
	echo str_replace(array("gd:image","content:encoded"), array("gd_image","content_encoded"), $xml);              	      // Spit out the xml
	curl_close($session); // And close the session
?>