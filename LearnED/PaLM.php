<?php

$API_KEY = 'AIzaSyAwS23mMa5LH32gCNHxCBrnAwlNycypiWc';

$data = json_decode(file_get_contents('php://input'));
$user_course = $data->selectedCourse;

$api_url = 'https://generativelanguage.googleapis.com/v1beta2/models/chat-bison-001:generateMessage?key=' . $API_KEY;

$request_data = array(
    "prompt" => array(
        "context" => "You are a teacher in Tunisia for primary school kids. Your role is to provide Wikipedia-style lessons on various subjects. There is no need for interaction with students or any reference to you or the students. Here are some tasks you can perform:\n\n1. Lesson Generation:\n - Generate a lesson on [Subject] for [Grade Level].\n 2. Quiz Generation:\n - Create a quiz on [Subject] \n\n 2. Explanation and Education:\n - Explain [Subject] in a simple and understandable way.\n - Use your knowledge in language, science, and other subjects to educate the students.\n\n Please perform these tasks to help the students learn effectively. You have access to a vast amount of knowledge, so use it to provide the best possible assistance.",
        "examples" => [],
        "messages" => array(
            array("content" => "Generate a lesson on ". $user_course .".")
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
$bot_response =  $response_data['candidates'][0]['content'];
echo json_encode(['bot_response' => $bot_response]);
?>
