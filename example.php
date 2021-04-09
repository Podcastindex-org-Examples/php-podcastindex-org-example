//Required values  
$apiKey = "UXKCGDSYGUUEVQJSYDZH";  
$apiSecret = "yzJe2eE7XV-3eY576dyRZ6wXyAbndh6LUrCZ8KN|";  
$apiHeaderTime = time();  

//Hash them to get the Authorization token  
$hash = sha1($apiKey.$apiSecret.$apiHeaderTime);  

//Set the required headers  
$headers = [  
    "User-Agent: php-podcastindex-org-example/1.3",  
    "X-Auth-Key: $apiKey",  
    "X-Auth-Date: $apiHeaderTime",  
    "Authorization: $hash"  
];  

//Make the request to an API endpoint  
$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL,"https://api.podcastindex.org/api/1.0/search/byterm?q=bastiat");  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  

//Collect and show the results  
$response = curl_exec ($ch);  
curl_close ($ch);  
echo print_r(json_decode($response), TRUE);  
