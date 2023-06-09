<?php
include "Connect.php";
$json_file = file_get_contents('Clients.json');
$Clients = json_decode($json_file, true);
foreach ($Clients as $one) {

    echo "<pre>";
    var_dump($one);
    echo "</pre>";

    $name = $one['name'];
    $email = $one['email'];
    $password = $one['password'];

    $hash_pass = password_hash($password, PASSWORD_BCRYPT);

    echo $hash_pass;

    $sql = "INSERT INTO `client`(`nom`, `email`, `password`) values ('$name','$email','$hash_pass')";

    $conn->exec($sql);
}
$conn = null;
?>