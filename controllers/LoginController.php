<?php

declare(strict_types=1);

require_once 'models/user.php';

//Class for login form that logins the user with their existing account
class LoginController
{

    // This function makes sure that the user is logged in
    public function login()
    {
        //First the function contains a pdo variable that refers to the db.php file and makes the connection to the database.
        $pdo = db();

        // Gets the email and password values with the post method. The post method does not require a check (if $_POST), because this is handled in the index.php file.
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        // The isset is used to check if the $email and $password input values are not empty
        if (isset($email) && isset($password)) {

            // Here the input values are filtered using prepared statements and are executed.
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            $passwordVerify = password_verify($password, $user['password']);

            if ($passwordVerify) {
                $_SESSION['loggedInUser'] = $user['id'];
            } else {
                $_SESSION['flash'] = "Your password does not match with your account";
            }
        }
        //This redirects the user to the login page, function made in functions.php
        redirect('login');
    }


}
