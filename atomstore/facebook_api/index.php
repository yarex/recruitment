<?php

// session_start();

require_once __DIR__ . '/vendor/autoload.php';

// App: me - Test1
const APP_ID        = '302245440769703';
const APP_SECRET    = '11274115a7ab0ad30692b44a0149ee44';
const GRAPH_VERSION = 'v2.10';

const ACCESS_TOKEN = 'EAAES5AAhzqcBABigulh57WPIOWHPBk4DID0jR7TANadniYeAhPhZA4b77t2V3gOYPeEUVKwZB5fcUrTjmJRY7YbTZBeyOZAIfl9CMlna54wx1NfAygKzdYbY5EG5WLFxpx7rm2Ki0cGIWUkGHk5vBWcrhOBfkwzf95C1KTO8MPb0Ru3evx5y1qo6zCybnXpRNpuvHdwStHuoG8a6QAul1pAbWHVmmBv2Qx6eCaIsnAZDZD';

// Facebook object
$fb = new \Facebook\Facebook([
    'app_id' => APP_ID,
    'app_secret' => APP_SECRET,
    'default_graph_version' => GRAPH_VERSION,
    'default_access_token' => ACCESS_TOKEN,
]);

// Fetch data
try {
    $response = $fb->get("/me", ACCESS_TOKEN);
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph error: ' . $e->getMessage();
    exit();
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK error: ' . $e->getMessage();
    exit();
};

$me = $response->getGraphUser();

http_response_code(200);
header("Content-type: application/json");

var_dump($me);