<?
/*
function array_implode($arrays, &$target = array()) {
  if(is_array($arrays)){
    foreach ($arrays as $item) {
        if (is_array($item)) {
            array_implode($item, $target);
        } else {
            $target[] = $item;
        }
    }
    return $target;
  }else {return false;}
}
*/
function awsRequest($searchIndex, $keywords, $responseGroup = false, $operation = "ItemSearch", $pageNumber = 1){
  $service_url = "http://ecs.amazonaws.com/onca/xml?Service=AWSECommerceService";
  $associate_tag = "your-associate-tag";
  $secret_key = "+NfwKQ51CjlkMc+IR7XR1PVLYpTIi+ND9TCSPaW1";
  $access_key = "AKIAINWTFGNW25U2G4MA";

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
//$xml = simplexml_load_file(awsRequest("DVD", "883929059065",false, "ItemSearch", "1"));
//$xml = simplexml_load_file(awsRequest("VideoGames", "B000ZKA0J6",false, "ItemSearch", "1"));
//echo awsRequest("DVD", "883929059065",false, "ItemSearch", "1");
//$xml = simplexml_load_file(awsRequest("DVD", "043396239043",false, "ItemSearch", "1")); 
//$xml = simplexml_load_file(awsRequest("Music", "886976095222",false, "ItemSearch", "1"));
//$xml = simplexml_load_file(awsRequest("All", "9781428143135",false, "ItemSearch", "1"));
//$xml = simplexml_load_file(awsRequest("Books", "159397535X",false, "ItemSearch", "1"));
//$xml = simplexml_load_file(awsRequest("Books", "9781602525467",false, "ItemSearch", "1"));
$xml = simplexml_load_file(awsRequest("Books", "1599505177",false, "ItemSearch", "1"));
//$xml = simplexml_load_file(awsRequest("Books", "067102423X",false, "ItemSearch", "1"));
//$xml = awsRequest("Music", "5099921235825",false, "ItemSearch", "1");
//$xml = simplexml_load_file(awsRequest("Music", "5099921235825",false, "ItemSearch", "1"));
//$xml = simplexml_load_file(awsRequest("Music", "5099921235825", "false", "ItemSearch", "1"));

//echo $xml;die();
// now retrieve some data
//$totalPages = $xml->Items->TotalPages;
//echo "<p>There are $totalPages pages in the XML results.</p>";

// retrieve data in a loop

echo "<img src='";
print_r((string)$xml->Items->Item->SmallImage->URL);
echo "'>";
echo "<img src='";
print_r((string)$xml->Items->Item->MediumImage->URL);
echo "'>";
echo "<img src='";
print_r((string)$xml->Items->Item->LargeImage->URL);
echo "'>";
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


echo "<pre>";
print_r($xml);
echo "</pre>";

?>