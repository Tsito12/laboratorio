<?php
$url = $_POST['url'];

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "http://api.qrserver.com/v1/create-qr-code/?data=".$url."&size=300x300",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: qrcode-monkey.p.rapidapi.com",
		"X-RapidAPI-Key: 9d4b049e43msh35fba3d6e9c94c7p1f601ejsn8a590d0b4aac"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
?>