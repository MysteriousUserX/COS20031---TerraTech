<?php
session_start();
include("dbConnect.php");


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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['LoginEmail']) ? sanitizeInput($_POST['LoginEmail']) : '';
    $password = isset($_POST['LoginPassword']) ? sanitizeInput($_POST['LoginPassword']) : '';

    if (!empty($email) && !empty($password)) {
        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT * FROM Parties WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['Password'])) {
                // Password is correct, set up the session
                $_SESSION['LoginEmail'] = $user['Email'];
              

                // Redirect to the homepage or another page
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
        
        $stmt->close();
    } else {
        $error = "Please enter both email and password.";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="path/to/your/css/style.css"> <!-- Add your CSS file link -->
</head>

<body>
    <div class="container">
        <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <!-- Rest of your login form here -->
    </div>
</body>

</html>