<?php

function redirect($action): void
{
    header("location: index.php?action=".$action);
}

function getLoggedInUser(int $loggedInUserId): User
{
    $pdo = db();
    $stmt = $pdo->prepare('select * from users where id = ?');
    $stmt->execute([$loggedInUserId]);
    $user = $stmt->fetch();

    return new User($user['id'], $user['email'], $user['password']);
}

function dd($var): void
{
    die(var_dump($var));
}