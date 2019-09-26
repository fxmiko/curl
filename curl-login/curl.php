<?php
$username = "admin";
$password = "admin123";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL,"http://localhost/curl-login/check.php");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, "username=" .$username. "&password=" .$password);
curl_exec ($curl);
curl_close ($curl);
?>