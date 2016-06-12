<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

if(isset($_GET["find"]))
{
	$lookup_url = 'http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input=' . urlencode($_GET['find']);
	$lookup_json = file_get_contents($lookup_url);
	echo $lookup_json;
}

if(isset($_GET["symbol"]))
{
	$json_url = 'http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=' . urlencode($_GET['symbol']);
	$details_json = file_get_contents($json_url);
	echo $details_json;
}

if(isset($_GET["company"]))
{
	$string = 'http://dev.markitondemand.com/MODApis/Api/v2/InteractiveChart/json?parameters={"Normalized":false,"NumberOfDays":1095,"DataPeriod":"Day","Elements":[{"Symbol":"'. urlencode($_GET["company"]) .'","Type":"price","Params":["ohlc"]}]}';

	$new_json_url = $string ;
	$more_details_json = file_get_contents($new_json_url);
	echo $more_details_json;
}

if(isset($_GET["news"]))
{
	$accountKey = 'DeyLCBuJdA79c1ydT8L2RN5M1lw4Hz4i9NRYdxj+/uM';

	$context = stream_context_create(array(
                        'http' => array(
                            'request_fulluri' => true,
                            'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
                        )
                    ));
	$news_url = 'https://api.datamarket.azure.com/Bing/Search/v1/News?Query=%27'. urlencode($_GET["news"]) .'%27&$format=json';
	$news_json = file_get_contents($news_url,0,$context);
	echo $news_json;
}

?>