<?php

// Validation and sanitization functions
function sanitizeInput($data) {
    if (is_array($data)) {
        $sanitized_input = array();
        foreach ($data as $value) {
            $sanitized_input[] = trim($value);
        }
        return $sanitized_input;
    } else {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Validate and sanitize the input
    $nature = isset($_POST['SignupNature']) ? sanitizeInput($_POST['SignupNature']) : '';
    $name = isset($_POST['SignupName']) ? sanitizeInput($_POST['SignupName']) : '';
    $email = isset($_POST['SignupEmail']) ? sanitizeInput($_POST['SignupEmail']) : '';
    $pwd = isset($_POST['SignupPassword']) ? sanitizeInput($_POST['SignupPassword']) : '';
    $repwd = isset($_POST['SignupRePassword']) ? sanitizeInput($_POST['SignupRePassword']) : '';
    $acceptTerms = isset($_POST['flexCheckDefault']) ? true : false;
    $matchpwd = true;
    $errMsg = "";

    // Validate input
    if(empty($name)){
        $errMsg .= "Please enter a name.<br><br>";
    }
    if(empty($nature)){
        $errMsg .= "Please choose a nature.<br><br>";
    }
    if (empty($email)) {
        $errMsg .= "Email address must not be empty. Please fill in to proceed.<br><br>";
    }
    if(empty($pwd)){
        $errMsg .= "Please enter your password!<br><br>";
    }
    if (empty($repwd)){
        $errMsg .= "Please retype your password for confirmation.<br><br>";
    }
    if (strlen($pwd) < 7) {
        $errMsg .= "Your password must be at least 7 characters long.<br><br>";
    }
    if ($pwd != $repwd) {
        $errMsg .= "Retype password doesn't match password. Please check again.<br><br>";
    }
    if(!$acceptTerms){
        $errMsg .= "User has not accepted with the website's Terms & Conditions";
    }
    if ($errMsg) {
        echo "<span>$errMsg</span><br>";
        $matchpwd = false;
    } else {
        // Path to the JSON file
        $filePath = 'json_data/partiesdata.json';
        // Get existing data
        if (file_exists($filePath)) {
            $jsonData = file_get_contents($filePath);
            $data = json_decode($jsonData, true);
        } else {
            $data = [];
        }

        // Find the highest existing ID
        $maxId = 0;
        foreach ($data as $user) {
            if (isset($user['UUID']) && $user['UUID'] > $maxId) {
                $maxId = $user['UUID'];
            }
        }
        $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT);
        // New user data
        $newUser = [
            "UUID" => $maxId + 1,
            "Nature" => $nature,
            "Name" => $name,
            "Email" => $email,
            "Password" => $hashedPassword
        ];

        // Add new user to data
        $data[] = $newUser;

        // Encode data to JSON and save
        $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($filePath, $newJsonData);

        // Database connection
        include("dbConnect.php");

        // Insert new user into database
        $stmt = $conn->prepare("INSERT INTO parties (Nature, Name, Email, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nature, $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            echo "User successfully registered in the database!<br>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();

        // Redirect or inform the user of success
        echo "User successfully registered! <a href='parties.php'>Navigate to Parties listing</a>";
        exit();
    }
}