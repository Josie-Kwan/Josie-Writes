<?php

// Get email from form
$email = trim($_POST['email']);

// Validate email address
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email address!";
  exit; // Stop script execution if invalid
}

// Create a file to store emails 
$file = fopen("emails.txt", "a");

// Write email to the file
fwrite($file, $email . PHP_EOL);

// Close the file
fclose($file);

// Success message
echo "Thank you for subscribing! Your email has been added.";

?>
