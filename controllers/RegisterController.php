<?php
require_once 'models/user.php';

//Class that handles the registration of the user and creates an account
class RegisterController
{
    public function register()
    {
        // Database function made in db.php that returns a connection
        $pdo = db();

        $email = $_POST['email'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwdRepeat'];
        $hash = password_hash($password,PASSWORD_DEFAULT);

        if ($password !== $passwordRepeat) {
            $_SESSION['flash'] = 'Je confirmed password is incorrect';
            return;
        }

        if (isset($email)) {
            $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->execute([$email, $hash]);
        }

        redirect('login');
    }
}