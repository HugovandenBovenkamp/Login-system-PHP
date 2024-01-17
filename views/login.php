<?php
if (isset($_SESSION['loggedInUser'])) {
    echo "<h2>" . getLoggedInUser($_SESSION['loggedInUser'])->getEmail() . '</h2>';
}
?>
<!--Login form-->
<div class="login-form">
    <h2>Log in your account here</h2>
    <form action="index.php?action=login" method="post">
        <label for="email">Your username:</label>
        <input type="text" name="email" id="email">

        <label for="password">Your password:</label>
        <input type="password" name="pwd">

        <button type="submit">Login Here</button>
    </form>
</div>