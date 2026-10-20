
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Duitly</title>
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
                <p class="eyebrow">WELCOME BACK</p>
                <h1>Your money,<br>under control.</h1>
                <p class="subtitle">
                    Sign in to manage your expenses
                    and build better financial habits.
                </p>
            </div>

            <form id="loginForm">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="you@example.com"
                        autocomplete="email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <button type="submit" class="btn-primary">
                    Sign In <span aria-hidden="true">→</span>
                </button>
            </form>

            <p class="auth-footer">
                Don't have an account?
                <a href="register.php">Create an account</a>
            </p>

            <p class="demo-note">
                Take control of your financial future.
            </p>
        </section>
    </main>

    <script src="assets/js/script.js"></script>
</body>
</html>
