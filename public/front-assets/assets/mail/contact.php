<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Invalid request.');
}

// Simple email validation function
function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Sanitize inputs
function cleanInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Get values
$name     = cleanInput($_POST['name'] ?? '');
$email    = cleanInput($_POST['email'] ?? '');
$phone    = cleanInput($_POST['phone'] ?? '');
$comments = cleanInput($_POST['comments'] ?? '');

// Validate required fields
if ($name === '') {
    echo '<div class="alert alert-error">You must enter your name.</div>';
    exit();
}
if ($email === '') {
    echo '<div class="alert alert-error">You must enter your email address.</div>';
    exit();
}
if (!isEmail($email)) {
    echo '<div class="alert alert-error">You must enter a valid email address.</div>';
    exit();
}
if ($phone === '') {
    echo '<div class="alert alert-error">You must enter your phone number.</div>';
    exit();
}
if ($comments === '') {
    echo '<div class="alert alert-error">You must enter your message.</div>';
    exit();
}

// Email settings
$to      = "support@searchai.space";
$subject = "Contact Form Submission from $name";

$message = <<<EOD
You have been contacted by $name.

Phone: $phone
Email: $email

Message:
$comments

You can reply to $name via email: $email
EOD;

$headers  = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";
$headers .= "Content-Transfer-Encoding: quoted-printable\r\n";

// Send email
if (mail($to, $subject, wordwrap($message, 70), $headers)) {
    echo "<div class='alert alert-success'>
            <h3>Email Sent Successfully.</h3>
            <p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>
          </div>";
} else {
    echo '<div class="alert alert-error">An error occurred. Please try again later.</div>';
}
