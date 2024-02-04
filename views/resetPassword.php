<!--Register form-->
<div class="register-form">
    <h1>Enter your new password here</h1>
    <!--  Form action with get method that contains register -->
    <form action="index.php?action=resetPassword&token=<?= $_GET['token'];?>" method="post">

        <label for="password">Your new password:</label>
        <input type="password" name="pwd">

        <label for="password">Your new password repeat:</label>
        <input type="password" name="pwd-new">

        <button type="submit">Reset your password </button>
    </form>
</div>