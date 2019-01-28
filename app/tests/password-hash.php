<?php

$password = $_GET['password'];
$options = [
    'cost' => 13,
];
echo password_hash($password, PASSWORD_BCRYPT, $options);
