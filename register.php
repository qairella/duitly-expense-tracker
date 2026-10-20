
<?php
require_once 'connection.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($nama === '' || $username === '' || $password === '') {
        $errors[] = 'Please fill in all required fields.';
    } elseif ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    } else {
        // Data dah diterima dan validation asas lulus.
        // Langkah seterusnya: simpan ke MySQL.
    }
    
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (nama, username, password)
                VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($connection, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param(
                $stmt,
                "sss",
                $nama,
                $username,
                $hashed_password
            );

            if (mysqli_stmt_execute($stmt)) {
                echo "Registration successful!";
            } else {
                $errors[] = "Registration failed. Please try again.";
            }

            mysqli_stmt_close($stmt);
        } else {
            $errors[] = "Could not prepare registration.";
        }
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Duitly</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="auth-layout">
        <section class="auth-card">

            <a href="index.php" class="brand">
                <span class="brand-icon">D</span>
                <span>Duitly</span>
            </a>

            <div class="auth-heading">
                <p class="eyebrow">GET STARTED</p>
                <h1>Build better<br>money habits.</h1>
                <p class="subtitle">
                    Create your account and start managing
                    your personal finances in one place.
                </p>
            </div>

            
<?php if (!empty($errors)): ?>
    <div class="form-errors">
        <?php foreach ($errors as $error): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


            <form id="registerForm" action="register.php" method="POST">
                <div class="form-group">
                    <label for="name">Full name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Your full name"
                        autocomplete="name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="your_username"
                        autocomplete="username"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="At least 8 characters"
                        minlength="8"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm password</label>
                    <input
                        type="password"
                        id="confirmPassword"
                        name="confirm_password"
                        placeholder="Enter password again"
                        minlength="8"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <button type="submit" class="btn-primary">
                    Create Account <span aria-hidden="true">→</span>
                </button>
            </form>

            <p class="auth-footer">
                Already have an account?
                <a href="index.php">Sign in</a>
            </p>

            <p class="demo-note">
                Your journey to smarter finances starts here.
            </p>

        </section>
    </main>

    <script src="assets/js/script.js"></script>
</body>
</html>
