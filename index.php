<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Validate input
if (!isset($_GET['number']) || !is_numeric($_GET['number'])) {
    print json_encode(["error" => "Invalid or missing number parameter"]);
    exit;
}

$number = intval($_GET['number']);

// Function to check if a number is prime
function is_prime($num) {
    if ($num < 2) return false;
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i === 0) return false;
    }
    return true;
}

// Function to check if a number is a perfect number
function is_perfect($num) {
    $sum = 0;
    for ($i = 1; $i < $num; $i++) {
        if ($num % $i === 0) $sum += $i;
    }
    return $sum === $num;
}

// Function to check if a number is an Armstrong number
function is_armstrong($num) {
    $sum = 0;
    $digits = str_split((string) $num);
    $power = count($digits);
    foreach ($digits as $d) {
        $sum += pow((int)$d, $power);
    }
    return $sum === $num;
}

// Sum of digits
function digit_sum($num) {
    return array_sum(str_split((string) $num));
}

// Function to generate a fun fact
function fetch_fun_fact($num) {
    if (is_armstrong($num)) {
        $digits = str_split((string) $num);
        $power = count($digits);
        $expression = implode(" + ", array_map(fn($d) => "{$d}^{$power}", $digits));
        return "$num is an Armstrong number because $expression = $num";
    }
    
    // Fetch from Numbers API if not Armstrong
    $api_url = "http://numbersapi.com/" . $num . "/math";
    $fact = @file_get_contents($api_url);
    return $fact ?: "No fun fact available.";
}

// Determine properties
$properties = [];
if (is_armstrong($number)) $properties[] = "armstrong";
if ($number % 2 !== 0) $properties[] = "odd";
if ($number % 2 === 0) $properties[] = "even";

$response = [
    "number" => $number,
    "is_prime" => is_prime($number),
    "is_perfect" => is_perfect($number),
    "properties" => $properties,
    "digit_sum" => digit_sum($number),
    "fun_fact" => fetch_fun_fact($number)
];

print json_encode($response, JSON_PRETTY_PRINT);
