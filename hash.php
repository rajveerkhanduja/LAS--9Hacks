<?php

function send_email($to_email) {
    // Email Configuration
    $subject = "Washing Process Completed";
    $message = "Dear User,\n\nWe are pleased to inform you that the washing process of your bag is completed. " .
               "You can now collect your bag.\n\nThank you for choosing our service.\n\nBest regards,\nYour Laundry Service";
    $headers = "From: your_email@example.com"; // Replace with your email address

    // Send Email
    if (mail($to_email, $subject, $message, $headers)) {
        echo "Email sent successfully to $to_email";
    } else {
        echo "Failed to send email to $to_email";
    }
}

// Example usage
$receiver_email = "recipient@example.com"; // Replace with the recipient's email address
send_email($receiver_email);

?>
