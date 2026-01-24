<?php
// Configuration
$to_email = "info@hotelcanquetglas.com";
$recaptcha_secret = "YOUR_RECAPTCHA_SECRET_KEY"; // Replace with your reCAPTCHA secret key

// Set headers for JSON response
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Method not allowed"]);
    exit;
}

// Get POST data
$name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
$subject_type = isset($_POST['subject']) ? strip_tags(trim($_POST['subject'])) : '';
$message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';
$recaptcha_token = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';

// Validate required fields
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Please fill in all required fields"]);
    exit;
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Invalid email address"]);
    exit;
}

// Verify reCAPTCHA
if (!empty($recaptcha_secret) && $recaptcha_secret !== "YOUR_RECAPTCHA_SECRET_KEY") {
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_token,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptcha_data)
        ]
    ];

    $context = stream_context_create($options);
    $recaptcha_response = file_get_contents($recaptcha_url, false, $context);
    $recaptcha_result = json_decode($recaptcha_response, true);

    // Check if reCAPTCHA verification failed or score is too low
    if (!$recaptcha_result['success'] || $recaptcha_result['score'] < 0.5) {
        http_response_code(403);
        echo json_encode(["success" => false, "message" => "reCAPTCHA verification failed"]);
        exit;
    }
}

// Subject mapping
$subjects = [
    'reservation' => 'Reservation Inquiry',
    'general' => 'General Question',
    'feedback' => 'Feedback',
    'other' => 'Other'
];
$subject_text = isset($subjects[$subject_type]) ? $subjects[$subject_type] : 'Contact Form';

// Build email
$email_subject = "Hotel Can Quetglas - " . $subject_text;
$email_body = "New contact form submission from the website:\n\n";
$email_body .= "Name: $name\n";
$email_body .= "Email: $email\n";
if (!empty($phone)) {
    $email_body .= "Phone: $phone\n";
}
$email_body .= "Subject: $subject_text\n\n";
$email_body .= "Message:\n$message\n";

// Email headers
$headers = "From: noreply@hotelcanquetglas.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
if (mail($to_email, $email_subject, $email_body, $headers)) {
    echo json_encode(["success" => true, "message" => "Message sent successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to send message. Please try again later."]);
}
?>
