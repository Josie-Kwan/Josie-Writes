<?php

// Get email from form
$email = $_POST['email'];

// Validate email address (optional)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo '<span style="color: red;">Please enter a valid email address.</span>';
  exit; // Stops script execution after showing the error message
}


$spreadsheet_url = "https://docs.google.com/spreadsheets/d/1eM8uxmBCpDw2uuhfiuTGrpbx-oqcFuO7SY-Y9me3xgY";
$sheet_name = "Sheet1"; 

$spreadsheet = new Spreadsheet_Excel_Reader($spreadsheet_url);

// Get sheet
$sheet = $spreadsheet->sheets[0];

// Find next empty row
$row_number = count($sheet['cells']) + 1; // Assumes starting from row 1

// Set email in spreadsheet
$sheet['cells'][$row_number][1] = $email;

// Save spreadsheet
$spreadsheet->writeXLS($spreadsheet_url); // Replace with actual saving method if using a library

// Success message
echo "Thank you for subscribing! Your email has been added.";

?>
