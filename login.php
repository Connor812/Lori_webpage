<?php
    require_once 'header.php';
?>

<form action="includes/login.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <button>Login</button>
</form>
<?php 
    $param = $_GET['error'];
    $success = $_GET['message'];

    if ($param == 'empty_username') {
        echo "Cannot Leave Username Empty!";
    } 
    elseif ($param == 'empty_pwd') {
        echo "Cannot Leave Password Empty!";
    }
    elseif ($param == "username_doesnt_exist") {
        echo "Username Doesn't Exist, Please try again";
    }
    elseif ($param == "invalid_password") {
        echo "Invalid password, Please try again";
    }
    elseif ($success == "successful_signup") {
        echo "Successfully Create a new user, please login.";
    }
?>

<?php
    require_once 'footer.php'
?>