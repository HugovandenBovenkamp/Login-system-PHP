<?php

declare(strict_types=1);

require_once 'models/user.php';

class LogoutController {

    public function logout() {
        //Todo: Make logout function so that if the button in login.php is pressed to logout, the user is logged out
        $pdo = db();
        unset($_SESSION['loggedInUser']);
        redirect('login');
    }
}