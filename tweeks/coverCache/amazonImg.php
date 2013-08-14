<?Php
function awsRequest($searchIndex, $keywords, $responseGroup = false, $operation = "ItemSearch", $pageNumber = 1){
include_once("key.php");	
	$returnArray = array(); 

  // build initial request uri
  $request = 
"$service_url&Operation=$operation&VariationPage=1&ResponseGroup=Large&AssociateTag=$associate_tag&SearchIndex=$searchIndex&Keywords=".urlencode($keywords)."&ItemPage=$pageNumber";

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
?>
