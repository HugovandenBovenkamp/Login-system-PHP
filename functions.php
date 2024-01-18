<?php


// function that redirects user to the corresponding get parameter
function redirect($action): void
{
    header("location: index.php?action=".$action);
}

//todo: explain what this function does with comment
function getLoggedInUser(int $loggedInUserId): User
{
    $pdo = db();
    $stmt = $pdo->prepare('select * from users where id = ?');
    $stmt->execute([$loggedInUserId]);
    $user = $stmt->fetch();

    return new User($user['id'], $user['email'], $user['password']);
}

// function that dumps the data in the die function to the screen, for debugging.
function dd($var): void
{
    die(var_dump($var));
}