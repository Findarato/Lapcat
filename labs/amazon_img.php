<?Php
function awsRequest($searchIndex, $keywords, $responseGroup = false, $operation = "ItemSearch", $pageNumber = 1){
	include("key.php");

  // build initial request uri
  $request = "$service_url&Operation=$operation&VariationPage=1&ResponseGroup=Large&AssociateTag=$associate_tag&SearchIndex=$searchIndex&Keywords=".urlencode($keywords)."&ItemPage=$pageNumber";

  // parse request into params
  $uri_elements = parse_url($request);
  $request = $uri_elements['query'];
  parse_str($request, $parameters);

  // add new params
  $parameters['Timestamp'] = gmdate("Y-m-d\TH:i:s\Z");
  $parameters['Version'] = "2006-11-14";
  $parameters['AWSAccessKeyId'] = $access_key;
  if($responseGroup){
    $parameters['ResponseGroup'] = $responseGroup;
  }
  ksort($parameters);

  // encode params and values
  foreach($parameters as $parameter => $value){
    $parameter = str_replace("%7E", "~", rawurlencode($parameter));
    $value = str_replace("%7E", "~", rawurlencode($value));
    $request_array[] = $parameter . '=' . $value;
  }
  $new_request = implode('&', $request_array);

  // make it happen
  $signature_string = "GET\n{$uri_elements['host']}\n{$uri_elements['path']}\n{$new_request}";
  $signature = urlencode(base64_encode(hash_hmac('sha256', $signature_string, $secret_key, true)));

  // return signed request uri
  return "http://{$uri_elements['host']}{$uri_elements['path']}?{$new_request}&Signature={$signature}";
}


// make the request

$xml = simplexml_load_file(awsRequest("All", "9781401211929",false, "ItemSearch", "1"));

$smallImage = (string)$xml->Items->Item->SmallImage->URL;
$mediumImage = (string)$xml->Items->Item->MediumImage->URL;
$largeImage = (string)$xml->Items->Item->LargeImage->URL;

/*
echo "<br>Item info:<br>";
echo "Label: ".(string)$xml->Items->Item->ItemAttributes->Label."<br>"; //assoc
echo "Studio: ".(string)$xml->Items->Item->ItemAttributes->Studio."<br>";  //assoc
echo "Publisher: ".(string)$xml->Items->Item->ItemAttributes->Publisher."<br>";
echo "Title: ".(string)$xml->Items->Item->ItemAttributes->Title."<br>";


if((string)$xml->Items->Request->ItemSearchRequest->SearchIndex=="VideoGames"){
  echo "Platform:".(string)$xml->Items->Item->ItemAttributes->Platform."<br>"; //assoc
  echo "ESRB Rateing:".(string)$xml->Items->Item->ItemAttributes->ESRBAgeRating."<br>";
  echo "Operating System:".(string)$xml->Items->Item->ItemAttributes->OperatingSystem."<br>";
  echo "Origional Release Date:".(string)$xml->Items->Item->ItemAttributes->OriginalReleaseDate."<br>";
  echo "Release Date:".(string)$xml->Items->Item->ItemAttributes->ReleaseDate."<br>";
  
}
if((string)$xml->Items->Request->ItemSearchRequest->SearchIndex=="DVD"){
  echo "Platform:".(string)$xml->Items->Item->ItemAttributes->Platform."<br>";
  echo "Audience Rateing:".(string)$xml->Items->Item->ItemAttributes->AudienceRating."<br>";
  echo "Origional Release Date:".(string)$xml->Items->Item->ItemAttributes->OriginalReleaseDate."<br>";
  echo "Release Date:".(string)$xml->Items->Item->ItemAttributes->ReleaseDate."<br>";
  echo "Aspect Ratio:".(string)$xml->Items->Item->ItemAttributes->AspectRatio."<br>";
  echo "Director:".(string)$xml->Items->Item->ItemAttributes->Director."<br>"; //assoc
  echo "Run Time:".(string)$xml->Items->Item->ItemAttributes->RunningTime."<br>";
  echo "Actors: <br>"; //assoc
  foreach ($xml->Items->Item->ItemAttributes->Actor as $a){
    echo $a."<br>";
  } 
  
}

echo "Raiting Average:".(string)$xml->Items->Item->CustomerReviews->AverageRating."";
echo " out of ".(string)$xml->Items->Item->CustomerReviews->TotalReviews." Reviews<br>";
echo "Editor Review: ".(string)$xml->Items->Item->EditorialReviews->EditorialReview->Content."<br>";

if((string)$xml->Items->Request->ItemSearchRequest->SearchIndex=="Books"){
  echo "Creators: <br>";
  foreach ($xml->Items->Item->ItemAttributes->Creator as $t){
    echo $t."<br>";
  } 
}

if((string)$xml->Items->Request->ItemSearchRequest->SearchIndex=="Music"){
  echo "Origional Release Date:".(string)$xml->Items->Item->ItemAttributes->OriginalReleaseDate."<br>";
  echo "Artist: ".(string)$xml->Items->Item->ItemAttributes->Artist."<br>";
  echo "Tracks: <br>";
  foreach ($xml->Items->Item->Tracks->Disc->Track as $t){
    echo $t."<br>";
  } 
}

/*
echo "<pre>";
print_r($xml);
echo "</pre>";
*/
?>