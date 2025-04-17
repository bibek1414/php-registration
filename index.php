<?php
require_once 'config.php';
initSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Welcome</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <p class="text-center">You are logged in!</p>
                            <div class="d-grid gap-2">
                                <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
                                <a href="logout.php" class="btn btn-danger">Logout</a>
                            </div>
                        <?php else: ?>
                            <div class="d-grid gap-2">
                                <a href="login.php" class="btn btn-primary">Login</a>
                                <a href="register.php" class="btn btn-success">Register</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


