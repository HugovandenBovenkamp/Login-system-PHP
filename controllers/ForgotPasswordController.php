<?php

declare(strict_types=1);

// Forget password function

class ForgotPasswordController
{
    public function forgotPassword()
    {
        $pdo = db();
        $email = $_POST['email'];
        $token = bin2hex(random_bytes(30));

        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        $startTime = date("Y-m-d H:i:s");
        $expirationDate = date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($startTime)));


        if ($user) {
            $stmt = $pdo->prepare("INSERT INTO forget_password SET (token, expiration_date, user_id) VALUES (?, ?, ?)");
            $stmt->execute([$token, $expirationDate, $user['id']]);
        }
        redirect('login');
    }
}








