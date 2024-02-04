<?php

declare(strict_types=1);

require_once 'models/user.php';

class LogoutController {

    public function logout() {
        $pdo = db();
        unset($_SESSION['loggedInUser']);
        redirect('login');
    }
}