<?php
// Handle the login process
session_start();

// semak kewujudan data POST untuk username dan password yg dihantar dari borang login
if(!empty($_POST['username']) && !empty($_POST['password'])){

include 'connection.php';

// ambil data dari borang login
$username = $_POST['username'];
$password = $_POST['password'];

// semak kewujudan username dalam pangkalan data
$query = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($connection, $query);     // sediakan pernyataan SQL
mysqli_stmt_bind_param($stmt, "s", $username);   // ikat parameter username ke pernyataan SQL
mysqli_stmt_execute($stmt);                     // laksanakan pernyataan SQL
$result = mysqli_stmt_get_result($stmt);        // dapatkan keputusan daripada pernyataan SQL
$user = mysqli_fetch_assoc($result);           // ambil data pengguna sebagai array bersekutu

// semak kewujudan pengguna dan kesahihan kata laluan
if($user && password_verify($password, $user['password'])){
    // jika berjaya, simpan maklumat pengguna dalam sesi
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    // alihkan pengguna ke halaman utama atau dashboard
    header("Location: dashboard.php");
    exit();
} else {
    // jika gagal, alihkan kembali ke halaman login dengan mesej ralat
    $_SESSION['error'] = "Invalid username or password.";
    header("Location: login.php");
    exit();


}
}