<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$API_KEY = 'AIzaSyAwS23mMa5LH32gCNHxCBrnAwlNycypiWc';

$data = json_decode(file_get_contents('php://input'));
$bot_quiz = $data->bot_quiz;
$userMessage = $data->userMessage;

$api_url = 'https://generativelanguage.googleapis.com/v1beta2/models/chat-bison-001:generateMessage?key=' . $API_KEY;

$request_data = array(
    "prompt" => array(
        "context" => "You are an Arabic teacher in Tunisia for primary school kids. Your role is to correct the [answer] provided to the [quiz] you just provided . There is no need for interaction with students or any reference to you or the students. Here are the task you have perform \n\n .- Evaluate and correct students' answers to the quiz provided.\n - Provide feedback and explanations for incorrect answers.\n - Explain the quiz answer in a simple and understandable way.\n -\n Please perform these tasks to help the students learn effectively. You have access to a vast amount of knowledge, so use it to provide the best possible assistance.",
        
        "examples" => [],
        "messages" => array(
            array("content" => "Correct the quiz ,here is the quiz ". $bot_quiz ." and here is the user answer ".$userMessage."use your math/language skills to check the options selected are correct pls")
        )
    ),
    "temperature" => 0.25,
    "top_k" => 40,
    "top_p" => 0.95,
    "candidate_count" => 1
);

$ch = curl_init($api_url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
}
curl_close($ch);

$response_data = json_decode($response, true);
if ($response_data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['bot_answer' => 'API response could not be parsed as JSON']);
} else {
    $bot_answer = $response_data['candidates'][0]['content'];
    $bot_answer = strip_tags($bot_answer);
    $response = json_encode(['bot_answer' => $bot_answer]);
    echo $response;
}

?>
