<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duitly</title>
    <link rel="stylesheet" href="">
</head>
<body>

<h1>Register</h1>

<form method="POST" action="signup-proses.php">

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" autocomplete="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" autocomplete="password" placeholder="At least 8 characters"
           minlength="8"  required><br>


    <button type="submit">Create Account</button>
</form>
    
    <p>Already have an account? <a href="index.php">Sign in</a></p>
   
</body>
</html>