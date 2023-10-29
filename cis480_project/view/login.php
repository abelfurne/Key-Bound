<?php
require_once('../controller/user_controller.php');
require_once('../controller/user.php');
require_once('../controller/user_level_controller.php');
require_once('../controller/user_level.php');
session_start();

    $login_msg = isset($_SESSION['logout_msg']) ?
    $_SESSION['logout_msg'] : '';

    if (isset($_POST['id']) & isset($_POST['pw'])) {
        $user_level = UserController::validUser(
        $_POST['id'], $_POST['pw']);

        if ($user_level === '1') {
            $_SESSION['admin'] = true;
            $_SESSION['user'] = false;
            header("Location: about.php");
        } else if ($user_level === '2') {
            $_SESSION['admin'] = false;
            $_SESSION['user'] = true;
            header("Location: about.php");
        } else {
            $login_msg = 'Failed authentication - try again.';
        }
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['pw'] = $_POST['pw'];
    }
?>
<html>
    <head>
        <title>Key Bound | Login</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <img id="homelogo" src="images/kblogo.png" alt="Key Bound logo">
        <h1 align="center">Key Bound Login</h1>
        <form method='POST'>
            <h3 align="center" class="rpad">Username: &nbsp;<input type="text" name="id"></h3>
            <h3 align="center" class="rpad">Password: &nbsp;<input type="password" name="pw"></h3>
            <div align="center">
                <input type="button" onclick="window.location='/cis480_project/view/register.php'" 
                    value="Register" name="register">
                <input type="submit" value="Login" name="login">
            </div>
        </form>
        <h2 align="center"><?php echo $login_msg; ?></h2>
    </body>
</html>