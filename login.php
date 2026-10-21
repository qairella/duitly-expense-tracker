<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duitly - Login</title>
</head>
<body>

<h1>Login</h1>

<form method="POST" action="login-proses.php">

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" autocomplete="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" autocomplete="current-password" required><br>

    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="sign-up.php">Sign up</a></p>

</body>
</html>