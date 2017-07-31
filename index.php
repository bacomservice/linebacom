<?php
include ('bot.php');

$channelSecret = '1378f78b9a3dc72382c44f5010c33918';
$access_token  = 'lCZp0Y2/D7QtTXF99J8e7id7b11ORelZpN60vD9r3Q4jln/2VnGJ25+X6Lbbs8IR41noj7LKKkXGqjybmMi92QlH7A0QVgL3Wk/clVCgvKuiezxBSWzDzgVzyvajzM5HBwEs4kfL6FHuHjhqylThfAdB04t89/1O/w1cDnyilFU=';

#$url = 'https://api.line.me/v1/oauth/verify';
#$headers = array('Authorization: Bearer ' . $access_token);
#$ch = curl_init($url);
#curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
#curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
#curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
#$result = curl_exec($ch);
#curl_close($ch);
#$curl_obj = json_decode($result);
#echo $curl_obj->{'channelId'}."<br/>";
#echo $curl_obj->{'mid'}."<br/>";

#    public $content         = null;
#    public $events          = null;	
#    public $isEvents        = false;
#    public $isText          = false;
#    public $isImage         = false;
#    public $isSticker       = false;
	
#    public $text            = null;
#    public $replyToken      = null;
#    public $source          = null;
#    public $userId          = null;
#    public $userType        = null;    
#    public $message         = null;
#    public $timestamp       = null;
	
#    public $response        = null;


$bot = new BOT_API($channelSecret, $access_token);

$bot->verify(access_token);
	
if (!empty($bot->isEvents)) {

	switch ($bot->eventType) {
    case "text":
    	if ( strtolower($bot->text) == "getevent") {
    		# code...
    		$bot->replyMessageNew( $bot->replyToken, json_encode($bot->events));
    	} else if ( strtolower($bot->text) == "signup") {
    		# code...
    		if ( strtolower($bot->userType) == "group") {
    			# code...
    			$bot->replyMessageNew( $bot->replyToken, "Go to your private box!");
    			$bot->sendMessageNew( $bot->userId, "Group TokenID : ");
    			$bot->sendMessageNew( $bot->userId, $bot->groupId);
    			$bot->sendMessageNew( $bot->userId, "Link to signup : https://bacom.dyndns.org:4433");
    		} else {
    			# code...
    			$bot->replyMessageNew( $bot->replyToken, "Your TokenID : ");
    			$bot->sendMessageNew( $bot->userId, $bot->userId);
    			$bot->sendMessageNew( $bot->userId, "Link to signup : https://bacom.dyndns.org:4433");
    		}
    		
    	} else if ( strtolower($bot->text) == "help"  || $bot->text == "?" ) {
    		# code...
    		if (strtolower($bot->userType) == "group") {
    			# code...
    			$bot->replyMessageNew( $bot->replyToken, 
    			"Hi"
    			."\n"."Welcome to Bacom Internetwork");
	    		$bot->sendMessageNew( $bot->groupId, "System can action only command below");
	    		$bot->sendMessageNew( $bot->groupId, "1 : Signup");
	    		$bot->sendMessageNew( $bot->groupId, "Link to signup : https://bacom.dyndns.org:4433");
    		} else {
    			# code...
    			$bot->replyMessageNew( $bot->replyToken, 
    			"Hi"
    			."\n"."Welcome to Bacom Internetwork");
	    		$bot->sendMessageNew( $bot->userId, "System can action only command below");
	    		$bot->sendMessageNew( $bot->userId, "1 : Signup");
	    		$bot->sendMessageNew( $bot->userId, "Link to signup : https://bacom.dyndns.org:4433");
    		}    		
    		
    	} else {
    		# code...
    	}
    	
        
        break;
    case "sticker":
        $bot->replyMessageNew( $bot->replyToken, $bot->message);
        break;
    case "image":
        // $bot->replyMessageNew( $bot->replyToken, json_encode($bot->events));
        break;
    case "video":
        // $bot->replyMessageNew( $bot->replyToken, json_encode($bot->events));
        break;
    
    default:
        
	}

	// if ($bot->text == "getEvent") {
	// 	# code...
	// 	$bot->replyMessageNew($bot->replyToken, json_encode($bot->events));
	// } else {
	// 	# code...
	// 		function availableUrl($host, $port=80, $timeout=10) {
	// 		  $fp = fSockOpen($host, $port, $errno, $errstr, $timeout); 
	// 		  return $fp!=false;
	// 		}

	// 		if ($bot->text == "Signup") {
	// 			# code...
	// 			$bot->replyMessageNew	($bot->replyToken, 
	// 				"Your Token : "
	// 				."\n".$bot->userId
	// 				."\n"."Link to signup : https://bacom.dyndns.org:4433"		
	// 			);

	// 		} else if ($bot->text == "test") {
	// 			# code...
	// 			$bot->replyMessageNew	($bot->replyToken, 
	// 				'[
	// 			        {
	// 			            "type":"text",
	// 			            "text":"Hello, user"
	// 			        },
	// 			        {
	// 			            "type":"text",
	// 			            "text":"May I help you?"
	// 			        }
	// 			    ]'		
	// 			);

	// 		} else {
	// 			# code...
	// 			$bot->replyMessageNew	($bot->replyToken, 
	// 				"Hi"
	// 				."\n"."Welcome to Bacom Internetwork"
	// 				."\n"."System can action only command below"
	// 				."\n"."1 : Signup"
	// 				."\n"."Link to signup : https://bacom.dyndns.org:4433"
	// 			);
	// 		}
			
		
	//   //       $linkState = availableUrl($bot->text);
	        
	//   //       if ($linkState == true) {

	//   //       	$bot->replyMessageNew	($bot->replyToken, 
	// 		// 		"Your ID : ".$bot->userId
	// 		// 		."\n"."Link UP"
	// 		// 		."\n"."Your Link : ".$bot->text					
	// 		// 		."\n"."Link IP : ".gethostbyname($bot->text)
	// 		// 	);					
	// 		// } else {

	// 		// 	$bot->replyMessageNew	($bot->replyToken, 
	// 		// 		"Your ID : ".$bot->userId
	// 		// 		."\n"."Link DOWN"
	// 		// 		."\n"."Your Link : ".$bot->text					
	// 		// 		."\n"."Link IP : ".gethostbyname($bot->text)
	// 		// 	);				
	// 		// }
		
	// }	

	

	//Return "true" if the url is available, false if not.
		
	
	#$bot->replyMessageNew($bot->replyToken, json_encode($bot->events));
	
		
	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();
}


?>
