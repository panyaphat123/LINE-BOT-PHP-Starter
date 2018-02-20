<?php
$access_token = 'Q7Vn7Mx5VFZ3bWoMuQiaEA+D3HfLA/PK3SDI+n+sNsX38J+wtXUwiTfG48Savx1dJWVakIyjXuqEsAoW7FLdvBKIXdA0PWU967QL30+LHshk9RjRSX1vBidr2hHgXn7jkXBzfwkF0iEc7D9UCUg7qQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				$In1=$_POST ['In1'] ;
 				$In2=$_POST ['In2'] ;
  				$sign = $_POST['gender'];
 
   if ($sign == "+"){
      $sum=$In1+$In2;
      print $In1." + ".$In2." = ".$sum;
   }
   elseif ($sign == "-"){  
      $sum=$In1-$In2;         
      print $In1." - ".$In2." = ".$sum;
   }
   elseif ($sign == "*"){  
      $sum=$In1*$In2;         
      print $In1." x ".$In2." = ".$sum;
   }
   elseif ($sign == "/"){
       if($In2==0){  
        print "ผิดพลาดตัวหาร = 0!";
      }
      else{
        $sum=$In1/$In2;         
        print $In1." / ".$In2." = ".$sum;
     }   
   }
   elseif ( $_POST['gender']=='!'){
      $sum = $_POST ['In1'];
      print $_POST ['In1']."! =".$_POST ['In1'];
   for ($i=($_POST ['In1'] -1); $i>=1; $i--) {
    $sum *= $i;
    print "x".$i;
    }
    print "=".$sum;
    }   
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
