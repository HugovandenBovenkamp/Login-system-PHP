<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login system with PHP</title>
</head>
<body>


<?php

// Dynamically loads view pages and adds .php to the correct GET value.
require_once $_GET['action'] . '.php';

if (isset($_SESSION['flash'])) {
    echo '<h2 style="background-color: red;"> error: ' . $_SESSION['flash'] . '</h2>';
    unset($_SESSION['flash']);
}
?>
</body>
</html>