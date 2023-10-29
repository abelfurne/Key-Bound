<?php
require_once('../model/user_db.php');
session_start();
?>
<html>
    <head>
        <title>Key Bound | Profile</title>
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
            <h1>Profile</h1>
            <img id="pp" src="images/pp.png" alt="profile pic">
            <h2><?php echo $_SESSION['id']?></h2>
            <h2><input type="button" onclick="window.location='/cis480_project/view/password.php'" 
                    value="Change password" name="password"></input></h2></div>
        </div>
    </body>
</html>