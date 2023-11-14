<?php
require_once 'header.php';
?>

<div class="d-flex justify-content-center align-items-center" style="height: 600px;">
    <form action="includes/login.inc.php" method="post" class="form-outline w-50">
        <!-- Title -->
        <div class="form-outline mb-4 d-flex justify-content-center">
            <h1>Login</h1>
        </div>

        <?php

        if (isset($_GET['message'])) {

            echo '
                    <div style="background-color: #61C14E; color: white; padding: 10px; border: 3px solid #4CAF50; border-radius: 5px; text-align: center;">
                        Created user successfully
                    </div>';
        }

        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalid_password') {
                echo '<div style="background-color: #E57373; color: white; padding: 10px; border: 3px solid red; border-radius: 5px; text-align: center;">
                Invalid Password! Please try again.
            </div>';
            } elseif ($_GET['error'] == 'empty_username') {
                echo '<div style="background-color: #E57373; color: white; padding: 10px; border: 3px solid red; border-radius: 5px; text-align: center;">
                Cannot Leave Username Empty!
            </div>';
            } elseif ($_GET['error'] == 'empty_pwd') {
                echo '<div style="background-color: #E57373; color: white; padding: 10px; border: 3px solid red; border-radius: 5px; text-align: center;">
                Cannot Leave Password Empty!
            </div>';
            } elseif ($_GET['error'] == 'username_doesnt_exist') {
                echo "<div style='background-color: #E57373; color: white; padding: 10px; border: 3px solid red; border-radius: 5px; text-align: center;'>
                Username Doesn't Exist, Please try again.
            </div>";
            }
        }

        ?>

        <!-- Username input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="username_input">Username</label>
            <input type="text" name="username" id="username_input" class="form-control" placeholder="Username" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="password_input">Password</label>
            <input type="password" id="password_input" name="pwd" class="form-control" placeholder="Password" />
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    </form>
</div>
<?php
$param = $_GET['error'];
$success = $_GET['message'];

if ($param == 'empty_username') {
    echo "Cannot Leave Username Empty!";
} elseif ($param == 'empty_pwd') {
    echo "Cannot Leave Password Empty!";
} elseif ($param == "username_doesnt_exist") {
    echo "Username Doesn't Exist, Please try again";
} elseif ($param == "invalid_password") {
    echo "Invalid password, Please try again";
} elseif ($success == "successful_signup") {
    echo "Successfully Create a new user, please login.";
}
?>

<?php
require_once 'footer.php'
    ?>