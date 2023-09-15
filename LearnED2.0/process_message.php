<?php

$api_key = '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';

// Get the user message from the request
$data = json_decode(file_get_contents('php://input'));
$user_message = $data->message;
$user_question= $data->question;

// Prepare the payload for the OpenAI API
$payload = [
    'model' => 'gpt-3.5-turbo',
    'messages' => [
        ['role' => 'system', 'content' => 'You are a helpful Math, primary arabic school teacher that checks if i give you the right answer or not to the question'],
        ['role' => 'system', 'content' => 'You use your math skills to verify the answer given by me and give me the result in arabic with short simple explanation'],
        ['role' => 'user', 'content' => 'question is '. $user_question .'and my answer is ' . $user_message],
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
$bot_message = $response_data['choices'][0]['message']['content'];
echo json_encode(['message' => $bot_message]);
?>