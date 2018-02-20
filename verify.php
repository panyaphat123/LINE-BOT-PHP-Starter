<?php
$access_token = '
4Orkno14VxP2MCgrmYr/2i3oSVbhsrSezaLCKm59xrcc64fHAG75lbQWN8A9nzQJJWVakIyjXuqEsAoW7FLdvBKIXdA0PWU967QL30+LHsjESkz1N+bj9z9vtJUFdc7QxHGD5n/UFap6tNCdNOFxegdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
