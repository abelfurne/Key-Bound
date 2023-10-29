<?php
require_once('../model/user_db.php');
session_start();
?>
<html>
    <head>
        <title>Key Bound | Change password</title>
        <link rel="shortcut icon" type="image/png" href="/images/kblogo.png">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <a href="about.php"><img id="homelogo" src="images/kblogo.png" alt="Key Bound logo"></a>
        <nav>
            <table>
                <tr>
                    <td class="rpad"><a href="about.php">Home</a></td>
                    <td class="rpad"><a href="practice.php">Practice</a></td>
                    <td class="rpad"><a href="keybinds.php">Keybinds</a></td>
                    <td class="rpad"><a href="login.php">Login</a></td>
                    <td><a href="profile.php">Profile</a></td>
                </tr>
            </table>
        </nav>
        <div align="center" class="boxed changed">
            <h1>Change Password</h1>
            <form method='POST' action='<?=$_SERVER['PHP_SELF'];?>'>
            <h3 align="center" class="rpad">Current password: &nbsp;<input type="password" id="curPw" name="curPw"></h3>
            <h3 align="center" class="rpad">New password: &nbsp;<input type="password" id="newPw" name="newPw"></h3>
            <h3 align="center" class="rpad">Confirm new password: &nbsp;<input type="password" id="newPw2" name="newPw2"></h3>
            <div align="center">
                <input type="submit" value="Confirm" id="confirm" name="confirm">
            </div>
        </form>
        </div>
    </body>
</html>
<?php
if (isset($_POST['confirm'])) {
    $input = $_POST['curPw'];
    if ($input == $_SESSION['pw']) {
        $input2 = $_POST['newPw'];
        if (test_password($input2)) {
            $input3 = $_POST['newPw2'];
            if ($input2 == $input3) {
                $_SESSION['pw'] = $input2;
                UserDB::updatePassword($_SESSION['id'], $_SESSION['pw']);
                echo "Password change successful. New password:" . $_SESSION['pw'];
            }
        } else {
            echo "Password change unsuccessful. Please try again.";
        }
    }
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