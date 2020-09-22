<?
//error_reporting(-1);
include_once 'dbconn.php';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_PORT, $port);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);;
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERPWD, $login.":".$pass);

/*
$headers = array();
$headers["Authorization"] = "Basic MTExOjExMTExMTEx";
$headers["Content-Type"] = "application/json";
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
*/

$data = <<<DATA
{
"shop": "80b57688-897c-4f50-aa7c-f4c3d9a5328d",
"products": [
    "1b7b31f4-56b0-11e0-b129-00151783fafd",
    "3607b33b-f4bb-11e4-b6e5-001517a211ff",
    "eac00b3b-49f3-11e8-9409-a4bf014f73a0"
]
}
DATA;

//print_r($data);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);


$resp = curl_exec($curl);

$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
echo "Статус код: " . $http_code;

if(curl_exec($curl) === false)
{
    echo 'Curl error: ' . curl_error($curl);
}
else
{
    echo 'Operation completed without any errors<br>';
}

curl_close($curl);
var_dump($resp);

?>
