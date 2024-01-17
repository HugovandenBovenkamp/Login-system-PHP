<?php

declare(strict_types=1);

require_once 'models/user.php';

//Class for login form that logins the user with their existing account
class LoginController
{

    public function login()
    {
        $pdo = db();

        $email = $_POST['email'];
        $password = $_POST['pwd'];
        if (isset($email) && isset($password)) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $stmt->execute([$email, $password]);
            $user = $stmt->fetch();

            if ($user !== false && !is_null($user)) {
                $_SESSION['loggedInUser'] = $user['id'];
            } else {
                //Todo: session flash;
                dd('User has not been found');
            }
        }

        redirect('login');
    }
}
