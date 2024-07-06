<?php
// Your Pixabay API key
$apiKey = '44582056-421dceb37cbadf1099953e758';

// Search query
$query = $_GET['query'];

// API endpoint
$url = "https://pixabay.com/api/?key=$apiKey&q=" . urlencode($query) . "&image_type=photo";

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute cURL session
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);
$images = array();

// Check if data is available
if ($data['totalHits'] > 0) {
    foreach ($data['hits'] as $hit) {
        $images['url'][] = $hit['webformatURL'];
    }
}

echo json_encode($images);

?>
