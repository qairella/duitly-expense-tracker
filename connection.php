<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

#nama host. localhoost is the default host
$host = "localhost";

#nama user. root is the default user
$user = "root";

#password user. empty string is the default password
$pass = "";

#nama database yang akan digunakan
$db = "duitly";

#connection to the database
$connection = mysqli_connect($host, $user, $pass, $db);

#test the connection (berjaya or not)
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 
else {
    // echo "Connected successfully";
}   
?>