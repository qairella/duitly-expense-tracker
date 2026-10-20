<?php
// Handle the signup process
session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validate input
    if ($username === '' || $password === '') {
        $_SESSION['error'] = 'Please fill in all required fields.';
        header('Location: sign-up.php');
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
            alert('Registration successful! You can now log in.');
            window.location.href = 'register.php';
            </script>";
        } else {
            $_SESSION['error'] = 'Registration failed. Please try again.';
            header('Location: sign-up.php');
            exit;
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error'] = 'Could not prepare registration.';
        header('Location: sign-up.php');
        exit;
    }
} else {
    // If not a POST request, redirect to the signup page
    header('Location: sign-up.php');
    exit;
}
?>