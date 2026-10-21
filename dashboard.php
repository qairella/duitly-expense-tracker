<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();

require_once 'connection.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duitly - Dashboard</title>
    <link rel="stylesheet" href="">

</head>
<body> 
    <h1>Dashboard</h1>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>!</h2>

    <table>
        <tr>
            <th>Category</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>Total Balance</td>
            <td>$0.00</td>
        </tr>
        <tr>
            <td>Income</td>
            <td>$0.00</td>
        </tr>
        <tr>
            <td>Expenses</td>
            <td>$0.00</td>
        </tr>
    </table>


</body>
</html>