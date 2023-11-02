<?php
require_once('../model/user_db.php');
$username = $password = '';
$usernameErr = $passwordErr = '';
$uppercase = $lowercase = $number = $specialChars = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['username'])) {
        $usernameErr = 'Username is required';
    } else if (UserDB::getUserByUsername($_POST['username'])) {
        $usernameErr = 'Username already exists';
    } else {
        $username = test_username($_POST['username']);
    }
    
    if (empty($_POST['password'])) {
        $passwordErr = 'Password is required';
    } else {
        test_password($_POST['password']) ? 
        UserDB::addUser(null, $_POST['username'], $_POST['password'], 2) : 
        $passwordErr = "Password must be at least 
        8 characters in length and include at least one upper case letter, one lower case letter, 
        one number, and one special character.";
    }
}

function test_username($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function test_password($data) {
    $uppercase = preg_match('@[A-Z]@', $data);
    $lowercase = preg_match('@[a-z]@', $data);
    $number = preg_match('@[0-9]@', $data);
    $specialChars = preg_match('@[^\w]@', $data);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data) < 8) {
        return false;
    } else {
        return true;
    }
}
?>
<html>
    <head>
        <title>Key Bound | Registration</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <img id="homelogo" src="images/kblogo.png" alt="Key Bound logo"></a>
        <div align="center"><h1>Register for Key Bound</h1></div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="container" align="center">
        <h2>Please fill in this form to create an account.</h2>
        </div>
        <hr>    
            <table class="spec" width="60%">
                <tr><th colspan="2"><span class="error">* required field</span></th></tr>
                    <tr><td class="right"><p><label for="username"><b>Username:</b></label>
                    <input type="text" name="username" id="username"></td>
                    <td><span class="error">* <?php echo $usernameErr;?></span></p></td></tr>
                    <tr><td class="right"><p><label for="password"><b>Password:</b></label>
                    <input type="password" name="password" id="password"></td>
                    <td><span class="error">* <?php echo $passwordErr;?></span></p></td></tr>
                    <tr><td colspan="2"><div align="center"><button type="submit" class="registerbtn">Register</button></div></td></tr>
            </table>
        <div class="container signin" align="center">
            <p>Already have an account? <a href="login.php">Sign in</a></p>
        </div>
        </form>
    </body>
</html>