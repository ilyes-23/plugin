<?php
// Your code here!

$url = "https://api.yalidine.com/v1/deliveryfees/"; // the wilayas endpoint
$api_id = "48819026175419020907"; // your api ID
$api_token = "3LU8Fv1BEDpBM3tjQuLPrb2x0GmOZsvh9aNMnk68R0rUVwl4IWiOzc7JtwdaFRid"; // your api token

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'X-API-ID: '. $api_id,
        'X-API-TOKEN: '. $api_token
    ),
));

$response_json = curl_exec($curl);
curl_close($curl);

$response_array = json_decode($response_json,true); // converting the json to a php array


//echo json_encode($response_json );

print_r($response_array);