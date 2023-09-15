<?php

$api_key = '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';

// Get the user message from the request
$data = json_decode(file_get_contents('php://input'));
$user_subchapter = $data->subchapter;
$user_course_title = $data->course_title;

// Prepare the payload for the OpenAI API
$payload = [
    'model' => 'gpt-3.5-turbo',
    'messages' => [
        ['role' => 'system', 'content' => 'You are a helpful Math, primary arabic school teacher that give kids A quizz in arabic just arabic! to test their knowlege about a given subject also no introduction this is a test '],
        ['role' => 'system', 'content' => 'You use your math skills to make a quiz in arabic for me without providing a correction or an introduction on a given subject and wait for my answer '],
        ['role' => 'user', 'content' => 'question is about this subject '. $user_subchapter . 'which follows the title' . $user_course_title .'generate the appropriate quizz for me don"t give me the correct answer pls let me answer you first then tell me which one is right '],
    ],
];

// Send the request to the OpenAI API
$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key,
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
$response = curl_exec($ch);
curl_close($ch);

// Parse and send the response to the client

$response_data = json_decode($response, true);
$bot_question = $response_data['choices'][0]['message']['content'];
echo json_encode(['question' => $bot_question]);
?>