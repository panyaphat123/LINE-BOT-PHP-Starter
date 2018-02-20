<?php
$access_token = '
Q7Vn7Mx5VFZ3bWoMuQiaEA+D3HfLA/PK3SDI+n+sNsX38J

+wtXUwiTfG48Savx1dJWVakIyjXuqEsAoW7FLdvBKIXdA0PWU967QL30+LHshk9RjRSX1v

Bidr2hHgXn7jkXBzfwkF0iEc7D9UCUg7qQdB04t89/1O/w1cDnyilFU= ';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
