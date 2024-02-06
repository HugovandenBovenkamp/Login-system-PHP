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
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Checks if the password is the same as the repeated password
        if ($password !== $passwordRepeat) {
            $_SESSION['flash'] = 'Your confirmed password is incorrect';
            return;
        }

        // Check if the password has a minimum of 8 characters and a maximum of 50, must contain a special character from this list '!@#$%'
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%])[A-Za-z\d!@#$%]{8,50}$/', $password)) {
            $_SESSION['flash'] = "Your password needs to be a minimum of 8 characters and needs to contain a number";
            redirect('register');
        }

        // Check if the email already exists in the database
        if (isset($email)) {
            $stmt = $pdo->prepare("SELECT * from users WHERE email = ? ");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
        }
        // Display error message when the email exists and redirects them to the register page
        if ($user) {
            $_SESSION['flash'] = "This Email address already exists in the database, use a different one";
            redirect('register');
        }

        // Create account and save in the database
        if (isset($email)) {
            $stmt = $pdo->prepare("INSERT INTO users(email, password) VALUES(?, ?)");
            $stmt->execute([$email, $hash]);
        }


        redirect('login');
    }
}