<?php

declare(strict_types=1);
require_once "models/user.php";
// Forget password function

class ForgotPasswordController
{
    public function forgotPassword()
    {
        // Get the user Email
        $pdo = db();
        $email = $_POST['email'];
        // Make random token
        $token = bin2hex(random_bytes(30));

        // Select user ID from the database with the corresponding email
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Get the starting time of when the token is created. Convert the expiration time to 10 minutes.
        $startTime = date("Y-m-d H:i:s");
        $expirationDate = date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($startTime)));

        // Send the token, expiration date and user_id to the database.
        if ($user) {
            $stmt = $pdo->prepare("INSERT INTO forget_password (token, expiration_date, user_id) VALUES (?, ?, ?)");
            $stmt->execute([$token, $expirationDate, $user['id']]);
        }


        redirect('resetPassword&token='.$token);
    }
}








