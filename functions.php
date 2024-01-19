<?php


// function that redirects user to the corresponding get parameter
function redirect($action): void
{
    header("Location: index.php?action=".$action);
    exit;
}

// Gets the user ID and returns user object
function getLoggedInUser(int $loggedInUserId): User
{
    $pdo = db();
    $stmt = $pdo->prepare('select * from users where id = ?');
    $stmt->execute([$loggedInUserId]);
    $user = $stmt->fetch();

    return new User($user['id'], $user['email'], $user['password']);
}

// function that dumps the data in the "die" function to the screen, for debugging.
function dd($var): void
{
    die(var_dump($var));
}