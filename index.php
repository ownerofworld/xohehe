<?php 


$website = "https://api.telegram.org/bot".$botToken;


$request = file_get_contents( 'php://input' );
#          ↑↑↑↑ 
$request = json_decode( $request, TRUE );

$chatId = $request["message"]["chat"]["id"];

sendMessage($chatId, "Hello World", $token);



function sendMessage($chatID, $messaggio, $token) {
    echo "sending message to " . $chatID . "\n";

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

 ?>