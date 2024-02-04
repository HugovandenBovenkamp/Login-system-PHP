<?php

require_once "models/db.php";

class ResetPasswordController
{
    public function resetPassword()
    {

        $pdo = db();
        $password = $_POST['pwd'];
        $newPassword = $_POST['pwd-new'];

        if ($password !== $newPassword) {
            dd("je doet het niet");
        }

        // Get token from url
        $token = $_GET['token'];

        // Check if token is not expired and exists in the database
        $stmt = $pdo->prepare("SELECT expiration_date, user_id FROM forget_password WHERE token = ?");
        $stmt->execute([$token]);
        $forgotPassword = $stmt->fetch();

        if (!$forgotPassword) {
            dd("doe is niet, bonobo");
        }

        $pwHash = password_hash($password, PASSWORD_DEFAULT);

        if ($password !== $newPassword) {
            $_SESSION['flash'] = 'Je confirmed password is incorrect';
            return;
        }

        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$pwHash, $forgotPassword['user_id']]);
        $updatedPassword = $stmt->fetch();



        redirect('login');
    }
}