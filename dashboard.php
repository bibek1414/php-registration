<?php
require_once 'config.php';
initSession();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h3>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                    <div class="card-body">
                        <p>You have successfully logged in.</p>
                        <p>Your email: <?= htmlspecialchars($_SESSION['email']); ?></p>
                        <p>Your user ID: <?= htmlspecialchars($_SESSION['user_id']); ?></p>
                        
                        <div class="mt-4">
                            <h4>Protected Content</h4>
                            <p>This content is only visible to logged-in users.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
