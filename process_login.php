<?php
require_once 'config.php';
initSession();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and password are required.";
        header("Location: login.php");
        exit;
    }
    
    // Connect to database
    $conn = getDbConnection();
    
    // Get user by email
    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, create session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            header("Location: dashboard.php");
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: login.php");
        }
    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: login.php");
    }
    
    $stmt->close();
    $conn->close();
}
?>
