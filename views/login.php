<?php
if (isset($_SESSION['loggedInUser'])) {
    echo "<h2>" . getLoggedInUser($_SESSION['loggedInUser'])->getEmail() . '</h2>';
}
?>
<!--Login form-->
<div class="login-form">
    <h2>Log in your account here</h2>
    <!--  Form action with get method that contains login -->
    <form action="index.php?action=login" method="post">
        <label for="email">Your username:</label>
        <input type="text" name="email" id="email">

        <label for="password">Your password:</label>
        <input type="password" name="pwd">

        <button type="submit">Login Here</button>
    </form>

    <div class="login-form">
        <h2>Log in your account here</h2>
        <!--  Form action with get method that contains login -->
        <form action="index.php?action=logout" method="post">
            <button type="submit">Logout Here</button>
            <a href="index.php?action=register">Register here</a>
            <a href="index.php?action=forgotPassword">Forgot password?</a>
        </form>
</div>