<?php

// Include library if needed
require_once 'path/to/your/library.php';

// Get email from form
$email = $_POST['email'];

// Validate email address (optional)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Invalid email address!");
}

// Create connection to spreadsheet (replace with your details)
$spreadsheet_url = "https://docs.google.com/spreadsheets/d/YOUR_SPREADSHEET_ID/edit";
$spreadsheet_id = "1eM8uxmBCpDw2uuhfiuTGrpbx-oqcFuO7SY-Y9me3xgY";
$sheet_name = "Sheet1"; // Change this if needed

// Open spreadsheet
$spreadsheet = new Spreadsheet($spreadsheet_url);

// Get sheet
$sheet = $spreadsheet->getActiveSheet();

// Find next empty row
$row_number = $sheet->getHighestRow() + 1;

// Set email in spreadsheet
$sheet->setCellValueByColumnAndRow(1, $row_number, $email);

// Save spreadsheet
$spreadsheet->updateCells("$sheet_name!A$row_number:$row_number");

// Success message
echo "Thank you for subscribing! Your email has been added.";

?>
