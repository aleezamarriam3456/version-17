<?php
// Create multiple cURL handles for asynchronous requests
$mh = curl_multi_init();

$ch1 = curl_init();
$ch2 = curl_init();

// Set options for the first request
curl_setopt($ch1, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts/1");  // Example API endpoint
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_TIMEOUT, 1);  // Non-blocking request

// Set options for the second request
curl_setopt($ch2, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts/2");  // Example API endpoint
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_TIMEOUT, 1);  // Non-blocking request

// Execute both requests in parallel
curl_multi_add_handle($mh, $ch1);
curl_multi_add_handle($mh, $ch2);

echo "Both requests are being sent simultaneously.<br>";

do {
    curl_multi_exec($mh, $active);
} while ($active);

// Retrieve responses
$response1 = curl_multi_getcontent($ch1);
$response2 = curl_multi_getcontent($ch2);

// Output the responses to ensure they were completed
echo "Response from request 1: " . $response1 . "<br>";
echo "Response from request 2: " . $response2 . "<br>";

// Close all handles
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);
?>
