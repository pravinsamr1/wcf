<?php
/**
 * PHP Contact & Appointment Form Submission Handler
 * Mom & Baby Hospital
 */

// Only process POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ==========================================
    // CONFIGURATION
    // Change this to your desired recipient email
    // ==========================================
    $recipient = "pravinsamr@gmail.com"; 

    // Retrieve and sanitize common fields
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
    $message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';
    
    // Determine the type of form submission based on fields
    $is_appointment = isset($_POST['department']) || isset($_POST['doctor']) || isset($_POST['date']);

    // Validate name and email
    if (empty($name)) {
        http_response_code(400);
        echo "Please enter your name.";
        exit;
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please enter a valid email address.";
        exit;
    }

    if ($is_appointment) {
        // --- APPOINTMENT BOOKING FORM ---
        $subject = "New Appointment Booking - Mom & Baby Hospital";
        
        // Retrieve specific appointment fields
        $age = isset($_POST['age']) ? strip_tags(trim($_POST['age'])) : '';
        $pregnant = isset($_POST['pregnant']) ? strip_tags(trim($_POST['pregnant'])) : '';
        $weeks = isset($_POST['weeks']) ? strip_tags(trim($_POST['weeks'])) : '';
        $department = isset($_POST['department']) ? strip_tags(trim($_POST['department'])) : '';
        $doctor = isset($_POST['doctor']) ? strip_tags(trim($_POST['doctor'])) : '';
        $date = isset($_POST['date']) ? strip_tags(trim($_POST['date'])) : '';
        $time = isset($_POST['time']) ? strip_tags(trim($_POST['time'])) : '';
        $notes = isset($_POST['notes']) ? strip_tags(trim($_POST['notes'])) : '';

        // Construct HTML email content
        $email_content = "
        <html>
        <head>
            <title>$subject</title>
            <style>
                body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
                .container { max-width: 600px; margin: 20px auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color: #f9f9f9; }
                h2 { color: #8A4F7D; border-bottom: 2px solid #8A4F7D; padding-bottom: 10px; }
                table { width: 100%; border-collapse: collapse; margin-top: 15px; }
                th, td { padding: 10px; text-align: left; border-bottom: 1px solid #eee; }
                th { background-color: #f2f2f2; width: 35%; font-weight: bold; }
                .footer { font-size: 12px; color: #777; margin-top: 20px; text-align: center; border-top: 1px solid #ddd; padding-top: 10px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>New Appointment Booking Request</h2>
                <p>An appointment request has been submitted through the Mom & Baby Hospital website with the following details:</p>
                <table>
                    <tr><th>Patient Name</th><td>$name</td></tr>
                    <tr><th>Email Address</th><td>$email</td></tr>
                    <tr><th>Phone Number</th><td>$phone</td></tr>";

        if (!empty($age)) {
            $email_content .= "<tr><th>Age</th><td>$age</td></tr>";
        }
        if (!empty($pregnant)) {
            $email_content .= "<tr><th>Pregnant?</th><td>$pregnant</td></tr>";
        }
        if (!empty($weeks)) {
            $email_content .= "<tr><th>Weeks of Pregnancy</th><td>$weeks</td></tr>";
        }
        if (!empty($department)) {
            $email_content .= "<tr><th>Department</th><td>$department</td></tr>";
        }
        if (!empty($doctor)) {
            $email_content .= "<tr><th>Preferred Doctor</th><td>$doctor</td></tr>";
        }
        if (!empty($date)) {
            $email_content .= "<tr><th>Appointment Date</th><td>$date</td></tr>";
        }
        if (!empty($time)) {
            $email_content .= "<tr><th>Appointment Time</th><td>$time</td></tr>";
        }

        // Check either general message or popup notes
        $final_message = !empty($message) ? $message : $notes;
        if (!empty($final_message)) {
            $email_content .= "<tr><th>Health Concerns/Notes</th><td>" . nl2br($final_message) . "</td></tr>";
        }

        $email_content .= "
                </table>
                <div class='footer'>
                    This email was sent automatically from the Mom & Baby Hospital website.
                </div>
            </div>
        </body>
        </html>";

    } else {
        // --- CONTACT FORM ---
        $contact_subject = isset($_POST['subject']) ? strip_tags(trim($_POST['subject'])) : 'General Inquiry';
        $subject = "Contact Form: $contact_subject - Mom & Baby Hospital";

        if (empty($message)) {
            http_response_code(400);
            echo "Please enter your message.";
            exit;
        }

        // Construct HTML email content
        $email_content = "
        <html>
        <head>
            <title>$subject</title>
            <style>
                body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
                .container { max-width: 600px; margin: 20px auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color: #f9f9f9; }
                h2 { color: #8A4F7D; border-bottom: 2px solid #8A4F7D; padding-bottom: 10px; }
                table { width: 100%; border-collapse: collapse; margin-top: 15px; }
                th, td { padding: 10px; text-align: left; border-bottom: 1px solid #eee; }
                th { background-color: #f2f2f2; width: 35%; font-weight: bold; }
                .footer { font-size: 12px; color: #777; margin-top: 20px; text-align: center; border-top: 1px solid #ddd; padding-top: 10px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>New Contact Message</h2>
                <p>A message has been received from the website contact page:</p>
                <table>
                    <tr><th>Name</th><td>$name</td></tr>
                    <tr><th>Email Address</th><td>$email</td></tr>
                    <tr><th>Subject</th><td>$contact_subject</td></tr>
                    <tr><th>Message</th><td>" . nl2br($message) . "</td></tr>
                </table>
                <div class='footer'>
                    This email was sent automatically from the Mom & Baby Hospital website.
                </div>
            </div>
        </body>
        </html>";
    }

    // Detect if running on localhost
    $is_localhost = ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1' || $_SERVER['HTTP_HOST'] === 'localhost:8000' || $_SERVER['HTTP_HOST'] === '127.0.0.1:8000');

    // Build email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    
    $domain = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'wcfmombaby.com';
    $domain = preg_replace('/^www\./', '', $domain);
    
    $headers .= "From: Mom & Baby Website <noreply@$domain>" . "\r\n";
    $headers .= "Reply-To: $name <$email>" . "\r\n";

    if ($is_localhost) {
        // --- LOCALHOST MODE: Save email to a file for preview ---
        $dir = __DIR__ . '/mails';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        
        $safe_name = preg_replace('/[^a-zA-Z0-9]/', '_', $name);
        $filename = $dir . '/' . time() . '_' . ($is_appointment ? 'appointment' : 'contact') . '_' . $safe_name . '.html';
        
        // Wrap with standard headers info for visibility in file
        $file_content = "<!--\n";
        $file_content .= "To: $recipient\n";
        $file_content .= "Subject: $subject\n";
        $file_content .= "Headers: $headers\n";
        $file_content .= "-->\n\n";
        $file_content .= $email_content;

        if (file_put_contents($filename, $file_content)) {
            http_response_code(200);
            $relative_path = 'mails/' . basename($filename);
            if ($is_appointment) {
                echo "Success (Localhost): Appointment saved to $relative_path. Open this file in your browser to preview the email!";
            } else {
                echo "Success (Localhost): Message saved to $relative_path. Open this file in your browser to preview the email!";
            }
        } else {
            http_response_code(500);
            echo "Failed to save the submission log locally on localhost.";
        }
    } else {
        // --- PRODUCTION MODE: Send actual email ---
        if (mail($recipient, $subject, $email_content, $headers)) {
            http_response_code(200);
            if ($is_appointment) {
                echo "Thank you! Your appointment request has been submitted successfully.";
            } else {
                echo "Thank you! Your message has been sent successfully.";
            }
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong, and we couldn't send your submission.";
        }
    }

} else {
    // Not a POST request
    http_response_code(403);
    echo "There was a problem with your submission. Please try again.";
}
?>
