<?php
session_start();

require_once "controllers/LoginController.php";
require_once "controllers/RegisterController.php";
require_once "controllers/LogoutController.php";
require_once "models/db.php";
require_once "functions.php";

// Checks GET request and sends user to login if empty
if (!isset($_GET['action'])) { $_GET['action'] = 'login'; }

//Instantiate the Login and register controllers.
$loginController = new LoginController();
$registerController = new RegisterController();
$logoutController = new LogoutController();
$forgotPassword = new ForgotPasswordController();


// Handles the routing and checks if the HTTP method is post, then checks the action get method and adds necessary controller
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_GET['action'] == "login") {
        $loginController->login();
    }
    if ($_GET['action'] == "register") {
        $registerController->register();
    }
    if ($_GET['action'] == "logout") {
        $logoutController->logout();
    }
    if ($_GET['action'] == "forgotPassword") {
        $forgotPassword->forgotPassword();
    }

}

require_once "views/base.php";