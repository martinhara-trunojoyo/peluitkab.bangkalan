<?php
function telegram($chat_id,$message){
    // $apiToken = "6315272274:AAHOrEVzKuxP7Cz_5y21YvKR8SNPQavAW34";
    $apiToken = "6388573642:AAFokKLEOF9vRWjq8_aXFNwW_IgaJhFC-tk";
    $data = [
    'chat_id' => $chat_id,
    'text' => $message."\n\n\n-----P E L U I T-----" 
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
    $response = json_decode($response);
    return $response;
}
?>