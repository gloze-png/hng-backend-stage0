<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
$response = [
    "email" => "gloryopeoluwa4@gmail.com",
    "current_datetime" => gmdate("Y-m-d\TH:i:s\Z"),
    "github_url" => "https://github.com/gloze-png/hng-backend-stage0"
];
// Return JSON response
print json_encode($response, JSON_PRETTY_PRINT);