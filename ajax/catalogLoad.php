<?php
	// PHP Proxy
	// Loads a XML from any location. Used with Flash/Flex apps to bypass security restrictions
	// Author: Paulo Fierro
	// January 29, 2006
	// usage: proxy.php?url=http://mysite.com/myxml.xml
 
	$session = curl_init($_POST['url']); 	               // Open the Curl session
	curl_setopt($session, CURLOPT_HEADER, false); 	       // Don't return HTTP headers
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);   // Do return the contents of the call
	$xml = curl_exec($session); 	                       // Make the call
	header("Content-Type: text/plain");                      // Set the content type appropriately
//	echo str_replace("gd:image", "gd_image", $xml);              	      // Spit out the xml
	curl_close($session); // And close the session
	$regex = "/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU";
	$links = preg_match_all($regex,$xml,$matches);
	//echo join("<br>",$matches[0]);
	echo "it should work but it does not work and I hate it for today";
	//include("../labs/aval.php");
	//avalBylink($_POST["url"]);
?>