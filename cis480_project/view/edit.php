<?php
require_once('../model/keybind_db.php');
session_start();
$_SESSION['no'] = $_GET['no'];
?>
<html>
    <head>
        <title>Key Bound | Edit keybind</title>
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
            <h1>Edit Keybind</h1>
            <form method='POST' action="edit_keybind.php">
            <h3 align="center" class="rpad">Ability Name: &nbsp;<input type="text" id="abilityName" name="abilityName"
                value="<?php echo $_GET['abilityName']?>"></h3>
            <h3 align="center" class="rpad">Modifier: &nbsp;<input type="text" id="modifier" name="modifier"
                value="<?php echo $_GET['modifier']?>"></h3>
            <h3 align="center" class="rpad">Value: &nbsp;<input type="text" id="value" name="value"
                value="<?php echo $_GET['value']?>"></h3>
            <div align="center">
                <input type="submit" value="Save" id="save" name="save">
                <input type="button" onclick="window.location='/cis480_project/view/keybinds.php'" 
                    value="Cancel" name="cancel">
            </div>
            </form>
        </div>
    </body>
</html>