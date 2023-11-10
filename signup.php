<?php
    require_once 'header.php';
?>

<form action="includes/signup.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="first_name" placeholder="First Name">
    <input type="text" name="last_name" placeholder="Last Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="pwd" placeholder="Password">
    <button>Sign up</button>
</form>
<?php 
    $param = $_GET['error'];

    if ($param == 'empty_username') {
        echo "Cannot Leave Username Empty!";
    }
    elseif ($param == 'empty_pwd') {
        echo "Cannot Leave Password Empty!";
    }
    elseif ($param == 'empty_first_name') {
        echo "Cannot Leave First Name Empty!";
    }
    elseif ($param == 'empty_last_name') {
        echo "Cannot Leave Last Name Empty!";
    }
    elseif ($param == 'empty_email') {
        echo "Cannot Leave email Empty!";
    }
    elseif ($param == 'invalid_email') {
        echo "Must be Valid Email!";
    }
    elseif ($param == 'short_password') {
        echo "Password must be more then 3 characters!";
    }
    elseif ($param == 'username_exists') {
        echo "Username already exists, please try another one!";
    }
    elseif ($param == 'failed_to_create_user') {
        echo "Username already exists, please try another one!";
    }

?>

<?php
    require_once 'footer.php'
?>
