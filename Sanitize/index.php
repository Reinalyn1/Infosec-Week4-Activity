<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <style>
        form {
            background-color: #FFC0CB;
            padding: 20px; 
            border-radius: 5px;
            max-width: 400px;
            margin: 0 auto; 
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 4px;
        }

        input[type="text"], input[type="email"], input[type="tel"] {
            border: 2px solid black;
        }

        input[type="submit"] {
            background-color: #FF69B4;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<?php
// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data); // Remove unnecessary spaces before and after
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Converts special characters to prevent XSS
    return $data;
}

$sanitized_name = $sanitized_email = $sanitized_contact = $sanitized_message = ""; // Default empty values

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sanitized_name = sanitizeInput($_POST['name']);
    $sanitized_email = sanitizeInput($_POST['email']);
    $sanitized_contact = sanitizeInput($_POST['contact']);
    $sanitized_message = sanitizeInput($_POST['message']);
}
?>

<div>
    <h2>INPUT FORM</h2>
    <form method="POST" action=""> 
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="contact">Contact:</label>
        <input type="tel" id="contact" name="contact" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <input type="submit" value="Submit"><br>
    </form>

    <?php if (!empty($sanitized_name) && !empty($sanitized_email)): ?>
        <div class="output">
            <h3>Sanitized Output:</h3>
            <p>Name: <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Email: <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Contact: <?php echo htmlspecialchars($sanitized_contact, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Message: <?php echo htmlspecialchars($sanitized_message, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
