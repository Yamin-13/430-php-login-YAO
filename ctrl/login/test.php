<?php
$password = 'bob';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedPassword;